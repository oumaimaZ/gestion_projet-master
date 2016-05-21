<?php 
// ****************************************SUPPRIMER********************************************
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  if(isset($_POST['delete'])){

         $sql = 'SELECT * FROM document';
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->rowCount($result);
        for($i=0;$i<$count;$i++)
            {
           
              $del_id = $_POST['checkbox'][$i];
              $sql = "DELETE FROM document WHERE id_doc = '$del_id' ";
              $result = $db->prepare($sql);
              $result->execute();
              
            }
              $fichier=$_POST['nom_fichier'];
              $dossier_traite = "bibliotheque";
              $repertoire = opendir($dossier_traite); 
              while (false !== ($fichier = readdir($repertoire))) 
              { 
                $chemin = $dossier_traite."/".$fichier;
                  // Si le fichier n'est pas un répertoire…
                  if ($fichier != ".." AND $fichier != "." AND !is_dir($fichier))
                      {if($fichier =basename($fichier,".pdf").PHP_EOL)
                       {unlink($chemin);
                       }
                  }
              }
              closedir($repertoire);
              if($result){
                header('location:mes_documents.php');} 
  }
  $sql = 'SELECT *  FROM document';
  $query = $db->prepare($sql);
  $query->execute();

// ****************************************END SUPPRIMER********************************************
?>
<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';

   $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 
                             $sql = 'SELECT d.*,p.titre as nom_projet,p.id_projet from document d,projet p
                             where d.id_projet=p.id_projet
                             and
                             proprietaire= (SELECT username from user 
                                                  where id_user='.$user_session.')';

  $query = $db->prepare($sql);
  $query->execute();
?>

<?PHP 
//*********************************** CREATION *******************************************************************
  if (isset($POST['creer'])){
 $titre =$_POST['titre'];
$projet =$_POST['projet'];
$file=$_FILES['icone']['name'];
$desc=$_POST['description'];
        function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE)
        {
           //Test1: fichier correctement uploadé
             if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
           //Test2: taille limite
             if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
           //Test3: extension
             $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
             if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
           //Déplacement
             return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
        }
            $upload = upload($_FILES['icone']['name'],'bibliotheque',104857644, array('pdf'));
         if ($upload) "Upload de l'icone réussi!<br />";
         
   
  if($titre!= "" && $desc !="" && $file != ""){
    $sql = 'INSERT INTO document VALUES (NULL,"'.$titre.'","'.$db.'","'.$desc.'","'.$file.'")';
    $query = $db->prepare($sql);
    $query->execute();
    $idp=$db->LastInsertedId();
   

  } else
  {
    echo "error";
  }}


?>
<?php
//**************************************************modifier**********************************************************
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
    
  
// Teste de l'envoie du fichier
 
if (isset($_FILES['fichierd']) AND $_FILES['fichierd']['error'] == 0 AND isset($_POST['modifier']))
{  $titre =$_POST['titred'];
    $projet =$_POST['projetd'];
    $desc=$_POST['descd'];
     
     // $idu=$_POST['id_user'];
   
        // Verification du poids du fichier
        if ($_FILES['fichierd']['size'] <= 1000000)
        {
        $nom = $_FILES['fichierd'];
        $infosfichier = pathinfo($_FILES['fichierd']['name']);
        $extension_upload = $infosfichier['extension'];
        $extension_autorisees = array('pdf');
        if (in_array($extension_upload, $extension_autorisees))
        {
           move_uploaded_file($_FILES['fichierd']['tmp_name'], 'bibliotheque/' . basename($_FILES['fichierd']['name']));
           echo 'Le fichier a bien été envoyé '.$nom.'';
           echo $_FILES['fichierd']['name'];
             $f=$_FILES['fichierd']['name'];   
             $query = $db->prepare('UPDATE document
                            SET titre = "'.$titre.'",
                            id_projet = "'.$p.'",
                            description = "'.$desc.'"
                            nom_fichier= "'.$f.'"
                            WHERE id_doc = '.$idd);
      $query->execute();
 
        }
         
    }
     
}
?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Mes documents</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#ajoutDocument"><i class="fa fa-plus-circle"></i> Nouveau document</button>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <br>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
            <form class="form-horizontal" role="form" form method="post" action="mes_documents.php" enctype="multipart/form-data">

              <div class="panel-body">
                  <div class="dataTable_wrapper">

                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>titre du document</th>
                                  <th>Projet concerné</th>
                                  <th>date de création</th>
                                  <th >Document</th>
                                  <th>Description</th>
                                  <th>modifier</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              while($ligne = $query->fetch())
                                {
                                  echo "<tr>";
                                  echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_doc']."'> "; 

                                  echo "<td align='center'>".$ligne['titre']."</td>";
                                  echo "<td align='center'>".$ligne['nom_projet']."</td>";
                                  echo "<td align='center'>".$ligne['date_creation']."</td>";
                                  echo "<td align='center'><span class='glyphicon glyphicon-paperclip'></span>"; 
                                          $nom=$ligne['nom_fichier'];

                                          if($dossier = opendir('./bibliotheque'))
                                          {
                                          while(false !== ($fichier = readdir($dossier)))
                                          {

                                          if($fichier != '.' && $fichier != '..' && $fichier != 'mes_documents.php')
                                          {
                                          if( $fichier =basename($nom.".pdf").PHP_EOL)
                                          echo '<a href="./bibliotheque/' . $fichier . '">' . $fichier . '</a>';break;
                                          } 
                                           
                                          } 
                                           closedir($dossier);
                                          }
                                           
                                          else  echo 'Le dossier n\' a pas pu être ouvert';
                                   echo "</td>";
                                  echo "<td align='center'>".$ligne['description']."</td>";
                                  echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerModal('.$ligne['id_doc'].');"></a></td>';
                                   echo "</tr>";
                                }
                              ?>
                           </tbody>

                          </tbody>
                      </table>
                  </div><input class="btn btn-danger" type="submit" name="delete" value="supprimer">












                  <!-- /.table-responsive -->
              </div>
              </form>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->

  <!--*********************************************** Modalnouveau document********************************  -->
  <div id="ajoutDocument" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">nouveau document</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" form method="post" action="mes_documents.php" enctype="multipart/form-data">
            <div class="form-group">
                <label  class="col-sm-4 control-label" for="titre">Titre</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="titre" placeholder="Titre"/>
                </div>
                </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="projets">Projet Concerné</label>
              <div class="col-sm-8">
              <select class="form-control"  id="projet" name="projet" placeholder="projet" >
                <?php
                $s = $db->query('SELECT * FROM projet');
                while($row = $s->fetch())
                 {$r=$row['id_projet'];$i=$row['titre'];
                  echo '<option value="'.$r.'">'.$i.'</option>';
                 }?>
              </select>
              </div>
            </div>
            <div class="form-group">
              <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
              <label  class="col-sm-4 control-label" for="titre">Importer un  document (pdf| max. 1 Mo)</label>
              <div class="col-sm-8">
              <input type="file" class="form-control" id="file" />
              </div>
              </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="titre">description</label>
              <div class="col-sm-8">
              <textarea class="form-control" id="description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              <button class="btn btn-primary pull-right" type="submit" name="creer">creer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--************************************Modal DE MODIFICATION*************************************  -->
  <div id="modifier" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier document</h4>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" role="form" action="mes_documents.php" method="POST"enctype="multipart/form-data">
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="titre">titre</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" id="titred" name="titred" />
              </div>
              </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="projet">projet concerné</label>
              <div class="col-sm-8">
              <select class="form-control"  id="projetd" name="projetd" >
              <?php
              $s = $db->query('SELECT * FROM projet');
               while($row = $s->fetch())
               {$r=$row['id_projet'];$i=$row['titre'];
                echo '<option value="'.$r.'">'.$i.'</option>';
               }?>
               </select>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="descd">Description</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" id="descd" name="descd" />
              </div>
              </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="titre">Importer un  document (pdf)</label>
              <div class="col-sm-8">
              <input type="file" class="form-control" id="fichierd"name="fichierd" />
              </div>
            </div>
               <input type="hidden" id="hiddenid" name="hiddenid" />
            <div class="form-group">
              <div class="col-sm-12">
              <button class="btn btn-primary pull-right" type="submit" name="modifier" >Modifier</button>
              </div>
            </div>
          </form>
        </div>
      </div>


      <!-- END MODAL-->
<?php

            $nom=$ligne['nom_fichier'];



            if($dossier = opendir('./bibliotheque'))
            {
            while(false !== ($fichier = readdir($dossier)))
            {

            if($fichier != '.' && $fichier != '..' && $fichier != 'mes_documents.php')
            {
            if( $fichier =basename($nom,".pdf").PHP_EOL)
            echo '<a href="./bibliotheque/' . $fichier . '">' . $fichier . '</a>';break;
            } 
             
            } 
             closedir($dossier);
             
            }
             
        else
             echo 'Le dossier n\' a pas pu être ouvert';
           echo "</td>";
        echo "<td align='center'>".$ligne['description']."</td>";
  include 'includes/footer.php';
?>

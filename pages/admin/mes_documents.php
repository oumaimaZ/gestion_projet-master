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
    <?PHP
    include 'includes/header.php';
    include 'includes/side_bar.php';
    //*********************************** CREATION *******************************************************************
    if (isset($_POST['creer'])){
      $titre =$_POST['titre'];
      $projet =$_POST['projet'];
      $file_name=$_FILES['pdfDoc']['name'];
      $file_tmp = $_FILES['pdfDoc']['tmp_name'];
      $desc=$_POST['description'];

      if(!move_uploaded_file($file_tmp,"bibliotheque/".$file_name)){
        echo 'error';
      }

      $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
      if($titre!= "" && $desc !="" && $file_name != ""){
        $sql = 'INSERT INTO document VALUES (NULL,'.$projet.',"'.$titre.'","'.$_SESSION['username'].'",CURRENT_TIMESTAMP,"'.$desc.'","'.$file_name.'")';
        $query = $db->prepare($sql);
        $query->execute();


      } else
      {
        echo "error";
      }}


      ?>
      <?php
      //**************************************************modifier**********************************************************
      $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');


      // Teste de l'envoie du fichier

      if (isset($_POST['modifier']))
      {
        $titre =$_POST['titred'];
        $desc= $_POST['descd'];


            $query = $db->prepare('UPDATE document
              SET titre = "'.$titre.'",
              description = "'.$desc.'"
              WHERE id_doc = '.$_POST['hiddenid']);
              $query->execute();


        }
        ?>

      <?php

      $user_session=$_SESSION["id_user"];
      $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

      if(isset($_GET['filtre'])){
        if($_GET['filtre'] == '1'){
          $sql = 'SELECT d.*,p.titre as nom_projet,p.id_projet from document d,projet p
          where d.id_projet=p.id_projet';
        }else{
          $sql = 'SELECT d.*,p.titre as nom_projet,p.id_projet from document d,projet p
          where d.id_projet=p.id_projet
          and
          proprietaire= (SELECT username from user
            where id_user='.$user_session.')';
        }
      }else{
        $sql = 'SELECT d.*,p.titre as nom_projet,p.id_projet from document d,projet p
        where d.id_projet=p.id_projet';
      }

        $query = $db->prepare($sql);
        $query->execute();
        ?>
        <div id="page-wrapper">
          <div class="row">
            <div class="col-md-12">
              <h1 class="page-header">Mes documents</h1>
              <button class="btn btn-primary col-md-2" data-toggle="modal" data-target="#ajoutDocument"><i class="fa fa-plus-circle"></i> Nouveau document</button>
              <div class="col-md-10">
                <form class="form-inline">
                  <div class="form-group pull-right">
                    <label for="filtre">Filtre par : </label>
                      <select id="filtre" class="form-control" onchange="reload();">
                        <option value="<?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? '1' : '2'; else echo '1'; ?>"><?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? 'Tous les documents' : 'Mes documents'; else echo 'Tous les documents'; ?></option>
                        <option value="<?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? '2' : '1'; else echo '1'; ?>"><?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? 'Mes documents' : 'Tous les documents'; else echo 'Mes documents'; ?> </option>
                      </select>
                  </div>
                </form>
              </div>
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
                                  if( $fichier =basename($nom).PHP_EOL)
                                  echo '<a href="./bibliotheque/' . $fichier . '">' . $fichier . '</a>';break;
                                }

                              }
                              closedir($dossier);
                            }

                            else  echo 'Le dossier n\' a pas pu être ouvert';
                            echo "</td>";
                            echo "<td align='center'>".$ligne['description']."</td>";
                            echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerDocumentModal('.$ligne['id_doc'].');"></a></td>';
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

        <!--*********************************************** Modalnouveau document ********************************  -->
        <div id="ajoutDocument" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">nouveau document</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" role="form" method="POST" action="mes_documents.php" enctype="multipart/form-data">
                  <div class="form-group">
                    <label  class="col-sm-4 control-label" for="titre">Titre</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label" for="projets">Projet Concerné</label>
                    <div class="col-sm-8">
                      <select class="form-control"  id="projet" name="projet" placeholder="projet" >
                        <?php
                        $s = $db->query('SELECT distinct * FROM projet p,privilege pr
                          where p.id_projet=pr.id_projet and pr.username="'.$_SESSION['username'].'"
group by titre');
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
                      <input type="file" name="pdfDoc" class="form-control" id="file" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-4 control-label" for="titre">description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="description" id="description"></textarea>
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
                if( $fichier = basename($nom,".pdf").PHP_EOL)
                echo '<a href="./bibliotheque/' . $fichier . '">' . $fichier . '</a>';break;
              }

            }
            closedir($dossier);
          }

          else
          echo 'Le dossier n\' a pas pu être ouvert';
          echo "</td>";

          echo "<td align='center'>".$ligne['description']."</td>";
          ?>
          <script>
            function reload(){
              $(document).ready(function(){
                document.location.href = "mes_documents.php?filtre=" + document.getElementById('filtre').value;
              });
            }
          </script>
          <?php
          include 'includes/footer.php';
          ?>

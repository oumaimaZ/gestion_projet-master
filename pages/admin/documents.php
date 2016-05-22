<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>
<?php

   $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 
       
                      

                             $sql = 'SELECT distinct d.* ,p.titre as projets 
                             from document d,projet p,(select id_projet
                                                       from privilege
                                                        where username=(select username from user where id_user='.$user_session.'))as A,
                                                      (select id_projet
                                                       from projet
                                                        where username=(select username from user where id_user='.$user_session.'))as B
                             where d.id_projet=p.id_projet
                             AND (A.id_projet=p.id_projet OR B.id_projet=p.id_projet)';

  $query = $db->prepare($sql);
  $query->execute();

?>
<?php
//**************************************************modifier**********************************************************
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

    if (isset($_POST['modifier'])){

      $titre =$_POST['titred'];
       $projet =$_POST['projetd'];
     $file=$_POST['filed'];
     $desc=$_POST['descM'];

     $sql='SELECT id_projet from projet where titre='.$projet;
     $p = $db->prepare($sql);
  $p->execute();

     // $idu=$_POST['id_user'];
      $query = $db->prepare('UPDATE document
                            SET titre = "'.$titre.'",
                          id_projet = "'.$p.'",
                            description = "'.$desc.'"
                            piece= "'.$file.'"
                            WHERE id_doc = '.$idd);
      $query->execute();
     /* $query2 = $db->prepare('UPDATE `user_projet`
                            SET id_user = "'.$membre.'",
                            role="membre"
                           WHERE id_projet = '.$idp);
      $query2->execute(); */
    }
?>
  
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Documents</h1>
         
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <br>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="dataTable_wrapper">
                  <form class="form-horizontal" role="form"  action="documents.php" method="POST">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>titre du document</th>
                                  <th>Projet concerné</th>
                                  <th>Propriétaire</th>
                                  <th>date de création</th>
                                  <th>Description</th>
                                  <th>modifier</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              while($ligne = $query->fetch())
                                {
                                  
                                  echo "<tr>";
                                  echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_doc']."'>"."</td>";

                                  echo "<td align='center'>".$ligne['titre']."</td>";
                                echo "<td align='center'>".$ligne['projets']."</td>";
                                echo "<td align='center'>".$ligne['proprietaire']."</td>";
                                 echo "<td align='center'>".$ligne['date_creation']."</td>";
                                  echo "<td align='center'>".$ligne['description']."</td>";
                                   
                                 echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerModal('.$ligne['id_doc'].');"></a></td>';
                                   echo "</tr>";
                                }
                              ?>
                           </tbody>

                          </tbody>
                          
                      </table></form> <input class="btn btn-danger" type="submit" name="delete" value="supprimer">
                     
                  </div>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->

  <!-- Modal -->
  <div id="ajoutDocument" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">nouveau document</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">Titre</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="projets">Projet Concerné</label>
              <div class="col-sm-10">
                               <select class="form-control"  id="service" name="service" placeholder="service" >
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
              <label  class="col-sm-2 control-label" for="titre">Importer un  document (pdf)</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-primary pull-right" type="submit" name="importer">Importer</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<?php  //////delete///////////////////////////////////////
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  if(isset($_POST['delete'])){

 
         $sql = 'SELECT *
                  FROM document';

        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->rowCount($result);
        for($i=0;$i<$count;$i++){

          $del_id = $_POST['checkbox'][$i];
          $sql = "DELETE FROM document WHERE id_doc = '$del_id' ";
          $result = $db->prepare($sql);
          $result->execute();
        }

        if($result){
          header('location: documents.php');
        }
      }

  $sql1 = 'SELECT *
  FROM document ';

  $query1 = $db->prepare($sql1);
  $query1->execute();
?>

 <!-- Modal -->
  <div id="modifier" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier document</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" action="utilisateurs.php" method="POST">

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">titre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="titred" name="titred" />
              </div>
            </div>
            
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">projet concerné</label>
              <div class="col-sm-10">

                <input type="text" class="form-control" id="projetd" name="projetd" />
              </div>
            </div>
             
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">Description</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="descd" name="descd" />
              </div>
              </div>
              
             
           
            <input type="hidden" id="hiddenid" name="hiddenid" />


            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-primary pull-right" type="submit" name="modifier">Modifier</button>

</div>
            </div>
          </form>
        </div>
      </div>


      <!-- END MODAL-->


<?php

  include 'includes/footer.php';
  /* <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">direction</label>
              <input type="text" class="form-control" id="tokenfield" value="" />
<script>
              $('#tokenfield').tokenfield({
  autocomplete: {
    source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
    delay: 100
  },
  showAutocompleteOnFocus: true
})</script>
             </div>*/
?>

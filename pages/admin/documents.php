<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>
<?php

   $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 
       
                      

                             $sql = 'SELECT d.* ,p.titre as projets from document d,projet p
                             where d.id_projet=p.id_projet
                             ';

  $query = $db->prepare($sql);
  $query->execute();

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
                                  echo "<td align='center'>".$ligne['description']."</td>";
                                   
                                 echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerModal('.$ligne['id_doc'].');"></a></td>';
                                   echo "</tr>";
                                }
                              ?>
                            </tbody>

                          </tbody>
                          
                      </table></form> <input class="btn btn-danger" type="submit" name="delete" value="supprimer">
                      <button class="btn btn-info">telecharger<span class="glyphicon glyphicon-download-alt"></span></button>
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
          <h4 class="modal-title">Modifier membre</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" action="utilisateurs.php" method="POST">

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">nom</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nomM" name="nomM" placeholder="nom"/>
              </div>
            </div>
            
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">prenom</label>
              <div class="col-sm-10">

                <input type="text" class="form-control" id="prenomM" name="prenomM" placeholder="prenom"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">service/division</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="serviceM" name="serviceM" placeholder="service"/>
              </div>
              </div>
              <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">direction</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="directionM" name="directionM" placeholder="direction"/>
              </div>
             </div>
             <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">telephone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telephoneM" name="telephoneM" placeholder="telephone"/>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">e-mail</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="emailM" name="emailM" placeholder="email"/>
              </div>
            </div>
             <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">role</label>
              <div class="col-sm-10">
                <select name="roleM" class="form-control" id="roleM">
                  <option value="1">Admin</option>
                  <option value="2">Chef de projet</option>
                  <option value="3">Membre</option>
                </select>
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

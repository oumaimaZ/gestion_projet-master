<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>
<?php

   $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 
       
                      

                             $sql = 'SELECT d.* ,p.titre as projets from document d,projet p
                             where d.id_projet=p.id_projet
                             and
                             proprietaire= (SELECT username from user 
                                                  where id_user='.$user_session.')';

  $query = $db->prepare($sql);
  $query->execute();

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
              <div class="panel-body">
                  <div class="dataTable_wrapper">
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
                      </table>
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
              <label  class="col-sm-4 control-label" for="titre">Titre</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="projets">Projet Concerné</label>
              <div class="col-sm-8">
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
              <label  class="col-sm-4 control-label" for="titre">Importer un  document (pdf)</label>
              <div class="col-sm-8">
                <input type="file" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label" for="titre">description</label>
              <div class="col-sm-8">
                <textarea class="form-control" id="desc"></textarea>
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
<?php
  include 'includes/footer.php';
?>

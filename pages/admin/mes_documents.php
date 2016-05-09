<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>
<?php

   $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

                             $sql = 'SELECT * from document
                             where proprietaire='.$user_session;

  $query = $db->prepare($sql);
  $query->execute();

?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Mes documents</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#ajoutDoccument"><i class="fa fa-plus-circle"></i> Nouveau document</button>
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
                                  <th>Titre</th>
                                  <th>Nom du projet</th>
                                  <th>Date de création</th>
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
                                echo "<td align='center'>".$ligne['projet']."</td>";
                                  echo "<td align='center'>".$ligne['date_creation']."</td>";
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
              <label  class="col-sm-2 control-label" for="titre">Titre</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="projets">Projet Concerné</label>
              <div class="col-sm-10">
                 <?php
                                      $s = $db->query('SELECT titre FROM projet');
                                               while($row = $s->fetch())
                             {$r=$row['id_projet'];$i=$row['titre'];
                                echo '<option value="'.$i.'">'.$r.'</option>';

                             }?>
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
                <button class="btn btn-primary pull-right">Importer</button>
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

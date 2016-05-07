<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>
<?php
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

    if (isset($_POST['submit'])){
      $titre =$_POST['titre'];
    
      $db = $_POST['db'];
    // $participant=$_POST['participant'];
      $desc=$_POST['desc'];
      $piece=$_POST['inputfile'];
      $proprietaire=$user;
      if($titre != "" && $membre !="" && $db != "" && $participant !="" &&  $email !="" && $piece !="" &&  $service !="" ){
    $sql = 'INSERT INTO projet(titre,date_butoir,description) VALUES ("'.$titre.'","'.$db.'","'.$desc.'")';
    $query = $db->prepare($sql);
    $query->execute();
   $idp=$db->LastInsertedId();
    $sql1 = 'INSERT INTO user_projet(role,id_projet,id_user) VALUES ("admin","'.$idp.'","'.$user_session.'")';
   $query = $db->prepare($sql1);
   $query->execute();

    } else
    {
      echo "error";
    }
    }
?>
<?php
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

    if (isset($_POST['modifier'])){

      $titre =$_POST['titreM'];
      $prop=$_POST['propM'];
      $membre=$_POST['membreM'];
      $desc=$_POST['descM'];
      $date=$_POST['dbM'];
      $statut=$_POST['statutM'];
      $id=$_POST['hiddenid'];
      
      $query = $db->prepare('UPDATE projet 
                            SET titre = "'.$titre.'", 
                            statut = "'.$statut.'",
                            description = "'.$desc.'",
                            `date_butoir` = "'.$date.'"
                            WHERE Id_projet = '.$Id_projet);

      $query->execute();
      $query = $db->prepare(' '                           
                           );

      $query->execute();

     
    }
?>

<?php
   $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

  $sql = 'SELECT p.* ,A.proprietaire ,B.nbm ,C.nbd,B.membre
FROM `projet`p ,(SELECT `id_projet`,`username` as proprietaire 
                FROM `user_projet` r,`user`u 
                WHERE u.`id_user`=r.`id_user` 
                And r.`role`="proprietaire")as A,
                (SELECT r.`id_projet`,count(r.`id_user`) as nbm, `username` as membre
        FROM `user_projet` r,`user`u 
                WHERE u.`id_user`=r.`id_user` 
                 group by `id_projet`)as B,
        (SELECT `id_projet`,`id_doc` ,count(`id_doc`) as nbd 
                 FROM `document` 
                 group by "id_projet") as C
WHERE A.`Id_projet`=p.`Id_projet`
and b.`Id_projet`=p.`Id_projet`
and c.`Id_projet`=p.`Id_projet`  
group by `id_projet`';

  $query = $db->prepare($sql);
  $query->execute();
 
?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Projet</h1>
           <button class="btn btn-primary" data-toggle="modal" data-target="#ajoutprojet"><i class="fa fa-plus-circle"></i> Nouveau Projet</button>
            </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="dataTable_wrapper">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>nom du projet </th>
                                  <th>proprietaire</th>  
                                   <th>détails    </th>
                                   <th>statut  </th>
                                   <th>date de création</th>
                                  <th>date butoir</th>
                                  <th>description</th>
                                  <th>modifier</th>
                              </tr>
                          </thead>
                         <tbody>
                              <?php
                              while($ligne = $query->fetch())
                                {
                                   $doc="docs" ;$user="users /";$i=$ligne['nbm'];        
                                  echo "<tr>";
                                  echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['Id_projet']."'>"."</td>";
                                  echo "<td align='center'>".$ligne['titre']."</td>";
                                  echo "<td align='center'>".$ligne['proprietaire']."</td>";
                                  echo "<td align='center'>".$ligne['nbm'].$user.$ligne['nbd'].$doc."</td>";
                                  echo "<td align='center'>".$ligne['statut']."</td>";
                                  echo "<td align='center'>".$ligne['date_creation']."</td>";
                                   echo "<td align='center'>".$ligne['date_butoir']."</td>";
                                   echo "<td align='center'>".$ligne['description']."</td>";
                                    echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerModal('.$ligne['Id_projet'].');"></a></td>';
                                    echo "</tr>";
                                }
                              ?>
                            </tbody>

                      </table>
                      <input class="btn btn-danger" type="submit" name="delete" value="Supprimer">
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
                <div id="ajoutprojet" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nouveau Projet</h4>
                      </div>
                      <div class="modal-body">
                        <form class="form-horizontal" role="form" action="projet.php" method="POST">

                          <div class="form-group">
                            <label  class="col-sm-2 control-label" for="titre">titre du projet</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="titre" name="titre" placeholder="Projet"/>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label  class="col-sm-2 control-label" for="titre">Date butoir</label>
                            <div class="col-sm-10">
                              <input type="Date" class="form-control" id="db" name="db" />
                            </div>
                            </div>



                            <div class="form-group">
                            <label  class="col-sm-2 control-label" for="titre">participant</label>
                            <div class="col-sm-10">
                             
                              <select class="form-control" id="participant" name="participant"  >
                                          <?php
                                              
                                              $stmt = $db->query('SELECT * FROM user');
                                               while($row = $stmt->fetch())
                             { 
                              $r=$row['username'];
                                $i=$row['id_user'];
                                echo '<option value="'.$i.'"><input name="checkbox" type="checkbox" id="checkbox" value="membre">'.$r.'</option>';
                              
                             }
                                   ?>                             
                               </select>
                            </div>
                           </div>
                           <div class="form-group">
                            <label  class="col-sm-2 control-label" for="titre">description</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" id="desc" name="desc" /></textarea>  
                            </div>
                          </div>

                          <div class="form-group">
                            <label  class="col-sm-2 control-label" for="titre">piece jointe</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control" id="inputfile" name="inputfile" />
                            </div>
                          </div>


                          <div class="form-group">
                            <div class="col-sm-12">
                              <button class="btn btn-primary pull-right" type="submit" name="submit">créer</button>

                 <!--end of modal -->


<!-- Modal -->
  <div id="modifier" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier les données du projet </h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" action="utilisateurs.php" method="POST">

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">titre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="titreM" name="titreM" />
              </div>
            </div>
            
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">propriétaire</label>
              <div class="col-sm-10">

                <input type="text" class="form-control" id="propM" name="propM" />
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">membre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="membreM" name="membre" />
              </div>
              </div>
              <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">date butoir</label>
              <div class="col-sm-10">
                <input type="Date" class="form-control" id="dbM" name="dbM" />
              </div>
             </div>
             <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="descM" name="descM" /></textarea>  
                            </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">statut</label>
              <div class="col-sm-10">
                 <select name="role" class="form-control" id="statutM">
                  <option value="1">en cours</option>
                  <option value="2">achevé</option>
                 
                </select>
              </div>
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
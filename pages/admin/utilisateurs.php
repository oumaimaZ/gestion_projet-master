<?php
// ***********************************creer un utilisateur****************************************************** 
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

    if (isset($_POST['submit'])){
      $nom =$_POST['nom'];
      $prenom=$_POST['prenom'];
      $code = rand(111111, 999999);
      $username=$_POST['nom'].$_POST['prenom'];
      $tel=$_POST['telephone'];
      $email=$_POST['email'];
      $dir=$_POST['direction'];
      $service=$_POST['service'];
      $role=$_POST['role'];
      if($nom != "" && $prenom !="" && $code != "" && $username !="" && $tel !="" && $email !="" && $dir !="" &&  $service !="" &&  $role !="" ){
    $sql = 'INSERT INTO user 
            VALUES (NULL, 
              "'.$username.'", 
              "'.$nom.'", 
              "'.$prenom.'", 
              "'.$code.'", 
              " ", 
              "'.$service.'", 
              "'.$dir.'", 
              "'.$tel.'", 
              "'.$email.'", 
              "'.$role.'")';

    $query = $db->prepare($sql);
    $query->execute();
    header("location: utilisateurs.php");
    //echo $nom." ".$prenom." ".$username;
    } else
    {
      echo "error";
    }
    }
?>

<?php
        // ************************Modifier***************************************************
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 
    if (isset($_POST['modifier'])){

      $nom =$_POST['nomM'];
      $prenom=$_POST['prenomM'];
      $tel=$_POST['telephoneM'];
      $dir=$_POST['directionM'];
      $service=$_POST['serviceM'];
      $email=$_POST['emailM'];
      $id_user=$_POST['hiddenid'];
      
      $query = $db->prepare('UPDATE user 
                            SET nom = "'.$nom.'", 
                            prenom = "'.$prenom.'",
                            telephone = "'.$tel.'",
                            direction = "'.$dir.'",
                            `service-division` = "'.$service.'",
                            email = "'.$email.'"
                            WHERE id_user = '.$id_user);

      $query->execute();
      

     // header('location: utilisateurs.php');
    }
?>
<?php 

// *****************************SUPPRIMER********************************************
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  if(isset($_POST['delete'])){

  $id=$_SESSION["id_user"];
         $sql = 'SELECT *
                  FROM user ';

        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->rowCount($result);
        for($i=0;$i<$count;$i++){

          $del_id = $_POST['checkbox'][$i];
          $sql = "DELETE FROM user WHERE id_user = '$del_id' ";
          $result = $db->prepare($sql);
          $result->execute();
        }

        if($result){
          header('location: utilisateurs.php');
        }
      }

  $sql = 'SELECT *
  FROM user
         ';

  $query = $db->prepare($sql);
  $query->execute();

  include 'includes/header.php';
  include 'includes/side_bar.php';
  
?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Utilisateurs</h1>
           <button class="btn btn-primary" data-toggle="modal" data-target="#ajoututilisateur"><i class="fa fa-plus-circle"></i> Nouveau membre</button>
            </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                <form action="utilisateurs.php" method="POST">
                  <div class="dataTable_wrapper">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Username</th>
                                  <th>rôle</th>
                                  <th>service ou division</th>
                                  <th>direction</th>
                                  <th>e-mail</th>
                                  <th>telephone</th>
                                   <th>modifier</th>
                             </tr>
                          </thead>
                         <tbody>
                              <?php
                              while($ligne = $query->fetch())
                                {
                                  if($ligne['role'] == '1') $role = 'admin';
                                  else if($ligne['role'] == '2') $role = 'Chef de projet';
                                  else if($ligne['role'] == '3') $role = 'Membre';
                                               
                                  echo "<tr>";
                                  echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_user']."'>"."</td>";

                                  echo "<td align='center'>".$ligne['username']."</td>";
                                  echo "<td align='center'>".$role."</td>";
                                  echo "<td align='center'>".$ligne['service-division']."</td>";
                                  echo "<td align='center'>".$ligne['direction']."</td>";
                                  echo "<td align='center'>".$ligne['email']."</td>";
                                   echo "<td align='center'>".$ligne['telephone']."</td>";
                                 echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerModal('.$ligne['id_user'].');"></a></td>';
                                   echo "</tr>";
                                }
                              ?>
                            </tbody>
                      </table>
                      <input class="btn btn-danger" type="submit" name="delete" value="Supprimer">
                  </div>
                  <!-- /.table-responsive -->
                </form>
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
   <!-- Modal -->
  <div id="ajoututilisateur" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">nouveau membre</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" action="utilisateurs.php" method="POST">

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">nom</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="nom"/>
              </div>
            </div>
            
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">prenom</label>
              <div class="col-sm-10">

                <input type="text" class="form-control" id="role" name="prenom" placeholder="prenom"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">service/division</label>
              <div class="col-sm-10">
               
                <select class="form-control"  id="service" name="service" placeholder="service" >
                                          <?php
                                              
                                              $stmt = $db->query('SELECT Distinct`service-division` FROM `user`');
                                               while($row = $stmt->fetch())
                             { 
                              $r=$row['service-division'];
                                $i=$row['id_user'];
                                echo '<option value="'.$i.'">'.$r.'</option>';
                                                           }
                                   ?>                             
                               </select>
              </div>
              </div>
              <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">direction</label>
              <div class="col-sm-10">
               <select class="form-control" id="participant" name="participant"  >
                                          <?php
                                              
                                              $stmt = $db->query('SELECT Distinct direction FROM user');
                                               while($row = $stmt->fetch())
                             { 
                              $r=$row['direction'];
                                $i=$row['id_user'];
                                echo '<option value="'.$i.'">'.$r.'</option>';
                              
                             }
                                   ?>                             
                               </select>
              </div>
             </div>
             <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">telephone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="telephone"/>
              </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">e-mail</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="email"/>
              </div>
            </div>
             <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">role</label>
              <div class="col-sm-10">
                <select name="role" class="form-control" id="role">
                  <option value="1">Admin</option>
                  <option value="2">Chef de projet</option>
                  <option value="3">Membre</option>
                </select>
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-primary pull-right" type="submit" name="submit">créer</button>
</div>
            </div>
          </form>
        </div>
      </div>
      <!-- END MODAL-->
    </div>
  </div>

  <!-- -->

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

    </div>
  </div>

  <!-- -->
</div>
<?php
  include 'includes/footer.php';
?>
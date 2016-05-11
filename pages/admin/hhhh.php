<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';




   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  $sql='SELECT * FROM user';
   

    $query = $db->prepare($sql);
    $query->execute();
  ?>
  <?php
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 if (isset($_POST['submit'])){
      $nom =$_POST['nom'];
      $prenom=$_POST['prenom'];
      $code = $_POST['code'];
      $username=$_POST['username'];
      $adresse=$_POST['adresse'];
      $tel=$_POST['telephone'];
      $email=$_POST['email'];
      $dir=$_POST['direction'];
      $div=$_POST['division'];
      if($nom != "" && $prenom !="" && $code != ""&& $adresse !="" && $username !="" && $tel !="" && $email !="" && $dir !="" && $div !="" ){
    $sql = 'INSERT INTO user 
            VALUES (NULL, 
              "'.$username.'", 
              "'.$nom.'", 
              "'.$prenom.'", 
              "'.$code.'", 
              "'.$adresse.'", 
              "'.$service.'", 
              "'.$dir.'", 
              "'.$tel.'", 
              "'.$email.'", 
              "'.$role.'")';

    $query = $db->prepare($sql);
    $query->execute();
    





  ?>

 <?php
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 if (isset($_POST['submit'])){
      $nom =$_POST['nom'];
      $prenom=$_POST['prenom'];
      $code = $_POST['code'];
      $username=$_POST['username'];
      $adresse=$_POST['adresse'];
      $tel=$_POST['telephone'];
      $email=$_POST['email'];
      $dir=$_POST['direction'];
      $div=$_POST['division'];
      if($nom != "" && $prenom !="" && $code != ""&& $adresse !="" && $username !="" && $tel !="" && $email !="" && $dir !="" && $div !="" ){
    $sql = 'INSERT INTO user 
            VALUES (NULL, 
              "'.$username.'", 
              "'.$nom.'", 
              "'.$prenom.'", 
              "'.$code.'", 
              "'.$adresse.'", 
              "'.$service.'", 
              "'.$dir.'", 
              "'.$tel.'", 
              "'.$email.'", 
              "'.$role.'")';

    $query = $db->prepare($sql);
    $query->execute();
    





  ?>




<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Utilisateur</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#ajouter_user"><i class="fa fa-plus-circle"></i> Nouveau utilisateur</button>
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
                                  <th>Username</th>
                                  <th>telephone</th>
                                  <th>e_mail</th>
                                  <th>éditer (éditer privilége)</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              while($ligne = $query->fetch())
                                {
                                  
                                  echo "<tr>";
                                  echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_user']."'>"."</td>";

                                  echo "<td align='center'>".$ligne['username']."</td>";
                                echo "<td align='center'>".$ligne['telephone']."</td>";
                                  echo "<td align='center'>".$ligne['email']."</td>";
                                 echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier_user" onclick="triggerModal('.$ligne['id_user'].');"></a></td>';
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
  <div id="ajouter_user" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Nouveau utilisateur</h3>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="nom">Nom</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="nom" placeholder="nom"/>
                      </div>
              <label  class="col-sm-2 control-label" for="prenom">prenom</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="prenom" placeholder="prenom"/>
                      </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-2 control-label" for="login">login</label>
                     <div class="col-xs-3">
                        <input type="text" class="form-control" id="username" placeholder="username"/>
                      </div>
               <label  class="col-sm-2 control-label" for="division">division</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="division" placeholder="division"/>
                      </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="mdp">mot de passe</label>
                       <div class="col-xs-3">
                          <input type="password" class="form-control" id="code" placeholder="code"/>
                        </div>
               <label  class="col-sm-2 control-label" for="division">direction</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="direction" placeholder="direction"/>
                      </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="login">e_mail</label>
                     <div class="col-xs-3">
                        <input type="email" class="form-control" id="email" placeholder="email"/>
                      </div>
               <label  class="col-sm-2 control-label" for="division">telephone</label>
                      <div class="col-xs-3">
                        <input type="text" class="form-control" id="telephone" placeholder="telephone"/>
                      </div>
            </div>
             <div class="form-group">
              <label  class="col-sm-2 control-label" for="login">e_mail</label>
                     <div class="col-xs-3">
                       
                      </div>
               <label  class="col-sm-2 control-label" for="division">adresse</label>
                      <div class="col-xs-3">
                        <input type="adresse" class="form-control" id="adresse" placeholder="adresse"/>
                      </div>
            </div>

            
            <div class="form-group">
              <div class="col-sm-12">
               <h3 class="modal-title"> Priviléges </h3>
             
                    <div class="panel panel-default"> 
                      <div class="panel-body">
                        <div class="col-xs-8.col-sm-6">
                        <form action="taches.php" method="post">
                                  <div class="col-xs-4">
                                  <div class="panel panel-default">
                                  
                                            <div class="panel-heading">
                                            <input name='document[]' type='checkbox' id='document1' value="1">   Document</div>
                                            <div class="panel-body">
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='document[]' id='document2'value="2" disabled unchecked>creer</label>
                                                    </div>
                                                      
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"name='document[]'id='document3' value="3" disabled checked>consulter</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"name='document[]'id='document4' value="4" disabled unchecked>supprimer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"name='document[]' id='document5'value="5" disabled unchecked>editer</label>
                                                    </div>
                                            </div>
                                            <script>
                                                
                                               $('#document1').change(function(){
                                                  if($("#document1").is(":checked")) {
                                                    $('#document2').attr("disabled",false);
                                                     $('#document3').attr("disabled",false);
                                                      $('#document4').attr("disabled",false);
                                                       $('#document5').attr("disabled",false);
                                                  }
                                                  else{
                                                    $('#document2').attr("disabled",true);
                                                     $('#document3').attr("disabled",true);
                                                      $('#document4').attr("disabled",true);
                                                       $('#document5').attr("disabled",true);
                                                  
                                                  }
                                               }); 
                                            
                                            </script>
                                            <div class="panel-footer">
                                              <div class="checkbox">
                                              <label><input type="checkbox" id='document6'name='document[]' value="6">Mes Documents(tous les priv)</label>
                                              </div>
                                            </div></div>

                                            </div>
                                            <div class="col-xs-4">
                                  <div class="panel panel-default">
                                  
                                            <div class="panel-heading">
                                            <input name='tache[]' type='checkbox' id='tache1' value="1">   tâches</div>
                                            <div class="panel-body">
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" id='tache2' name='tache[]' value="2"  disabled unchecked>creer</label>
                                                    </div>
                                                      
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"id='tache3' name='tache[]'value="3" disabled checked>consulter</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" id='tache4'name='tache[]'value="4" disabled unchecked>supprimer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"id='tache5' name='tache[]'value="5" disabled unchecked>editer</label>
                                                    </div>
                                            </div>
                                            <script>
                                                
                                               $('#tache1').change(function(){
                                                  if($("#tache1").is(":checked")) {
                                                    $('#tache2').attr("disabled",false);
                                                     $('#tache3').attr("disabled",false);
                                                      $('#tache4').attr("disabled",false);
                                                       $('#tache5').attr("disabled",false);
                                                  }
                                                  else{
                                                    $('#tache2').attr("disabled",true);
                                                     $('#tache3').attr("disabled",true);
                                                      $('#tache4').attr("disabled",true);
                                                       $('#tache5').attr("disabled",true);
                                                  
                                                  }
                                               }); 
                                            
                                            </script>
                                            <div class="panel-footer">
                                              <div class="checkbox">
                                              <label><input type="checkbox"id='tache6' name='tache[]' value="6">Mes tâches(tous les priv)</label>
                                              </div>
                                            </div></div>

                                            </div>
                                            <div class="col-xs-4">
                                            <div class="panel panel-default">
                                  
                                            <div class="panel-heading">
                                            <input name='projet[]' type='checkbox' id='projet1'  value="1" > 
                                              Projet</div>
                                            
                                            <div class="panel-body">
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='projet[]' id='projet2' value="2" disabled unchecked>creer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='projet[]' id='projet3' value="3" disabled checked>consulter</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"name='projet[]' id='projet4' value="4" disabled unchecked>supprimer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='projet[]'id='projet5' value="5" disabled unchecked>editer</label>
                                                    </div>
                                            </div>
                                           

                                            <script>
                                                
                                               $('#projet1').change(function(){
                                                  if($("#projet1").is(":checked")) {
                                                    $('#projet2').attr("disabled",false);
                                                     $('#projet3').attr("disabled",false);
                                                      $('#projet4').attr("disabled",false);
                                                       $('#projet5').attr("disabled",false);
                                                  }
                                                  else{
                                                    $('#projet2').attr("disabled",true);
                                                     $('#projet3').attr("disabled",true);
                                                      $('#projet4').attr("disabled",true);
                                                       $('#projet5').attr("disabled",true);
                                                  
                                                  }
                                               }); 
                                            
                                            </script>
                                            <div class="panel-footer">
                                              <div class="checkbox">
                                              <label><input type="checkbox" id='projet6' value="6">Mes projets(tous les priv)</label>
                                              </div>
                                            </div></div>

                                            </div>
                                            <div class="col-xs-4">
                                  <div class="panel panel-default">
                                  
                                            <div class="panel-heading">
                                            <input name='checkbox[]' type='checkbox' id='user1' value="1">  utilisateurs</div>
                                             <div class="panel-body">
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='user[]' id='user2' value="2" disabled unchecked>creer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='user[]' id='user3' value="3" disabled checked>consulter</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"name='user[]' id='user4' value="4" disabled unchecked>supprimer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='user[]'id='user5' value="5" disabled unchecked>editer</label>
                                                    </div>
                                            </div>
                                            <script>
                                                
                                               $('#user1').change(function(){
                                                  if($("#user1").is(":checked")) {
                                                    $('#user2').attr("disabled",false);
                                                     $('#user3').attr("disabled",false);
                                                      $('#user4').attr("disabled",false);
                                                       $('#user5').attr("disabled",false);
                                                  }
                                                  else{
                                                    $('#user2').attr("disabled",true);
                                                     $('#user3').attr("disabled",true);
                                                      $('#user4').attr("disabled",true);
                                                       $('#user5').attr("disabled",true);
                                                  
                                                  }
                                               }); 
                                            
                                            </script>
                                            </div>

                                            </div>
                                            <div class="col-xs-4">
                                  <div class="panel panel-default">
                                  
                                            <div class="panel-heading">
                                            <input name='event[]' type='checkbox' id='event1' value="1">evenements</div>
                                            <div class="panel-body">
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='event[]'id='event2' value="2" disabled unchecked>creer</label>
                                                    </div>
                                                     
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='event[]' id='event3'value="3" disabled checked>consulter</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox" name='event[]'id='event4' value="4" disabled unchecked>supprimer</label>
                                                    </div>
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"name='event[]'id='event5' value="5" disabled unchecked>editer</label>
                                                    </div>
                                            </div>
                                            <script>
                                                
                                               $('#event1').change(function(){
                                                  if($("#event1").is(":checked")) {
                                                    $('#event2').attr("disabled",false);
                                                     $('#event3').attr("disabled",false);
                                                      $('#event4').attr("disabled",false);
                                                       $('#event5').attr("disabled",false);
                                                  }
                                                  else{
                                                    $('#event2').attr("disabled",true);
                                                     $('#event3').attr("disabled",true);
                                                      $('#event4').attr("disabled",true);
                                                       $('#event5').attr("disabled",true);
                                                  
                                                  }
                                               }); 
                                            
                                            </script>
                                            <div class="panel-footer">
                                              <div class="checkbox">
                                              <label><input type="checkbox"id='event6' name='event[]' value="6">Mes evenements(tous les priv)</label>
                                              </div>
                                            </div></div>

                                            </div>
                                            <div class="col-xs-4">
                                  <div class="panel panel-default">
                                  
                                            <div class="panel-heading">
                                            <input name='notif[]' type='checkbox' id='notif1' value="1">  Notification</div>
                                            <div class="panel-body">
                                                    <div class="checkbox">
                                                      <label><input type="checkbox"id='notif2'name='notif[]' value="2" disabled checked>creer</label>
                                                    </div>
                                                                                                       
                                            </div>
                                            <div class="panel-footer">
                                              <div class="checkbox">
                                              <label><input type="checkbox"id='notif3'name='notif[]' value="3">Mes notifications(tous les priv)</label>
                                              </div>
                                            </div></div>

                                            </div>
                                            
                        
                      </div>
                  
              </div>
            </div><div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-primary pull-right"type="submit" name="creer">creer</button>
              </div>
            </div>
             </div>
            
          </form>
        </div>
      </div>
</div>
    </div>
  </div>
</div>
<?php
  include 'includes/footer.php';
?>

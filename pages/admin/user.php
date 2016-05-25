<?php

if (isset($_POST['submit'])){
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  $nom =$_POST['nom'];
  $prenom=$_POST['prenom'];
  $code =$_POST['code'] ;
  $username=$_POST['username'];
  $tel=$_POST['telephone'];
  $email=$_POST['email'];
  $dir=$_POST['direction'];
  $div=$_POST['division'];
  $adresse=$_POST['adresse'];


  $doc = "";
  $tache= "";
  $event = "";
  $projet = "";
  $notif = "";
  $user = "";

    //document
  if(isset($_POST['document'])){
    $doc = array();
    foreach($_POST['document'] as $value){
      array_push($doc, $value);}
      $doc = implode(",", $doc);
    }
    //tache
    if(isset($_POST['tache'])){
      $tache=array();
      foreach($_POST['tache'] as $value){
        array_push($tache, $value);}
        $tache = implode("/", $tache);
      }
    //projet
      if(isset($_POST['projet'])){
        $projet =array();
        foreach($_POST['projet'] as $value){
          array_push($projet, $value);}
          $projet = implode("/", $projet);
        }
    //notif
        if(isset($_POST['notif'])){
          $notif =array();
          foreach($_POST['notif'] as $value){
            array_push($notif, $value);}
            $notif = implode("/", $notif);
          }
    //user
          if(isset($_POST['user'])){
            $user = array();
            foreach($_POST['user'] as $value){
              array_push($user, $value);}
              $user = implode("/", $user);
            }
    //event
            if(isset($_POST['event'])){
              $event =array();
              foreach($_POST['event'] as $value){
                array_push($event, $value);}
                $event = implode("/", $event);
              }

              if($username != "" && $nom != "" && $prenom !="" && $code != "" && $username !="" && $tel !="" && $email !="" && $dir !="" && $div !="" &&  $adresse !=""){
                $sql = 'INSERT INTO user
                VALUES (NULL,
                  "'.$username.'",
                  "'.$nom.'",
                  "'.$prenom.'",
                  "'.$code.'",
                  " '.$adresse.'",
                  "'.$div.'",
                  "'.$dir.'",
                  "'.$tel.'",
                  "'.$email.'",
                  "1",
                  "'.$doc.'",
                  "'.$tache.'",
                  "'.$event.'",
                  "'.$notif.'",
                  "'.$user.'")';
$query = $db->prepare($sql);
$query->execute();
}else{
  echo"no";
}
}

  //header("location: index.php");
?>

<?php
include 'includes/header.php';
include 'includes/side_bar.php';

$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
$sql='SELECT * FROM user';
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
                  <th>privilege</th>
                  <th>éditer (éditer privilége)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($ligne = $query->fetch())
                {
                 if($ligne['priv_projet'] = '1,2,3,4'and $ligne['priv_user'] = '1,2,3,4'
                  and $ligne['priv_event'] = '1,2,3,4'and $ligne['priv_tache'] = '1,2,3,4'
                  and $ligne['priv_doc'] = '1,2,3,4')
                  { $priv= 'administrateur';}
                else {$priv='membre';}
                
                echo "<tr>";
                echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_user']."'>"."</td>";

                echo "<td align='center'>".$ligne['username']."</td>";
                echo "<td align='center'>".$ligne['telephone']."</td>";
                echo "<td align='center'>".$ligne['email']."</td>";
                echo "<td align='center'>".$priv."</td>";
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
        <form class="form-horizontal" role="form"  action="user.php" method="POST">
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="nom">Nom</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="nom" placeholder="nom" name="nom"/>
            </div>
            <label  class="col-sm-2 control-label" for="prenom">prenom</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom"/>
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">login</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="username" placeholder="username" name="username"/>
            </div>
            <label  class="col-sm-2 control-label" for="division">division</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="division" placeholder="division" name="division"/>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="mdp">mot de passe</label>
            <div class="col-xs-3">
              <input type="password" class="form-control" id="code" placeholder="code" name="code"/>
            </div>
            <label  class="col-sm-2 control-label" for="division">direction</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="direction" placeholder="direction" name="direction"/>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">e_mail</label>
            <div class="col-xs-3">
              <input type="email" class="form-control" id="email" placeholder="email" name="email"/>
            </div>
            <label  class="col-sm-2 control-label" for="division">telephone</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="telephone" placeholder="telephone" name="telephone"/>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">adresse</label>
            <div class="col-xs-3">
             <div class="form-group">
              <textarea class="form-control" id="adresse" placeholder="adresse" name="adresse"></textarea>

            </div>

          </div>


          <div class="form-group">
            <div class="col-sm-12">
             <h3 class="modal-title"> Priviléges </h3>

             <div class="panel panel-default">
              <div class="panel-body">
                <div class="col-xs-8.col-sm-6">

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
                     </div>

                   </div>

                   <div class="col-xs-4">
                    <div class="panel panel-default">

                      <div class="panel-heading">
                        <input name='tache[]' type='checkbox' id='tache1' value="1">   tâches</div>
                        <div class="panel-body">
                          <div class="checkbox">
                            <label><input type="checkbox" id='tache2' name='tache[]' value="2"   unchecked>creer</label>
                          </div>

                          <div class="checkbox">
                            <label><input type="checkbox"id='tache3' name='tache[]'value="3"  unchecked>consulter</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id='tache4'name='tache[]'value="4"  unchecked>supprimer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox"id='tache5' name='tache[]'value="5"  unchecked>editer</label>
                          </div>
                        </div>
                        <script>

                         $('#tache1').change(check());

                       </script>
                     </div>

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
                     </div>

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
                     </div>

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
                        <script>

                         $('#notif1').change(function(){
                          if($("#notif1").is(":checked")) {
                            $('#notif2').attr("disabled",false);

                          }
                          else{
                            $('#notif2').attr("disabled",true);

                          }
                        });

                       </script>
                     </div>

                   </div>


                 </div>

               </div>
             </div><div class="form-group">
             <div class="col-sm-12">
              <button class="btn btn-primary pull-right" type="submit" name="submit">creer</button>
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
<script type="text/javascript">
  function check(){
    if($("#tache1").is(":checked")) {
      $('#tache2').attr("checked",true);
      $('#tache3').attr("checked",true);
      $('#tache4').attr("checked",true);
      $('#tache5').attr("checked",true);
    }
    else{
      $('#tache2').attr("checked",false);
      $('#tache3').attr("checked",false);
      $('#tache4').attr("checked",false);
      $('#tache5').attr("checked",false);

    }
  }
</script>

<?php
include 'includes/footer.php';
?>

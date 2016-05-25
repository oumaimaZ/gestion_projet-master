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
          $projet = implode(",", $projet);
        }
    //notif
        if(isset($_POST['notif'])){
          $notif =array();
          foreach($_POST['notif'] as $value){
            array_push($notif, $value);}
            $notif = implode(",", $notif);
          }
    //user
          if(isset($_POST['user'])){
            $user = array();
            foreach($_POST['user'] as $value){
              array_push($user, $value);}
              $user = implode(",", $user);
            }
    //event
            if(isset($_POST['event'])){
              $event =array();
              foreach($_POST['event'] as $value){
                array_push($event, $value);}
                $event = implode(",", $event);
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
                echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#edit_user" onclick="triggerModal('.$ligne['id_user'].');"></a></td>';
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





<!-- /.row -->
<?php include 'modals/add_user.php';
include 'modals/edit_user.php'; ?>

<?php
include 'includes/footer.php';
?>

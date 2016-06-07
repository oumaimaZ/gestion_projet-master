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
        $tache = implode(",", $tache);
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
                  "'.$adresse.'",
                  "'.$div.'",
                  "'.$dir.'",
                  "'.$tel.'",
                  "'.$email.'",
                  "1",
                  "'.$doc.'",
                  "'.$tache.'",
                  "'.$event.'",
                  "'.$notif.'",
                  "'.$user.'",
                  "'.$projet.'")';
$query = $db->prepare($sql);
$query->execute();
}else{
  echo"no";

  
}
}

//header("location: index.php");
?>
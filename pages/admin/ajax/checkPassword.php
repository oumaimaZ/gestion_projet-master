<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8','root','');

    $result = $db->query('SELECT * FROM user WHERE code_acces ="'.$_POST['password'].'" AND id_user ='.$_SESSION['id_user']);

    if($result){
      echo ($result->rowCount() >= 1) ? 'true' : 'false';
    }
  }

?>

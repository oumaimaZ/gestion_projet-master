<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8','root','');

    echo ($db->query('UPDATE `tache` SET `progression`='.$_POST['progress'].' WHERE id_tache='.$_POST['id_tache'])) ? 'true' : 'false';
  }

?>

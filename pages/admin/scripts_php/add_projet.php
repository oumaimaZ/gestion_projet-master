<?php  
if (isset($_POST['submit'])){

  $participants = explode(",",$_POST['participant']);
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  session_start();
  $db->query('INSERT INTO `projet`(`id_projet`, `titre`, `date_butoir`, `description`, `username`, `participants`) 
    VALUES (NULL,"'.$_POST['titre'].'","'.$_POST['db'].'","'.$_POST['desc'].'","'.$_SESSION['username'].'","'.$_POST['participant'].'")');
}
?>
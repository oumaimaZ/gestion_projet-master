<?php  
if (isset($_POST['modifier'])){

  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  $db->query('UPDATE `projet` SET `titre`="'.$_POST['edit_titre'].'",`date_butoir`="'.$_POST['edit_db'].'",`description`="'.$_POST['edit_desc'].'",`username`="'.$_POST['edit_prop'].'" WHERE id_projet = '.$_POST['id_projet']);
}
?>
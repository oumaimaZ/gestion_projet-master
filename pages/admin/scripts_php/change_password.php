<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	if(isset($_POST['submit_pass'])){
		$db->query('UPDATE `user` SET `code_acces`= "'.$_POST['new'].'" WHERE id_user='.$_SESSION['id_user']);
		$_SESSION = array();
		session_destroy();
	}
}

?>

<?php 
	if(isset($_POST['delete'])){
		$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
		foreach ($_REQUEST['checkbox'] as $value) {
			$db->query('DELETE FROM user WHERE id_user ='.$value);
		}
	}
?>
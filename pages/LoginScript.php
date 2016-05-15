<?php

	if(isset($_POST['submit'])){
		$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

		$query = $db->prepare('SELECT * FROM user WHERE username = "'.$_POST['username'].'" AND code_acces="'.$_POST['password'].'"');

		$query->execute();

		if($query->rowCount() >= 1){
			$row = $query->fetch();
			$_SESSION['is_connected'] = true;
			$_SESSION['role'] = $row['role'];
			$_SESSION['id_user'] = $row['id_user'];
			$_SESSION['username'] = $row['username'];
			
			header("Location: index.php");
		}else{
			echo 'Something went wrong';
		}
	}

?>
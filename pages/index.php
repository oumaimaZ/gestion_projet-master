<?php

	session_start();
	echo $_SESSION['role'];
	if(isset($_SESSION['is_connected'])){
		
		if(isset($_SESSION['role'])){

			if($_SESSION['role'] == '1') header('location: admin/index.php');
			else if($_SESSION['role'] == '2') header('location: chef_de_projet/index.php');
			else if($_SESSION['role'] == '3') header('location: membre/index.php');

		}
	} 
	else {

		header('Location: login.php');
	}

	

	//else if($_SESSION['role'] == '1') header('location : admin/index.php');
	//else if($_SESSION['role'] == '2') header('location : chef_de_projet/index.php');
	//else if($_SESSION['role'] == '3') header('location : membre/index.php');

	// role == 1 ? true : false | 1 : false | 2 : false | 3 : false
?>
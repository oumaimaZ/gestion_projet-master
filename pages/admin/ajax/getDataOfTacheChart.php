<?php 
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		session_start();
		header('Content-Type: application/json');
		$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

		$current = $db->query('SELECT count(*) AS nb FROM tache WHERE username ="'.$_SESSION['username'].'" AND progression != 100 AND CURDATE() < DATE(date_butoir)');
		$unfinished = $db->query('SELECT count(*) AS nb FROM tache WHERE username ="'.$_SESSION['username'].'" AND progression != 100 AND CURDATE() > DATE(date_butoir)');

		$current = $current->fetch();
		$unfinished = $unfinished->fetch();

		echo json_encode(array('current' => $current['nb'], 'unfinished' => $unfinished['nb']));
	}
?>
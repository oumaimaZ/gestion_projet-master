<?php
session_start();
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
	header('Content-Type: application/json');
$p=$_GET['id_projet'];
//$u=$_GET['id_user'];
$query = $db->prepare('SELECT p.* FROM `projet` p WHERE p.`id_projet`='.$p.'');

	$query->execute();
	$row = $query->fetch();
	$data = [
		'titre' => $row['titre'],
		'id_projet' => $row['id_projet'],
		'id_user' => $_SESSION['id_user'],
		'proprietaire' => $row['username'],
		'date_butoir' => $row['date_butoir'],
		'description' => $row['description'],
		'titre' => $row['titre'],
		'membre' => $row['participants']
	];
	echo json_encode($data);
?>

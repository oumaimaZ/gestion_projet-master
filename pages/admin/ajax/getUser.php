<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

	$query = $db->prepare('SELECT * FROM user WHERE id_user = '.$_GET['id']);
	$query->execute();
	$row = $query->fetch();
	header('Content-Type: application/json');

	// $data = [
	// 	'id_user' => $row['id_user'],
	// 	'nom' => $row['nom'],
	// 	'prenom' => $row['prenom'],
	// 	'service' => $row['division'],
	// 	'direction' => $row['direction'],
	// 	'telephone' => $row['telephone'],
	// 	'email' => $row['email'],
	// 	'role' => $row['role']
	// ];

	// echo json_encode($data);

	echo json_encode($row);
?>

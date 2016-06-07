<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

	$query = $db->prepare('SELECT * FROM user ');
	$query->execute();
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
	$array = array();
	foreach ($query as $row) {
		array_push($array, $row);
	}

	echo json_encode($array);
?>

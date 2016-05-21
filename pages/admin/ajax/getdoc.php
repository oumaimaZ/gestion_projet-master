<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

	$query = $db->prepare('SELECT * FROM document WHERE id_doc = '.$_GET['id']);
	$query->execute();
	$row = $query->fetch();

	$data = [
		'id_doc' => $row['id_doc'],
		'titre' => $row['titre'],
		'description' => $row['description'],
		'nom_fichier' => $row['nom_fichier']];

	echo json_encode($data);
?>

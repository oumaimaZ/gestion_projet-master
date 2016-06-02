<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
		header('Content-type: application/json');
		$query = 'SELECT username
							FROM user
							WHERE username LIKE "%'.$_GET['term'].'%"';
		$dataSet = array();
		foreach ($db->query($query) as $row) {
			array_push($dataSet, $row['username']);
		}

		echo json_encode($dataSet);
	}
?>

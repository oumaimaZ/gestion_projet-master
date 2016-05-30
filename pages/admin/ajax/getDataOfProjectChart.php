<?php 
	
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		session_start();
		header('Content-Type: application/json');
		$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

		$query = $db->query('SELECT count(*) AS nb, MONTH(date_creation) AS month FROM projet WHERE username ="'.$_SESSION['username'].'" GROUP BY MONTH(date_creation)');

		$months = [0,0,0,0,0,0,0,0,0,0,0,0];

		foreach ($query as $row) {
			if($row['nb'] != 0) $months[$row['month']] = intval($row['nb']);
		}

		echo json_encode($months);
	}
?>
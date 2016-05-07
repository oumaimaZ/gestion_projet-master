<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
$idp=$_GET['idp'];
$idu=$_GET['idu'];
	$query = $db->prepare('SELECT r.*,username 
							FROM user_projet r,user u
						  WHERE r.id_user=u.id_user
						  and  id_projet = '.$idp 
						  AND  ' id_user='.$idu );
	$query->execute();
	$row = $query->fetch();

	$data = [
		'id_user' => $row['id_user'],
		'id_projet' => $row['id_projet'],
		'role' => $row['role'],
		'username' => $row['username']
	];


	echo json_encode($data);
?>
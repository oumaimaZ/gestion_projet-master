<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
$p=$_GET['id_projet'];
//$u=$_GET['id_user'];
$query = $db->prepare('SELECT p.* ,A.proprietaire ,B.membre
                                        FROM `projet`p,(SELECT `id_projet`,`username` as proprietaire
                                                        FROM projet )as A,
                                                        (SELECT r.`id_projet`, r.`username` as membre
                                                FROM `privilege` r,`user`u 
                                                        WHERE u.`username`=r.`username`
                                                         group by `id_projet`)as B
                                                
                                        WHERE A.`id_projet`=p.`Id_projet`
                                        and B.`id_projet`=p.`Id_projet`                                                             
                                        and  p.`id_projet`='.$p.'
                                         group by `id_projet`');

	$query->execute();
	$row = $query->fetch();
	$data = [
		'proprietaire' => $row['proprietaire'],
		'date_butoir' => $row['date_butoir'],
		'description' => $row['description'],
		'titre' => $row['titre'],
		'membre' => $row['membre']
	];
	echo json_encode($data);
?>

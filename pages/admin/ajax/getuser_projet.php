<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
$p=$_GET['id_projet'];
//$u=$_GET['id_user'];
	$query = $db->prepare('SELECT p.* ,A.proprietaire ,B.membre
                                        FROM `projet`p,(SELECT `id_projet`,`username` as proprietaire
                                                        FROM `user_projet` r,`user`u 
                                                        WHERE u.`id_user`=r.`id_user` 
                                                        And r.`role`="proprietaire")as A,
                                                        (SELECT r.`id_projet`, `username` as membre
                                                FROM `user_projet` r,`user`u 
                                                        WHERE u.`id_user`=r.`id_user`and r.role="membre"
                                                         group by `id_projet`)as B,
                                                
                                        WHERE A.`Id_projet`=p.`Id_projet`
                                        and b.`Id_projet`=p.`Id_projet`
                                        and c.`Id_projet`=p.`Id_projet` 
                                        and  p.`Id_projet`='.$p.'
                                         group by `id_projet`');
	$query->execute();
	$row = $query->fetch();

	$data = [
		'proprietaire' => $row['proprietaire'],
		'statut' => $row['statut'],
		'date_butoir' => $row['date_butoir'],
		'description' => $row['description'],
		'titre' => $row['titre'],
		'membre' => $row['membre'],
	];


	echo json_encode($data);
?>
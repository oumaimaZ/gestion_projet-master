<?php
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
		$query = $db->prepare('SELECT * FROM document WHERE id_doc = '.$_GET['id_doc']);

		if($query->execute()){
			$row = $query->fetch();
			$project_title = $db->query('SELECT * FROM projet WHERE id_projet ='.$row['id_projet']);
			$project_title = $project_title->fetch();

			$data = [
				'id_doc' => $row['id_doc'],
				'titre' => $row['titre'],
				'projet' => $project_title['titre'],
				'description' => $row['description'],
				'nom_fichier' => $row['nom_fichier']];

			echo json_encode($data);
		}else{
			echo 'something went wrong';
		}
	}
?>

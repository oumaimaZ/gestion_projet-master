<?php  
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['create'])){
			$project_id = $_POST['project'];
			$count = 0;
			$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
			foreach ($_REQUEST['titres'] as $dumb_var) {
				$db->query('INSERT INTO `tache`(`id_tache`, `nom_tache`, `id_projet`, `username`, `progression`, `date_affectation`, `date_butoir`) VALUES (NULL,"'.$_REQUEST['titres'][$count].'",'.$project_id.',"'.$_REQUEST['users'][$count].'",0,CURRENT_TIMESTAMP,"'.$_REQUEST['dates'][$count].'")');
				$count++;
			}
		}
	}
?>
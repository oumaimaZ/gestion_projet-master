<?php  
if(isset($_POST['modifier'])){
	$doc = "";
	$tache= "";
	$user = "";

	if(isset($_POST['edit_document'])){
		$doc = array();
		foreach($_POST['edit_document'] as $value){
			array_push($doc, $value);}
			$doc = implode(",", $doc);
		}
		if(isset($_POST['edit_tache'])){
			$tache=array();
			foreach($_POST['edit_tache'] as $value){
				array_push($tache, $value);}
				$tache = implode(",", $tache);
			}
			if(isset($_POST['edit_user'])){
				$user = array();
				foreach($_POST['edit_user'] as $value){
					array_push($user, $value);}
					$user = implode(",", $user);
				}
				$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

				$db->query('UPDATE `user` SET `username`= "'.$_POST['edit_username'].'",`nom`="'.$_POST['edit_nom'].'",`prenom`="'.$_POST['edit_prenom'].'",`adresse`="'.$_POST['edit_adresse'].'",`division`="'.$_POST['edit_division'].'",`direction`="'.$_POST['edit_direction'].'",`telephone`="'.$_POST['edit_telephone'].'",`email`="'.$_POST['edit_email'].'",`priv_document`="'.$doc.'",`priv_tache`="'.$tache.'",`priv_user`="'.$user.'" WHERE id_user='.$_POST['hidden_id']);
			}
			?>
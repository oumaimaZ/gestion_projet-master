<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['sd'])){
			$details = $db->query('SELECT id_user FROM user WHERE username ="'.$_POST['to'].'"');
			$details = $details->fetch();

			$db->query('INSERT INTO `notification`(`id_notif`, `id_sender`, `id_reciever`, `message`, `type`, `titre`) VALUES (NULL,'.$_SESSION['id_user'].', '.$details['id_user'].',"'.$_POST['msg'].'","'.$_POST['type'].'","'.$_POST['sujet'].'")');

		}
	}
?>
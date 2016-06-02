<?php  
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['delete'])){
			$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

			foreach ($_REQUEST['messages'] as $id) {
				print_r($id);
				$db->query('DELETE FROM `notification` WHERE `id_notif` ='.$id);
			}
		}
	}
?>
<?php 
$user_session=$_SESSION["id_user"];
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
if (isset($_GET['filtre']) && $_GET['filtre'] == '2') {
	$sql = 'SELECT p.*,p.username as proprietaire
	FROM `projet`p 

	WHERE p.username=(select username from user where id_user='.$user_session.')
	group by `id_projet`';
}else{
	$sql ='SELECT p.*,p.username as proprietaire
	FROM `projet`p 
	group by `id_projet`';
}
$query = $db->query($sql);
?>
<?php 
$user_session=$_SESSION["id_user"];
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
if (isset($_GET['filtre']) && $_GET['filtre'] == '1') {
	$sql = 'SELECT p.*,p.username as proprietaire,(sum(E.progression)/D.nbt) as statut
	FROM `projet`p ,(SELECT`id_projet`,count(id_tache) as nbt
	FROM tache
	group by `id_projet`)as D,
	(SELECT `id_projet`,`progression`,username
	FROM tache
	group by `id_projet`)as E

	WHERE 
	D.`id_projet`=p.`id_projet`
	and E.`id_projet`=p.`id_projet`
	and p.username=(select username from user where id_user='.$user_session.')
	or E.username=(select username from user where id_user='.$user_session.')
	group by `id_projet`';
}else{
	$sql ='SELECT p.*,p.username as proprietaire,(sum(E.progression)/D.nbt) as statut
	FROM `projet`p ,(SELECT`id_projet`,count(id_tache) as nbt
	FROM tache
	group by `id_projet`)as D,
	(SELECT `id_projet`,`progression`
	FROM tache
	group by `id_projet`)as E

	WHERE 
	D.`id_projet`=p.`id_projet`
	and E.`id_projet`=p.`id_projet`
	and p.username=(select username from user where id_user='.$user_session.')
	group by `id_projet`';
}
$query = $db->query($sql);
?>
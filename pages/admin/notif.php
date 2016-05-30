
<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
?>
<?php
$user_session=$_SESSION["id_user"];
 $sql='SELECT username FROM user WHERE id_user='.$user_session;
$u = $db->prepare($sql);
  $u->execute();

?>
<h1>Envoyer un message privé!</h1>
<form action="index.php" method="post">
 <div class="form-group">
 <div class="col-sm-10">
<input type="text" name="destinataire" class="form-control" placeholder="username du destinataire">
</div>
</div>

<input type="text" class="form-control" name="titre" placeholder="Titre du message">
<textarea name="message" ></textarea>
<input type="text"class="form-control" name="type" >
<input type="submit" name="submit" value="Envoyer">
</form>
<?php
if(isset($_POST['submit']))
{
    $destinataire = $_POST['a'];
    $titre = $_POST['titre'];
    $message = $_POST['message'];
    $type = $_POST['type'];

 
    $requete = $bdd->prepare('SELECT * FROM user WHERE username = $destinataire');
    $requete->execute();
    $donnees = $requete->fetch();
    
if(!$donnees)
{
    echo "Identifiant introuvable";
}
elseif($donnees)
{
    $requete2 = $bdd->prepare('INSERT INTO notification(id_notif,de,à,message,type,titre)
                                 VALUES(NULL,'.$u.','.$destinataire.','.$message.','.$type.','.$titre.')');
    $requete2->execute();
    
    echo "Message envoyé!";
}
else
{
    echo "Une erreur est survenue.";
}
}

?>
        <?php
  include 'includes/footer.php';?>

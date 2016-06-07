<?php  
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8','root','');
include 'scripts_php/change_password.php';
include 'includes/header.php';
include 'includes/side_bar.php';
$query = $db->query('SELECT * FROM user WHERE id_user='.$_SESSION['id_user']);
$query = $query->fetch();
?>
<style type="text/css">
	.error{
		color: red;
	}
</style>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-8">
			<br>
			<h1>Mon profil</h1>
		</div>
	</div>
	<hr>
	<div class="col-lg-10">	
		<div class="row">
			<h2 >Mes informations</h2><br>
			<div class="col-lg-5">
				<h5 ><b>Username : </b><?php echo '  '.$_SESSION['username']; ?></h5>
				</div>
			<div class="col-lg-5">
				<h5 ><b>Role : </b>
					<?php if($_SESSION['role']=='1') {echo 'Administrateur';}else{echo 'Utilisateur personnalisé';}
					?>
				</h5>
			</div>
			<div class="col-lg-5">
				<h5 ><b>Prenom : </b><?php echo '  '.$query['nom']; ?></h5>
				</div>
			<div class="col-lg-5">
				<h5 ><b>Nom : </b><?php echo '  '.$query['prenom']; ?></h5>
			</div>
			<div class="col-lg-5">
				<h5 ><b>adresse : </b><?php echo '  '.$query['adresse']; ?></h5>
				</div>
			<div class="col-lg-5">
				<h5 ><b>telephone : </b><?php echo '  '.$query['telephone']; ?></h5>
			</div>
			<div class="col-lg-5">
				<h5 ><b>email : </b><?php echo '  '.$query['email']; ?></h5>
				</div>
			
			<div class="col-lg-5">
				<h5 ><b>direction: </b><?php echo '  '.$query['direction']; ?></h5>
				</div>
				<div class="col-lg-5">
				<h5 ><b>division: </b><?php echo '  '.$query['division']; ?></h5>
			</div>
		</div>

		<div class="row">
		<h2>Mot de passe</h2><br>
			<form method="POST" action="edit.php" id="passform">
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label class="control-label" for="current">Mot de passe courant :</label>
							<input type="password" class="form-control" id="current" name="current" required>
						</div>                                   
					</div>
				</div>
				<div class="row">
					<div class="col-lg-5">
						<div class="form-group">
							<label>Nouveau mot de passe :</label>
							<input type ="password" class="form-control" name="new" id="new" required>
						</div> 
					</div>
					<div class="col-lg-5">
						<div class="form-group">
							<label class="control-label" for="re_new">Confirmation du mot de passe :</label>
							<input type="password" class="form-control" id="re_new" name="re_new"required >
						</div>
					</div>			
				</div>
				<div class="row">
					<div class="col-lg-10">
						<button class="btn btn-primary pull-left" name="submit_pass" type="submit">Sauvegarder</button>
					</div>	
				</div>
			</form>
		</div>
	</div>   
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#passform').validate({
			rules: {
				current :{
					remote: {
						url: 'ajax/checkPassword.php',
						type: 'post',
						data: {
							password: function() {
								return $('#current').val();
							}
						}
					}
				},
				new: {
					minlength: 3,
					maxlength: 64
				},
				re_new: {
					equalTo: '#new'
				}
			},
			messages: {
				current: {
					remote: 'Mot de passe incorrecte'
				},
				new: {
					minlength: 'le mot de passe contient au moin 5 caractere',
					maxlength: 'le mot de passe contient 64 caractere au maximum'
				},
				re_new: {
					equalTo: 'Mot de passe incorrete'
				}
			}
		});
	});
</script>
<?php  
include 'includes/footer.php';
?>
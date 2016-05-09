function triggerModal(id){

	$.ajax({
		url: 'ajax/getUser.php?id=' + id,
		type: 'GET',
		success: function(data){

			var parsed = JSON.parse(data);

			document.getElementById('hiddenid').value = parsed.id_user;
			document.getElementById('nomM').value = parsed.nom;
			document.getElementById('prenomM').value = parsed.prenom;
			document.getElementById('serviceM').value = parsed.service;
			document.getElementById('directionM').value = parsed.direction;
			document.getElementById('telephoneM').value = parsed.telephone;
			document.getElementById('emailM').value = parsed.email;
			document.getElementById('roleM').value = parsed.role;
			document.getElementById('roleM').disabled = true;
		}
	});
}

function triggerProjectModal(id){
	$.ajax({
		url: 'ajax/getuser_projet.php?id_projet=' + id,
		type: 'GET',
		success: function(data){

			var parsed = JSON.parse(data);

			document.getElementById('titreM').value = parsed.titre;
			document.getElementById('propM').value = parsed.proprietaire;
			document.getElementById('membreM').value = parsed.membre;
			document.getElementById('descM').value = parsed.desc;
			document.getElementById('dbM').value = parsed.db;
			document.getElementById('statutM').value = parsed.statut;
			document.getElementById('Id_projet').value = parsed.id_projet;
			document.getElementById('id_user').value = parsed.id_user;
			document.getElementById('dcM').value = parsed.dc;
			document.getElementById('dc').disabled = true;
		}
	});
}

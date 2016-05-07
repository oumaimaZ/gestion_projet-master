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
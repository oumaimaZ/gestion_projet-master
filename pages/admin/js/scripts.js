function triggerModal(id){

	$.ajax({
		url: 'ajax/getUser.php?id=' + id,
		type: 'GET',
		success: function(data){

			for(var i=0; i < 5 ; i++){
				document.getElementById('edit_projet' + (i+1)).checked = false;
				document.getElementById('edit_user' + (i+1)).checked = false;
				document.getElementById('edit_tache' + (i+1)).checked = false;
				document.getElementById('edit_document' + (i+1)).checked = false;
			}

			document.getElementById('edit_nom').value = data.nom;
			document.getElementById('edit_prenom').value = data.prenom;
			document.getElementById('edit_username').value = data.username;
			document.getElementById('edit_division').value = data.division;
			document.getElementById('edit_direction').value = data.direction;
			document.getElementById('edit_telephone').value = data.telephone;
			document.getElementById('edit_email').value = data.email;
			document.getElementById('edit_adresse').value = data.adresse;
			document.getElementById('hidden_id').value = data.id_user;
			priviliges(data.priv_document, 'edit_document');
			priviliges(data.priv_user, 'edit_user');
			priviliges(data.priv_tache, 'edit_tache');
			priviliges(data.priv_projet, 'edit_projet');
		}
	});
}

function triggerProjectModal(id){
	$.ajax({
		url: 'ajax/getuser_projet.php?id_projet=' + id,
		type: 'GET',
		success: function(data){
			var date = data.date_butoir.split(" ");
			document.getElementById('edit_titre').value = data.titre;
			document.getElementById('edit_prop').value = data.proprietaire;
			document.getElementById('edit_desc').innerHTML = data.description;
			document.getElementById('edit_db').value = date[0];
			document.getElementById('id_projet').value = data.id_projet;
			document.getElementById('id_user').value = data.id_user;
		}
	});
}

function triggerDocumentModal(id){
	$.ajax({
		url: 'ajax/getdoc.php?id_doc=' + id,
		type: 'GET',
		success: function(data){

			var parsed = JSON.parse(data);

			document.getElementById('hiddenid').value = parsed.id_doc;
			document.getElementById('titred').value = parsed.titre;
			document.getElementById('descd').value = parsed.description;
			document.getElementById('projetd').options[document.getElementById('projetd').selectedIndex].value = parsed.projet;
			document.getElementById('projetd').disabled = true;


		}
	});
}
function priviliges(privs, type){
	privs = privs.split(",");
	for(var i = 0 ; i < privs.length ; i++){
		switch(privs[i]){
			case '1': document.getElementById(type + "2").checked = true; console.log(type + "done");
			break;
			case '2': document.getElementById(type + "3").checked = true; console.log(type + "done");
			break;
			case '3': document.getElementById(type + "4").checked = true; console.log(type + "done");
			break;
			case '4': document.getElementById(type + "5").checked = true; console.log(type + "done");
			break;
		}
	}
}

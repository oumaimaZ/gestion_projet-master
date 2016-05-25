<?php
include 'scripts_php/add_tache.php';
include 'includes/header.php';
include 'includes/side_bar.php';
?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
        <h1 class="page-header">Taches</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_tache"> ajouter des taches</button>
        <?php //print_r($_REQUEST['dates'][0]) ?>
      </div>
      <!-- /.col-lg-12 -->
    </div>
</div>

<?php  include 'modals/add_tache.php';?>
<script>
  $(document).ready(function(){
  	var maxField = 5; 
    var addButton = $('#add_group'); 
    var wrapper = $('#holder');
    var fieldHTML = '<div class="form-group"> <label class="control-label col-md-2" for="user">Tache</label> <div class="col-md-3"> <input type="text" name="titres[]" class="form-control" placeholder="Titre" required> </div> <div class="col-md-3"> <input type="text" name="users[]"class="form-control" placeholder="Utilisateur" required></div> <div class="col-md-4"><input type="date" name="dates[]" class="form-control" placeholder="Date butoir" required></div></div>';
    var x = 1; //Initial field counter is 1

    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }else{
        	alert('vous ne pouver pas ajouter plus de ' + x + ' taches');
        }
    });

  });
</script>
<?php include 'includes/footer.php'; ?>

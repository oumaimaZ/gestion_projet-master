<div id="ajoutprojet" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nouveau Projet</h4>
      </div>

      <div class="modal-body">
        <form class="form-horizontal" role="form" action="projets.php" method="POST">

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="titre">Titre du projet</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="titre" placeholder="Projet" required />
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="titre">Date butoir</label>
            <div class="col-sm-10">
              <input type="Date" class="form-control" name="db" required/>
            </div>
          </div>
          <div class="form-group">
           <label  class="col-sm-2 control-label" for="participant">participant</label>
           <div class="col-sm-10">
             <input type="text" class="b form-control" id="participant" name="participant" required/>
           </div>
         </div>

         <div class="form-group">
          <label  class="col-sm-2 control-label" for="titre">Description</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="desc" required/></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button class=" btn btn-primary pull-right" name="submit">créer</button>
          </div>
        </div>

      </form>    
    </div>

  </div>
</div>
</div>
<script>
  $(document).ready(function(){
    $('#participant').tokenfield({
      autocomplete: {
        source: 'ajax/getUsersNames.php?hint=' + document.getElementById('participant').value,
        delay: 100,
        minLength: 3
      },
      showAutocompleteOnFocus: true
    });
  });
</script>
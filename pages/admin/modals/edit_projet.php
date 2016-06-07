<!-- Modal -->
<div id="modifier_projet" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form class="form-horizontal" role="form" action="projets.php" method="POST">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modifier les données du projet </h4>
        </div>
        <div class="modal-body">


          <div class="form-group">
            <label  class="col-sm-2 control-label" for="titre">Titre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="edit_titre" name="edit_titre" />
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="titre">Propriétaire</label>
            <div class="col-sm-10">

              <input type="text" class="form-control" id="edit_prop" name="edit_prop" />
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="titre">Date butoir</label>
            <div class="col-sm-10">
              <input type="Date" class="form-control" id="edit_db" name="edit_db" />
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="titre">Description</label>
            <div class="col-sm-10">
              <textarea class="form-control" id="edit_desc" name="edit_desc" /></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <button class="btn btn-primary pull-right" type="submit" name="modifier">Modifier</button>
            </div>
          </div>
        </div>
        <input type="hidden" id="id_projet" name="id_projet" />
        <input type="hidden" id="id_user" name="id_user" />

      </form>
    </div>
  </div>
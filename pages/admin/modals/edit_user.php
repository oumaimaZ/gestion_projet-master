<!-- Modal -->
<div id="edit_user" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Nouveau utilisateur</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form"  action="user.php" method="POST">
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="nom">Nom</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control" id="edit_nom" placeholder="nom" name="edit_nom"/>
                    </div>
            <label  class="col-sm-2 control-label" for="prenom">prenom</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control" id="edit_prenom" placeholder="prenom" name="edit_prenom"/>
                    </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">login</label>
                   <div class="col-xs-3">
                      <input type="text" class="form-control" id="edit_username" placeholder="username" name="edit_username"/>
                      <input type="hidden"  id="hidden_id" name="hidden_id"/>
                    </div>
             <label  class="col-sm-2 control-label" for="division">division</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control" id="edit_division" placeholder="division" name="edit_division"/>
                    </div>
          </div>
          <div class="form-group">
             <label  class="col-sm-2 control-label" for="division">direction</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control" id="edit_direction" placeholder="direction" name="edit_direction"/>
                    </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">e_mail</label>
                   <div class="col-xs-3">
                      <input type="email" class="form-control" id="edit_email" placeholder="email" name="edit_email"/>
                    </div>
             <label  class="col-sm-2 control-label" for="division">telephone</label>
                    <div class="col-xs-3">
                      <input type="text" class="form-control" id="edit_telephone" placeholder="telephone" name="edit_telephone"/>
                    </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">adresse</label>
                   <div class="col-xs-3">
                   <div class="form-group">
                            <textarea class="form-control" id="edit_adresse" placeholder="adresse" name="edit_adresse"></textarea>

                    </div>

          </div>


          <div class="form-group">
            <div class="col-sm-12">
             <h3 class="modal-title"> Priviléges </h3>

                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="col-xs-8.col-sm-6">

                                <div class="col-xs-4">
                                <div class="panel panel-default">

                                          <div class="panel-heading">
                                                  <input  type='checkbox' id='edit_document1' value="1">   Document</div>
                                          <div class="panel-body">
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_document[]' id='edit_document2' value="1">creer</label>
                                                  </div>

                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_document[]' id='edit_document3' value="2">consulter</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_document[]' id='edit_document4' value="3">supprimer</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_document[]' id='edit_document5' value="4">editer</label>
                                                  </div>
                                          </div>
                                          <script>

                                             $('#edit_document1').change(function(){
                                                if($("#edit_document1").is(":checked")) {
                                                  document.getElementById('edit_document2').checked = true;
                                                  document.getElementById('edit_document3').checked = true;
                                                  document.getElementById('edit_document4').checked = true;
                                                  document.getElementById('edit_document5').checked = true;
                                                }
                                                else{
                                                  document.getElementById('edit_document2').checked = false;
                                                  document.getElementById('edit_document3').checked = false;
                                                  document.getElementById('edit_document4').checked = false;
                                                  document.getElementById('edit_document5').checked = false;

                                                }
                                             });

                                          </script>
                                         </div>

                                          </div>

                                          <div class="col-xs-4">
                                <div class="panel panel-default">

                                          <div class="panel-heading">
                                          <input  type='checkbox' id='edit_tache1' value="1">   tâches</div>
                                          <div class="panel-body">
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" id='edit_tache2' name='edit_tache[]' value="1" >creer</label>
                                                  </div>

                                                  <div class="checkbox">
                                                    <label><input type="checkbox" id='edit_tache3' name='edit_tache[]' value="2" >consulter</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" id='edit_tache4' name='edit_tache[]' value="3" >supprimer</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" id='edit_tache5' name='edit_tache[]' value="4" >editer</label>
                                                  </div>
                                          </div>
                                          <script>

                                             $('#edit_tache1').change(function(){
                                                if($("#edit_tache1").is(":checked")) {
                                                  document.getElementById('edit_tache2').checked = true;
                                                  document.getElementById('edit_tache3').checked = true;
                                                  document.getElementById('edit_tache4').checked = true;
                                                  document.getElementById('edit_tache5').checked = true;
                                                }
                                                else{
                                                  document.getElementById('edit_tache2').checked = false;
                                                  document.getElementById('edit_tache3').checked = false;
                                                  document.getElementById('edit_tache4').checked = false;
                                                  document.getElementById('edit_tache5').checked = false;

                                                }
                                             });

                                          </script>
                                         </div>

                                          </div>
                                          <div class="col-xs-4">
                                <div class="panel panel-default">

                                          <div class="panel-heading">
                                          <input  type='checkbox' id='edit_user1' value="1">  utilisateurs</div>
                                           <div class="panel-body">
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_user[]' id='edit_user2' value="1">creer</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_user[]' id='edit_user3' value="2">consulter</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_user[]' id='edit_user4' value="3">supprimer</label>
                                                  </div>
                                                  <div class="checkbox">
                                                    <label><input type="checkbox" name='edit_user[]' id='edit_user5' value="4">editer</label>
                                                  </div>
                                          </div>
                                          <script>

                                             $('#edit_user1').change(function(){
                                                if($("#edit_user1").is(":checked")) {
                                                  document.getElementById('edit_user2').checked = true;
                                                  document.getElementById('edit_user3').checked = true;
                                                  document.getElementById('edit_user4').checked = true;
                                                  document.getElementById('edit_user5').checked = true;
                                                }
                                                else{
                                                  document.getElementById('edit_user2').checked = false;
                                                  document.getElementById('edit_user3').checked = false;
                                                  document.getElementById('edit_user4').checked = false;
                                                  document.getElementById('edit_user5').checked = false;

                                                }
                                             });

                                          </script>
                                          </div>

                                          </div>


                    </div>

            </div>
          </div><div class="form-group">
            <div class="col-sm-12">
              <button class="btn btn-primary pull-right" type="submit" name="modifier">Modifier</button>
            </div>
          </div>
           </div>

        </form>
      </div>
    </div>
</div>
  </div>
</div>
</div>

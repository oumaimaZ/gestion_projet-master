<!-- Modal -->
<div id="ajouter_user" class="modal fade" role="dialog">
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
              <input type="text" class="form-control" id="nom" placeholder="nom" name="nom"/>
            </div>
            <label  class="col-sm-2 control-label" for="prenom">prenom</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="prenom" placeholder="prenom" name="prenom"/>
            </div>
          </div>

          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">login</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="username" placeholder="username" name="username"/>
            </div>
            <label  class="col-sm-2 control-label" for="division">division</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="division" placeholder="division" name="division"/>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="mdp">mot de passe</label>
            <div class="col-xs-3">
              <input type="password" class="form-control" id="code" placeholder="code" name="code"/>
            </div>
            <label  class="col-sm-2 control-label" for="division">direction</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="direction" placeholder="direction" name="direction"/>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">e_mail</label>
            <div class="col-xs-3">
              <input type="email" class="form-control" id="email" placeholder="email" name="email"/>
            </div>
            <label  class="col-sm-2 control-label" for="division">telephone</label>
            <div class="col-xs-3">
              <input type="text" class="form-control" id="telephone" placeholder="telephone" name="telephone"/>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label" for="login">adresse</label>
            <div class="col-xs-3">
             <div class="form-group">
              <textarea class="form-control" id="adresse" placeholder="adresse" name="adresse"></textarea>

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
                        <input type='checkbox' id='document1' value="1">   Document</div>
                        <div class="panel-body">
                          <div class="checkbox">
                            <label><input type="checkbox" name='document[]' id='document2' value="1">creer</label>
                          </div>

                          <div class="checkbox">
                            <label><input type="checkbox" name='document[]' id='document3' value="2">consulter</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='document[]' id='document4' value="3">supprimer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='document[]' id='document5' value="4">editer</label>
                          </div>
                        </div>
                        <script>

                         $('#document1').change(function(){
                          if($("#document1").is(":checked")) {
                            document.getElementById('document2').checked = true;
                            document.getElementById('document3').checked = true;
                            document.getElementById('document4').checked = true;
                            document.getElementById('document5').checked = true;
                          }
                          else{
                            document.getElementById('document2').checked = false;
                            document.getElementById('document3').checked = false;
                            document.getElementById('document4').checked = false;
                            document.getElementById('document5').checked = false;

                          }
                        });

                      </script>
                    </div>

                  </div>

                  <div class="col-xs-4">
                    <div class="panel panel-default">

                      <div class="panel-heading">
                        <input type='checkbox' id='tache1' value="1">   tâches</div>
                        <div class="panel-body">
                          <div class="checkbox">
                            <label><input type="checkbox" id='tache2' name='tache[]' value="1" >creer</label>
                          </div>

                          <div class="checkbox">
                            <label><input type="checkbox" id='tache3' name='tache[]' value="2" >consulter</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id='tache4' name='tache[]' value="3" >supprimer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" id='tache5' name='tache[]' value="4" >editer</label>
                          </div>
                        </div>
                        <script>

                         $('#tache1').change(function(){
                          if($("#tache1").is(":checked")) {
                            document.getElementById('tache2').checked = true;
                            document.getElementById('tache3').checked = true;
                            document.getElementById('tache4').checked = true;
                            document.getElementById('tache5').checked = true;
                          }
                          else{
                            document.getElementById('tache2').checked = false;
                            document.getElementById('tache3').checked = false;
                            document.getElementById('tache4').checked = false;
                            document.getElementById('tache5').checked = false;

                          }
                        });

                      </script>
                    </div>

                  </div>
                  <div class="col-xs-4">
                    <div class="panel panel-default">

                      <div class="panel-heading">
                        <input type='checkbox' id='user1' value="1">  utilisateurs</div>
                        <div class="panel-body">
                          <div class="checkbox">
                            <label><input type="checkbox" name='user[]' id='user2' value="1">creer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='user[]' id='user3' value="2">consulter</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox"name='user[]' id='user4' value="3">supprimer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='user[]' id='user5' value="4">editer</label>
                          </div>
                        </div>
                        <script>

                         $('#user1').change(function(){
                          if($("#user1").is(":checked")) {
                            document.getElementById('user2').checked = true;
                            document.getElementById('user3').checked = true;
                            document.getElementById('user4').checked = true;
                            document.getElementById('user5').checked = true;
                          }
                          else{
                            document.getElementById('user2').checked = false;
                            document.getElementById('user3').checked = false;
                            document.getElementById('user4').checked = false;
                            document.getElementById('user5').checked = false;

                          }
                        });

                      </script>
                    </div>

                  </div>

                  <div class="col-xs-4">
                    <div class="panel panel-default">

                      <div class="panel-heading">
                      <input type='checkbox' id='projet1' value="1">  Projets</div>
                        <div class="panel-body">
                          <div class="checkbox">
                            <label><input type="checkbox" name='projet[]' id='projet2' value="1">creer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='projet[]' id='projet3' value="2">consulter</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='projet[]' id='projet4' value="3">supprimer</label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox" name='projet[]' id='projet5' value="4">editer</label>
                          </div>
                        </div>
                        <script>

                         $('#projet1').change(function(){
                          if($("#projet1").is(":checked")) {
                            document.getElementById('projet2').checked = true;
                            document.getElementById('projet3').checked = true;
                            document.getElementById('projet4').checked = true;
                            document.getElementById('projet5').checked = true;
                          }
                          else{
                            document.getElementById('projet2').checked = false;
                            document.getElementById('projet3').checked = false;
                            document.getElementById('projet4').checked = false;
                            document.getElementById('projet5').checked = false;

                          }
                        });

                      </script>
                    </div>

                  </div>


                </div>

              </div>
            </div><div class="form-group">
            <div class="col-sm-12">
              <button class="btn btn-primary pull-right" type="submit" name="submit">creer</button>
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

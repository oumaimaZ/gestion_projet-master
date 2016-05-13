<?php
include 'includes/header.php';
include 'includes/side_bar.php';
$user_session=$_SESSION["id_user"];
 $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 $sql='SELECT * FROM user WHERE id_user='.$user_session;

  $query = $db->prepare($sql);
  $query->execute();
 ?>




 <div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Acceuil</h1>
          
            </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                <form action="index.php" method="POST">
                   <div class="form-group">
                   <?php
                              while($ligne = $query->fetch())
                                { ?>
                      <label  class="col-sm-2 control-label" for="nom">Nom</label>
                      <div class="col-xs-4">
                      <p><?php 
                      ECHO $ligne['nom'];
                      ?></p>
                       </div>
                      <label  class="col-sm-2 control-label" for="email">e_mail</label>
                      <div class="col-xs-4">
                     <p><?php 
                      ECHO $ligne['email'];
                      ?></p>
                       </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label" for="prenom">prenom</label>
                      <div class="col-xs-4">
                     <p><?php 
                      ECHO $ligne['prenom'];
                      ?></p>
                       </div>

                      <label  class="col-sm-2 control-label" for="telephone">telephone</label>
                      <div class="col-xs-4">
                     <p><?php 
                      ECHO $ligne['telephone'];
                      ?></p>
                       </div>
                      
                        <label  class="col-sm-2 control-label" for="username">username</label>
                      <div class="col-xs-4">
                      <p><?php 
                      ECHO $ligne['username'];
                      ?></p>
                       </div>
                    </div>
                    <div class="form-group">
                      
                      <label  class="col-sm-2 control-label" for="adresse">Adresse</label>
                      <div class="col-xs-4">
                     <p><?php 
                      ECHO $ligne['adresse'];
                      ?></p></br>
                       </div>
                    </div>
                    <div class="form-group">
                      <label  class="col-sm-2 control-label" for="divison">mot de passe</label>
                      <div class="col-xs-4">
                     <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#psw">changer de mot de passe
</button>
                      
                       </div>
                      <label  class="col-sm-2 control-label" for="prenom">Direction</label>
                      <div class="col-xs-4">
                      <p><?php 
                      ECHO $ligne['direction'];
                      ?></p>
                       </div>
                    </div>
                        <div class="form-group">
                      <label  class="col-sm-2 control-label" for="divison">privilege </label>
                      <div class="col-xs-4">
                      <p><?php 
                      ECHO $ligne['priv_document'].$ligne['priv_tache'].$ligne['priv_event'].$ligne['priv_notif'].$ligne['priv_user'];
                       }?>
                       </p></br>
                       </div>
                       <label  class="col-sm-2 control-label" for="divison">Division</label>
                      <div class="col-xs-4">
                      <p><?php 
                      ECHO $ligne['division'];
                      ?></p>
                       </div>
                    </div>
                  </form>
              </div>
          </div>
      </div>
<!-- Small modal -->
 <div id="psw" class="modal fade" role="dialog">
    <div class="modal-dialog ">

      <!-- Modal content-->
      
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="edit" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">modification de mot de passe      </h4>
        </div>
        <div class="modal-body">


        <div class="form-group">
    <a href="javascript:validateField();" class="theme-color accountFormToggleBtn display-block">click here to change your password</a>

    <div class="accountFormToggle display-none" id="passwordForm"> 
      <div class="col-md-5">
        <label for="password">Password</label>
        <input type='password' id="password" placeholder="Password" name='pass' class="form-control"  value='' data-bv-excluded="false" required>
      </div>

      <div class="col-md-5 col-md-offset-1">
        <label for="exampleInputEmail1">Confirm password</label>
        <input type='password' id="password2" placeholder="Confirm password" name='password2' class="form-control" value='' data-bv-excluded="false" data-match="#password" required> 
      </div>
    <script>  function validateField() {

    if($('#passwordForm').is(':visible')) {  
        $("#password").attr('data-bv-excluded',true);   
        $("#password2").attr('data-bv-excluded',true);
    } else {
        $("#password").attr('data-bv-excluded',false);   
        $("#password2").attr('data-bv-excluded',false);
    }
}</script>
    </div> 
</div></div>

          <!--form id="identicalForm" class="form-horizontal"
    data-fv-framework="bootstrap"
    data-fv-icon-valid="glyphicon glyphicon-ok"
    data-fv-icon-invalid="glyphicon glyphicon-remove"
    data-fv-icon-validating="glyphicon glyphicon-refresh">

    <div class="form-group">
        <label class="col-xs-3 control-label">Password</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="password" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Retype password</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="confirmPassword"
                data-fv-identical="true"
                data-fv-identical-field="password"
                data-fv-identical-message="The password and its confirm are not the same" />
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#identicalForm').formValidation();
});
</script>

            <form id="identicalForm" class="form-horizontal"role="form" action="index.php" method="POST">
    <div class="form-group">
        <label class="col-xs-3 control-label">Password</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="password" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label">Retype password</label>
        <div class="col-xs-5">
            <input type="password" class="form-control" name="confirmPassword" />
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#identicalForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            confirmPassword: {
                validators: {
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    });
});
</script-->




  
    </div>
  </div>
</div>
 </div>
 <?php
  include 'includes/footer.php';
  ?>

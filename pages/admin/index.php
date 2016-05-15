<?php
include 'includes/header.php';
include 'includes/side_bar.php';

$user_session=$_SESSION["id_user"];
 $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 $sql='SELECT * FROM user WHERE id_user='.$user_session;

  $query1 = $db->prepare($sql);
  $query1->execute();
 ?>
 <?php
        
        if(isset($_POST['submit'])){
                    $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
                    $ancien=$_POST['ancien'];
                    $nmdp=$_POST['p1'];
                    $vmdp=$_POST['p2'];
                    
            if ($ancien!="" && $nmdp!="" && $vmdp!=""){
              $c='SELECT code_acces from user where id_user='.$user_session;
                     $query = $db->prepare($c);
                    $query->execute();
                if ($ancien==$c){
                    if($nmdp==$vmdp){
                          $sql='UPDATE user SET code_acces="'.$nmdp.'" WHERE username='.$user_session;
                            $q = $db->prepare($sql);
                            $q->execute();
                            echo 'Modification du mot de passe effectuee avec succes';
                    } else {
                        echo 'Erreur entre le nouveau mot de passe entr&eacute; et la verification';                }
                } else {
                    echo 'Le mot de passe actuel n\'est pas valide';
                    }
            } else {
                echo 'Veuillez remplir tous les champs';
            }
        } else {
            echo 'Page de modification de mot de passe - special VIP';
        }
                 
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
                              while($ligne = $query1->fetch())
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
                     <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#psw">
                        <a href="javascript:validateField();" class="theme-color accountFormToggleBtn display-block">click here to change your password</a>
                      </button> </div>
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


        <div name="changmdp4" id="changmdp4" class="cachediv">
 
    <form  action="index.php" role="form"   method="POST">
        <label>Mot de passe actuel : <input type="password" name="ancien" ></label>
        <label>Nouveau mot de passe : <input type="password" name="p1" ></label>
        <label>Verification mot de passe : <input type="password" name="p2" ></label>
        <input type="submit" name="submit" value=" Envoyer ">
    </form> 
</div>
    

    </div>
  </div>
</div>
 </div></div>
 <?php
  include 'includes/footer.php';?>
   
  

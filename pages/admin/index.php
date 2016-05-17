<?php
include 'includes/header.php';
include 'includes/side_bar.php';

$user_session=$_SESSION["id_user"];
 $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 $sql='SELECT * FROM user WHERE id_user='.$user_session;

  $query1 = $db->prepare($sql);
  $query1->execute();
 ?><style type="text/css">
 .trash { color:rgb(209, 91, 71); }
.flag { color:rgb(248, 148, 6); }
.panel-body { padding:0px; }
.panel-footer .pagination { margin: 0; }
.panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
.panel-body .radio, .checkbox { display:inline-block;margin:0px; }
.panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
.list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
.list-group { margin-bottom:0px; }

    </style>
 <?php

 if(isset($_POST['submit'])){
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
   $ancien=$_POST['ancien'];
   $nmdp=$_POST['p1'];
   $vmdp=$_POST['p2'];
   $db->query('UPDATE user SET code_acces = "'.$nmdp.'" WHERE id_user = '.$_SESSION['id_user']);
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
<!--panel 2-->




      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                <form action="index.php" method="POST">
                   <div class="form-group">
                   <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-list"></span>Sortable Lists
                    <div class="pull-right action-buttons">
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-cog" style="margin-right: 0px;"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span>Edit</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-trash"></span>Delete</a></li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-flag"></span>Flag</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">
                                    List group item heading
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox2" />
                                <label for="checkbox2">
                                    List group item heading 1
                                </label>
                            </div>
                           <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox3" />
                                <label for="checkbox3">
                                    List group item heading 2
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox4" />
                                <label for="checkbox4">
                                    List group item heading 3
                                </label>
                            </div>
                            <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="checkbox">
                                <input type="checkbox" id="checkbox5" />
                                <label for="checkbox5">
                                    List group item heading 4
                                </label>
                            </div>
                           <div class="pull-right action-buttons">
                                <a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="trash"><span class="glyphicon glyphicon-trash"></span></a>
                                <a href="http://www.jquery2dotnet.com" class="flag"><span class="glyphicon glyphicon-flag"></span></a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>
                                Total Count <span class="label label-info">25</span></h6>
                        </div>
                        <div class="col-md-6">
                            <ul class="pagination pagination-sm pull-right">
                                <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                                <li><a href="http://www.jquery2dotnet.com">2</a></li>
                                <li><a href="http://www.jquery2dotnet.com">3</a></li>
                                <li><a href="http://www.jquery2dotnet.com">4</a></li>
                                <li><a href="http://www.jquery2dotnet.com">5</a></li>
                                <li><a href="javascript:void(0)">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <form  action="index.php" role="form" id="passwordForm"  method="POST">
        <label>Mot de passe actuel : <input type="password" name="ancien" id="ancien"></label>
        <label>Nouveau mot de passe : <input type="password" name="p1" id="p1"></label>
        <label>Verification mot de passe : <input type="password" name="p2" id="p2"></label>
        <input type="submit" name="submit" value="Envoyer">
    </form>
</div>


    </div>
  </div>
</div>
 </div></div>

 <script>
  $(document).ready(function(){
    $("#passwordForm").validate({
      rules:{
        ancien:{
          remote:{
            url: 'ajax/checkPassword.php',
            type: 'post',
            data: {
              password : function(){
                return $('#ancien').val();
              }
            }
          }
        },
        p1: {
          minlength : 5,
          maxlength : 30
        },
        p2: {
          equalTo: "#p1"
        }
      },
      messages:{
        ancien:{
          remote: 'Mot de passe incorrecte'
        },
        p1: {
          minlength : 'Le mot de passe doit contient au moin 5 caracteres',
          maxlength : 'Le mot de passe doit contient 30 caracteres maximum'
        },
        p2: {
          equalTo: 'mot de passe incorrecte'
        }
      }
    });
  });
 </script>

 <?php
  include 'includes/footer.php';?>

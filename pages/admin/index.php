<?php
include 'includes/header.php';
include 'includes/side_bar.php';

$user_session=$_SESSION["id_user"];
 $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
 $sql='SELECT * FROM user WHERE id_user='.$user_session;

  $query1 = $db->prepare($sql);
  $query1->execute();

 ?><style type="text/css"> .trash { color:rgb(209, 91, 71); }.flag { color:rgb(248, 148, 6); }.panel-body { padding:0px; }.panel-footer .pagination { margin: 0; }.panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }.panel-body .radio, .checkbox { display:inline-block;margin:0px; }.panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }.list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}.list-group { margin-bottom:0px; }
    </style>
 <?php
 if(isset($_POST['submit'])){
   $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
   $ancien=$_POST['ancien'];
   $nmdp=$_POST['p1'];
   $vmdp=$_POST['p2'];
   $db->query('UPDATE user SET code_acces = "'.$nmdp.'" WHERE id_user = '.$_SESSION['id_user']); }?>
 <div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Acceuil</h1>
            </div>
      <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-12">
          
               <style type="text/css">
            @import url(http://fonts.googleapis.com/css?family=Lato:400,700);
            body{    font-family: 'Lato', 'sans-serif';   }.profile {    min-height: 355px;    display: inline-block;    }figcaption.ratings{    margin-top:20px;                }            figcaption.ratings a{    color:#f1c40f;    font-size:11px;    }figcaption.ratings a:hover{    color:#f39c12;    text-decoration:none;    }
            .divider             {    border-top:1px solid rgba(0,0,0,0.1);    }.emphasis {    border-top: 4px solid transparent;    }.emphasis:hover {    border-top: 4px solid #1abc9c;                }.emphasis h2{    margin-bottom:0;    }span.tags {    background: #1abc9c;    border-radius: 2px;    color: #f5f5f5;    font-weight: bold;    padding: 2px 4px;                }.dropdown-menu {    background-color: #34495e;       box-shadow: none;    -webkit-box-shadow: none;    width: 250px;    margin-left: -125px;                left: 50%;    }.dropdown-menu .divider {    background:none;     }.dropdown-menu>li>a {    color:#f5f5f5;    }.dropup .dropdown-menu {    margin-bottom:10px;                }.dropup .dropdown-menu:before {    content: "";    border-top: 10px solid #34495e;    border-right: 10px solid transparent;    border-left: 10px solid transparent;                position: absolute;    bottom: -10px;    left: 50%;    margin-left: -10px;    z-index: 10;}
                </style> 
                <form action="index.php" method="POST"><link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

<div class="container">
  <div class="row">
    <div class=" col-md-8  col-lg-6">
       <div class="well profile">
         
            <div class="col-sm-12">
                  <div class="col-xs-12 col-sm-11">
                <?php
      while($ligne = $query1->fetch())
        { ?>       <h2> <?php ECHO $ligne['username']; ?></h2>
                    <p><strong>Nom:</strong> <?php ECHO $ligne['nom']; ?></p>
                    <p><strong>Penom:</strong><?php ECHO $ligne['prenom']; ?></p>
                     <p><strong>Direction:</strong> <?php ECHO $ligne['direction']; ?></p>
                      <p><strong>Division:</strong> <?php ECHO $ligne['division']; ?></p>
                       <p><strong>e_mail:</strong><?php ECHO $ligne['email']; ?></p>
                        <p><strong>Telephone:</strong> <?php ECHO $ligne['telephone']; ?> </p>
                         <p><strong>Adresse:</strong> <?php ECHO $ligne['adresse']; ?></p>
                          <p><strong>privilege: </strong>
                        <span class="tags">//</span> 
                        <span class="tags">//</span>
                        <span class="tags">//</span>
                        <span class="tags">//</span>
                         </p>
                </div>             
                
            </div>            
            <div class="col-xs-12 divider text-center">
            
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> nb taches </strong></h2>                    
                    <p><small>taches</small></p>
                  
                    <a href="mes_taches.php" class="btn btn-primary"><span class="glyphicon glyphicon-tasks"></span> Tâches</a>
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>nb even</strong></h2>                    
                    <p><small>évenements</small></p>
                   
                     <a href="events.php" class="btn btn-primary"><span class="glyphicon glyphicon-calendar"></span> Evenement</a>

                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>43</strong></h2>                    
                    <p><small>Snippets</small></p>
                    <div class="btn-group dropup btn-block">
                      <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> // </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> //  </a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:validateField();" data-toggle="modal" data-target="#psw"><span class="fa fa-warning pull-right"></span>changer de mot de passe</a></li>
                        <!--class="theme-color accountFormToggleBtn display-block"-->
                        <li class="divider"></li>
                       <?php }?>
                      </ul>
                    </div></div>
            </div></div>                 
    </div>













            
      
<!--panel 2-->



     






   
<!-- Small modal -->
 <div id="psw" class="modal fade" role="dialog">
    <div class="modal-dialog ">

      <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" name="edit" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">modification de mot de passe </h4>
        </div>
        <div class="modal-body">
        <div name="changmdp4" id="changmdp4" class="cachediv">
          <form  action="index.php" role="form" id="passwordForm"  method="POST">
              <label>Mot de passe actuel : <input type="password" name="ancien" id="ancien"></label>
              <label>Nouveau mot de passe : <input type="password" name="p1" id="p1"></label>
              <label>Verification du mot de passe : <input type="password" name="p2" id="p2"></label>
              <input type="submit" name="submit" value="Envoyer">
          </form>
        </div>
       </div>
      </div>
    </div>
 </div>
 </div>
 </div>


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
              }            }          }        },
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
          remote: 'Mot de passe incorrect'
        },
        p1: {
          minlength : 'Le mot de passe doit contenir au moins 5 caracteres',
          maxlength : 'Le mot de passe doit contenir 30 caracteres maximum'
        },
        p2: {
          equalTo: 'mot de passe incorrect'
        }
      }
    });
  });
 </script>

 <?php
  include 'includes/footer.php';?>

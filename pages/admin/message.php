<?php 
include'includes/header.php';
include 'includes/side_bar.php';
?>

<style type="text/css">
.nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
.tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
.tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
.tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
.tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
.tab-pane .list-group .glyphicon { margin-right:5px; }
.tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
a.list-group-item.read { color: #222;background-color: #F3F3F3; }
hr { margin-top: 5px;margin-bottom: 10px; }
.nav-pills>li>a {padding: 5px 10px;}

.ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
.ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
.ad a.url {color: #093;text-decoration: none;}
<?php

                            $bdd = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
                            $req1 = $bdd->prepare('SELECT *
                                                   FROM notification,user
                                                   WHERE id_sender = id_user and  id_notif  = '.$_GET['id']);
                            $req1->execute();
                            $result = $req1->fetch();
?>

</style>

  <div id="page-wrapper">

  	 <div class="row">
                
                <div class="col-lg-8">
                    <br>
                	<h1>Inbox</h1>
                </div>
                <div class="col-lg-4">
                    <div class="panel-heading">
                 </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <hr>

    <div class="row">
         <div class="col-sm-3 col-md-2">
      <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#compose">Nouveau message</button>
      <hr />
      <ul class="nav nav-pills nav-stacked">
        <li <?php if(isset($_GET['type'])) echo ($_GET['type'] == '2') ? '' : 'class="active"'; else echo 'class="active"'; ?>><a href="inbox.php"><span class="badge pull-right"><?php echo $_GET['n']; ?></span> Inbox </a>
        </li>
        <li <?php if(isset($_GET['type'])) echo ($_GET['type'] == '2') ? 'class="active"' : ''; ?>><a href="inbox.php?type=2">Sent</a></li> 
      </ul>
    </div>
        <div class="col-sm-9 col-md-10">
            <!-- Nav tabs -->
      
             <p> <b>Mail from : </b><?php echo $result['username'] ?> </p>
             <p> <b>Subject : </b><?php echo $result['type'] ?> </p>
             <p> <b>Date creation: </b><?php echo $result['date_envoie'] ?> </p>
            <b>Message : </b>
            <pre>

            <?php echo $result['message'] ?> </pre>






        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
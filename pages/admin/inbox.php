<?php
include 'scripts_php/delete_messages.php';
include 'includes/header.php';
include 'includes/side_bar.php';
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
include 'scripts_php/compose.php';
if(isset($_GET['type']) && $_GET['type'] == '2'){
  $query = $db->query('SELECT * FROM notification WHERE id_sender ='.$_SESSION['id_user'].' ORDER BY date_envoie desc');
}else{
  $query = $db->query('SELECT * FROM notification WHERE id_reciever ='.$_SESSION['id_user'].' ORDER BY date_envoie desc');
}
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header">Inbox</h1>
      <!-- page header -->
    </div>
    <!-- end  col 12 -->
  </div>
  <div class="row">
    <div class="col-sm-3 col-md-2">
      <button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#compose">Nouveau message</button>
      <hr />
      <ul class="nav nav-pills nav-stacked">
        <li <?php if(isset($_GET['type'])) echo ($_GET['type'] == '2') ? '' : 'class="active"'; else echo 'class="active"'; ?>><a href="inbox.php"><span class="badge pull-right"><?php echo $query->rowCount(); ?></span> Inbox </a>
        </li>
        <li <?php if(isset($_GET['type'])) echo ($_GET['type'] == '2') ? 'class="active"' : ''; ?>><a href="inbox.php?type=2">Sent</a></li> 
      </ul>
    </div>
    <div class="col-sm-9 col-md-10"> 
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
        <form action="inbox.php<?php if(isset($_GET['type'])) echo '?type='.$_GET['type']; ?>";" method="POST">
          <div class="list-group">
            <?php $n = $query->rowCount();
            while ($row = $query->fetch()){

              if(isset($_GET['type']) && $_GET['type'] == '2'){
                $id = $row['id_reciever'];
              }else{
                $id = $row['id_sender'];
              }
              $name = $db->query('SELECT * FROM user WHERE id_user ='.$id);
              $name = $name->fetch();

              $timestamp = $row['date_envoie'];
              $timestamp = explode(" ", $timestamp);
              $timestamp = explode(":", $timestamp[1]);

              ?>

              <a href="<?php echo 'message.php?id='.$row['id_notif'].'&n='.$n; ?>" class="list-group-item">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="messages[]" value="<?php echo $row['id_notif']; ?>">
                  </label>
                </div>
                <span class="name" style="min-width: 120px;display: inline-block;"><?php echo $name['nom']; ?> <?php echo $name['prenom']; ?></span> <span class=""><?php echo $row['titre']; ?></span>
                <span class="text-muted" style="font-size: 11px;">- <?php echo substr($row['message'], 0,20).'...'; ?></span> <span
                class="badge"><?php echo $timestamp[0].':'.$timestamp[1]; ?></span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
              </span></span></a>
              <?php } ?>
            </div>
            <br>
            <button class="btn btn-danger pull-right" type="submit" name="delete">supprimer</button>
          </form>
          </div>
        </div>
        <!-- Ad -->

      </div>
    </div>
    <!-- END ROW -->
    <!-- MODAL COMPOSE MESSAGE -->
    <?php include 'modals/compose_modal.php'; ?>
    <!-- END MODAL COMPOSE MESSAGE -->
  </div>

  <?php include 'includes/footer.php';?>

<?php
include 'scripts_php/delete_user.php';
include 'scripts_php/edit_users.php';
include 'scripts_php/add_users.php';
include 'includes/header.php';
include 'includes/side_bar.php';

$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
$sql='SELECT * FROM user';
$query = $db->prepare($sql);
$query->execute();
?>



<div id="page-wrapper">

  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header">Utilisateur</h1>
      <button class="btn btn-primary" data-toggle="modal" data-target="#ajouter_user"><i class="fa fa-plus-circle"></i> Nouveau utilisateur</button>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <form method="POST" action="user.php">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>telephone</th>
                  <th>e_mail</th>
                  <th>privilege</th>
                  <th>éditer (éditer privilége)</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($ligne = $query->fetch())
                {
                 if($ligne['priv_projet'] = '1,2,3,4'and $ligne['priv_user'] = '1,2,3,4'
                  and $ligne['priv_event'] = '1,2,3,4'and $ligne['priv_tache'] = '1,2,3,4'
                  and $ligne['priv_doc'] = '1,2,3,4')
                  { $priv= 'administrateur';}
                else {$priv='membre';}
                
                echo "<tr>";
                echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_user']."'>"."</td>";

                echo "<td align='center'>".$ligne['username']."</td>";
                echo "<td align='center'>".$ligne['telephone']."</td>";
                echo "<td align='center'>".$ligne['email']."</td>";
                echo "<td align='center'>".$priv."</td>";
                echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#edit_user" onclick="triggerModal('.$ligne['id_user'].');"></a></td>';
                echo "</tr>";
              }
              ?>
            </tbody>
        </table>
        <button class="btn btn-danger pull-left" type="submit" name="delete">Supprimer</button>
        </form>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.panel-body -->
  </div>
  <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->





<!-- /.row -->
<?php include 'modals/add_user.php';
include 'modals/edit_user.php'; 
?>

<?php
include 'includes/footer.php';
?>

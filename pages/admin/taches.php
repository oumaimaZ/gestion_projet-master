<?php
include 'scripts_php/add_tache.php';
include 'includes/header.php';
include 'includes/side_bar.php';

?>




<?php

if(isset($_GET['filtre']) && $_GET['filtre'] == '2'){
 $user_session=$_SESSION["id_user"];
 $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');


 $sql = 'SELECT distinct p.titre ,t.*,round((total/nb),0)as evolution
 from projet p,tache t,user u,(select count(id_tache)as nb,id_projet from tache  group by id_projet)a,(select sum(progression)as total,id_projet from tache group by id_projet )b
 where t.id_projet=p.id_projet
 and t.username=u.username
 and a.id_projet=p.id_projet
 and b.id_projet=p.id_projet
 and u.id_user='.$user_session.'
 group by  p.titre';
 $query = $db->prepare($sql);
 $query->execute();
}else{
  $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

  $sql = 'SELECT distinct p.titre ,t.*,round((total/nb),0)as evolution
  from projet p,tache t,user u,(select count(id_tache)as nb,id_projet from tache  group by id_projet)a,(select sum(progression)as total,id_projet from tache group by id_projet )b
  where t.id_projet=p.id_projet
  and t.username=u.username
  and a.id_projet=p.id_projet
  and b.id_projet=p.id_projet

  group by  p.titre';
  $query = $db->prepare($sql);
  $query->execute();
}

?>

<div id="page-wrapper">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header">Mes taches</h1>
      <button class="btn btn-primary col-md-2" data-toggle="modal" data-target="#add_tache"><i class="fa fa-plus-circle"></i> Ajouter des taches </button>
      <div class="col-md-10">
        <form class="form-inline">
          <div class="form-group pull-right">
            <label for="filtre">Filtre par : </label>
            <select id="filtre" class="form-control" onchange="reload();">
              <option value="<?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? '1' : '2'; else echo '1'; ?>"><?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? 'Toute les taches' : 'Mes taches'; else echo 'Toute les taches'; ?></option>
              <option value="<?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? '2' : '1'; else echo '2'; ?>"><?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? 'Mes taches' : 'Toute les taches'; else echo 'Mes taches'; ?> </option>
            </select>
          </div>
        </form>
      </div>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <br>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="dataTable_wrapper">
            <h4> liste des projets </h4>
            <div class="panel-body">
              <div class="form-group">
                <div class="col-sm-8" > 
                  <div class="list-group">
                   <?php
                   while($ligne = $query->fetch())
                   {
                    echo "<button   class='b list-group-item' data-toggle='modal' data-target='#a' value=".$ligne['id_projet']."><label>".$ligne['titre']."</label><div class='progress'>
                    <div class='progress-bar progress-bar-striped' style='width: ".$ligne['evolution']."%'>".$ligne['evolution']."%</div>
                  </div></button>";}
                  ?>
                </div>
              </div>
            </div>
          </div>

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

<!-- Modal -->
<div id="a" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class=" modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">details projet_tache</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
         <div class="modal-body">
          <form class="form-horizontal" role="form" action="mes_taches.php" method="POST">
            <div class="a1 form-group">
            </form>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- end Modal -->
</div>

<?php  include 'modals/add_tache.php';?>
<script>
  $(document).ready(function(){
    var maxField = 5; 
    var addButton = $('#add_group'); 
    var wrapper = $('#holder');
    var fieldHTML = '<div class="form-group"> <label class="control-label col-md-2" for="user">Tache</label> <div class="col-md-3"> <input type="text" name="titres[]" class="form-control" placeholder="Titre" required> </div> <div class="col-md-3"> <input type="text" name="users[]"class="form-control" placeholder="Utilisateur" required></div> <div class="col-md-4"><input type="date" name="dates[]" class="form-control" placeholder="Date butoir" required></div></div>';
    var x = 1; //Initial field counter is 1

    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
          }else{
            alert('vous ne pouver pas ajouter plus de ' + x + ' taches');
          }
        });

  });
</script>
<!-- Modal -->
<script type="text/javascript">
  $('.b').click(function(){
    var b= $(this).val();
    $.post('ajax/detail_taches.php',{val:b},function(result){
      $('.a1').html(result)
    });
  });

</script>
<script>
  function reload(){
    $(document).ready(function(){
      document.location.href = "taches.php?filtre=" + document.getElementById('filtre').value;
    });
  }

  function changeValue(progress, value, id){
    if(document.getElementById('filtre').value == '2'){
      document.getElementById(progress).style.width = document.getElementById(value).value + '%';
      document.getElementById(progress).innerHTML = document.getElementById(value).value + '%';
      $.ajax({
        url: 'ajax/updateTask.php',
        method: 'POST',
        data:{
          progress: document.getElementById(value).value,
          id_tache: id
        }
      });
    }else {
      document.getElementById(value).disabled = true;
      alert('desolee vous ne pouver pas modifier le progres des autres');
    }
  }
</script>
<!-- END MODAL--> 
<?php
include 'includes/footer.php';
?>


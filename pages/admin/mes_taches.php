<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';

?>

      
  

<?php
  

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




?>

<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Mes taches</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#"><i class="fa fa-plus-circle"></i> nouvelle tâche</button>
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
<?php
  include 'includes/footer.php';
?>





              <!-- Modal -->
 <script type="text/javascript">
  $('.b').click(function(){
    var b= $(this).val();
    $.post('ajax/ajax.php',{val:b},function(result){
        $('.a1').html(result)
    });
  });

</script>
      <!-- END MODAL--> 
           
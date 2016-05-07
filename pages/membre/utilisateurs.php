<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>

<?php
  
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

  $sql = 'SELECT id_user,`username`, `service-division`, `direction`, `telephone`, `email`,p.titre
   from user_projet r,projet p ,user u ,(SELECT id_projet from user_projet where id_projet=2)as A
   where r.`id_user`=u.`id_user` 
   and p.id_projet=r.id_projet 
   and r.id_projet=A.id_projet
    ';

  $query = $db->prepare($sql);
  $query->execute();
  
?>
<div id="page-wrapper">
  <div class="row">
           <!-- /.col-lg-12 -->
  </div>
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="dataTable_wrapper">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>projet</th>
                                  <th>Username</th>
                                  <th>service ou division</th>
                                  <th>e-mail</th>
                                  <th>telephone</th>
                                  
                             </tr>
                          </thead>
                         <tbody>
                              <?php
                              while($ligne = $query->fetch())
                                {
                                              
                                  echo "<tr>";
                                  echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_user']."'>"."</td>";
                                  echo "<td align='center'>".$ligne['username']."</td>";
                                 echo "<td align='center'>".$ligne['titre']."</td>";
                                  echo "<td align='center'>".$ligne['service-division']."</td>";
                                echo "<td align='center'>".$ligne['email']."</td>";
                                   echo "<td align='center'>".$ligne['telephone']."</td>";
                                echo "</tr>";
                                }
                              ?>
                            </tbody>
                      </table>
                    
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
   
</div>
            
<?php
  include 'includes/footer.php';
?>
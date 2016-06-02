<!-- Modal -->
<div id="add_tache" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title">Nouvelles taches</h3>
      </div>
      <div class="modal-body">
        <form role="form" action="taches.php" method="POST" class="form-horizontal" id="tache_form">
        <div id="holder">
            <div class="form-group">
              <label class="control-label col-md-2" for="projet">Projet</label>
              <div class="col-md-10">
                <select class="form-control" name="project">
                  <?php 
                  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
                  $query = $db->query('SELECT titre, id_projet FROM projet');
                  foreach ($query as $row) {
                    echo '<option value="'.$row['id_projet'].'" >'.$row['titre'].'</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-2" for="user">Tache</label>
              <div class="col-md-3">
               <input type="text" name="titres[]" class="form-control" placeholder="Titre" required>
             </div>
             <div class="col-md-3">
               <input type="text" name="users[]" class="form-control" placeholder="Utilisateur" required>
             </div>
             <div class="col-md-4">
               <input type="text" onfocus="(this.type='date')" name="dates[]" class="form-control" placeholder="Date butoir" required>
             </div>
           </div>
         </div>
         <br><br>
         <div class="row">
           <div class="col-md-12">
             <button class="btn btn-primary pull-right" type="submit" name="create">Enregistrer les taches</button>
             <button class="btn btn-success pull-left" type="button" id="add_group">ajouter une tache</button>
           </div>
         </div>
       </form>  
     </div>
   </div>
 </div>
</div>

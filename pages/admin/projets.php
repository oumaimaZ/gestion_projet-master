<?php 
	include 'scripts_php/add_projet.php';
	include 'includes/header.php';
	include 'includes/side_bar.php';
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header">Mes projets</h1>
      <button class="btn btn-primary col-md-2" data-toggle="modal" data-target="#ajoutprojet"><i class="fa fa-plus-circle"></i> Nouveau Projet</button>

      <div class="col-md-10">
        <form class="form-inline">
          <div class="form-group pull-right">
            <label for="filtre">Filtre par : </label>
            <select id="filtre" class="form-control" onchange="reload();">
              <option value="<?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? '1' : '2'; else echo '1'; ?>"><?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? 'Tous les projets' : 'Mes projets'; else echo 'Tous les projets'; ?></option>
              <option value="<?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? '2' : '1'; else echo '2'; ?>"><?php if(isset($_GET['filtre'])) echo ($_GET['filtre'] == '1') ? 'Mes projets' : 'Tous les projets'; else echo 'Mes projets'; ?> </option>
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
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>#</th>
                  <th>nom du projet </th>
                  <th>proprietaire</th>

                  <th>statut  </th>
                  <th>date de création</th>

                  <th>modifier</th>
                  <th>détails </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include 'scripts_php/get_projets.php';
                include 'scripts_php/projet_table_rows.php';
                ?>
              </tbody>

            </table>
            <input class="btn btn-danger" type="submit" name="delete" value="Supprimer">
          </div>
        </div>
      </div>
    </div>
  </div>	
  <?php include 'modals/add_projet.php'; ?>
</div>
<script>
  function reload(){
    $(document).ready(function(){
      document.location.href = "projets.php?filtre=" + document.getElementById('filtre').value;
    });
  }
</script>
<?php include 'includes/footer.php'; ?>
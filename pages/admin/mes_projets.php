
<?php  //**********************************************creation**********************************************************
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

if (isset($_POST['submit'])){
  $titre =$_POST['titre'];
  $db = $_POST['db'];
  $participant=$_POST['participant'];
  $desc=$_POST['desc'];
  $priv=$_POST['priv'];

  $sql0='SELECT username from user WHERE id_projet='.$_SESSION["id_user"];
  $proprietaire= $db->prepare($sql0);
  $proprietaire->execute();

  if($titre != "" && $desc !="" && $db != "" && $participant !="" ){
    $sql = 'INSERT INTO projet(titre,date_butoir,description) VALUES ("'.$titre.'","'.$db.'","'.$desc.'")';
    $query = $db->prepare($sql);
    $query->execute();
    $idp=$db->LastInsertedId();
    $sql1 = 'INSERT INTO groupe(id_projet,username,priv_projet) VALUES ('.$idp.'","'.$proprietaire.'","'.$priv.'")';
    $query = $db->prepare($sql1);
    $query->execute();

  } else
  {
    echo "error";
  }
}
?>
<?php
//**************************************************modifier**********************************************************
$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

if (isset($_POST['modifier'])){

  $titre =$_POST['titreM'];
  $prop=$_POST['propM'];
  // $membre=$_POST['membreM'];
  $desc=$_POST['descM'];
  $date=$_POST['dbM'];
  $datec=$_POST['dcM'];
  $s=$_POST['statutM'];
  $idp=$_POST['id_projet'];
  // $idu=$_POST['id_user'];
  $query = $db->prepare('UPDATE projet
    SET titre = "'.$titre.'",
    statut = "'.$s.'",
    description = "'.$desc.'",
    `date_butoir` = "'.$date.'"
    WHERE id_projet = '.$idp);
    $query->execute();
    /* $query2 = $db->prepare('UPDATE `user_projet`
    SET id_user = "'.$membre.'",
    role="membre"
    WHERE id_projet = '.$idp);
    $query2->execute(); */
  }
  ?>

  <?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
  $user_session=$_SESSION["id_user"];
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');

  $sql = 'SELECT p.*,p.username as proprietaire,B.nbm  ,C.nbd,B.username,(sum(E.progression)/D.nbt) as statut,D.nbt
  FROM `projet`p ,(SELECT `id_projet`,count(`username`) as nbm, `username`
  FROM groupe
  group by `id_projet`)as B,
  (SELECT `id_projet`,`id_doc` ,count(`id_doc`) as nbd
  FROM `document`
  group by id_projet) as C,
  (SELECT`id_projet`,count(id_tache) as nbt
  FROM tache
  group by `id_projet`)as D,
  (SELECT `id_projet`,`progression`
    FROM tache
    group by `id_projet`)as E

    WHERE B.`id_projet`=p.`id_projet`
    and C.`id_projet`=p.`id_projet`
    and D.`id_projet`=p.`id_projet`
    and E.`id_projet`=p.`id_projet`
    group by `id_projet`';

    $query = $db->prepare($sql);
    $query->execute();

    ?>

    <div id="page-wrapper">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-header">Mes projets</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#ajoutprojet"><i class="fa fa-plus-circle"></i> Nouveau Projet</button>
        </div>
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
                      <th>nom du projet </th>
                      <th>proprietaire</th>
                      <th>détails    </th>
                      <th>statut  </th>
                      <th>date de création</th>
                      <th>date butoir</th>
                      <th>description</th>
                      <th>modifier</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while($ligne = $query->fetch())
                    {
                      $doc="docs /" ;$user="users /";$tache="taches";
                      if($ligne['statut'] < '10') $stat= 'ouvert';
                      else if($ligne['statut'] > '11') $stat= 'en cours';
                      else if($ligne['statut'] > '98') $stat='achevé';
                      echo "<tr>";
                      echo "<td align='center'><input name='checkbox[]' type='checkbox' id='checkbox[]' value='".$ligne['id_projet']."'>"."</td>";
                      echo "<td align='center'>".$ligne['titre']."</td>";
                      echo "<td align='center'>".$ligne['proprietaire']."</td>";
                      echo "<td align='center'>".$ligne['nbm'].$user.$ligne['nbd'].$doc.$ligne['nbt'].$tache."</td>";
                      echo "<td align='center'>".$stat."</td>";
                      echo "<td align='center'>".$ligne['date_creation']."</td>";
                      echo "<td align='center'>".$ligne['date_butoir']."</td>";
                      echo "<td align='center'>".$ligne['description']."</td>";
                      echo'<td align="center"><a class="menu-icon fa fa-pencil" data-toggle="modal" data-target="#modifier" onclick="triggerProjectModal('.$ligne['id_projet'].');"></a></td>';
                      echo "</tr>";
                    }
                    ?>
                  </tbody>

                </table>
                <input class="btn btn-danger" type="submit" name="delete" value="Supprimer">
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
      <div id="ajoutprojet" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Nouveau Projet</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form" action="mes_projets.php" method="POST">

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="titre">Titre du projet</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="titre" name="titre" placeholder="Projet"/>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="titre">Date butoir</label>
                  <div class="col-sm-10">
                    <input type="Date" class="form-control" id="db" name="db" />
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="participant">participant</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="participant" name="participant" />
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="titre">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="desc" name="desc" /></textarea>
                  </div>
                </div>




                <div class="form-group">
                  <div class="col-sm-12">
                    <button class="b btn btn-primary pull-right" data-toggle="modal" data-target="#ajoutprivilege">créer</button>

                    <!--end of modal -->
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div id="ajoutprivilege" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class=" modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">affectation des priviléges</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form">
                <div class="modal-body">
                  <form class="form-horizontal" role="form" action="mes_projets.php" method="POST">


                    <div class="a1 form-group">
                      <script type="text/javascript">
                      $('.b').click(function(){
                        var b= $(this).val();
                        $.post('ajax/privilege_projet.php',{val:b},function(result){
                          $('.a1').html(result)
                        });
                      });

                      </script>

                    </form>
                  </div>
                </form>
              </div>
            </div>

          </div>
        </div>
        <!-- end Modal -->

        <!-- Modal -->
        <div id="modifier" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <form class="form-horizontal" role="form" action="mes_projets.php" method="POST">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" name="creer" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modifier les données du projet </h4>
                </div>
                <div class="modal-body">


                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">Titre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="titreM" name="titreM" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">Propriétaire</label>
                    <div class="col-sm-10">

                      <input type="text" class="form-control" id="propM" name="propM" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">participant</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="membreM" name="membreM" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">Date de création</label>
                    <div class="col-sm-10">
                      <input type="Date" class="form-control" id="dcM" name="dcM" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">Date de réalisation</label>
                    <div class="col-sm-10">
                      <input type="Date" class="form-control" id="drM" name="drM" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">Date butoir</label>
                    <div class="col-sm-10">
                      <input type="Date" class="form-control" id="dbM" name="dbM" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="titre">Description</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="descM" name="descM" /></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button class="btn btn-primary pull-right" type="submit" name="modifier">Modifier</button>
                    </div>
                  </div>
                </div>
                <input type="hidden" id="id_projet" name="id_projet" />
                <input type="hidden" id="id_user" name="id_user" />

              </form>
            </div>
          </div>


          <!-- END MODAL-->

        </div>
      </div>
      <script>
      $(document).ready(function(){
        $('#participant').tokenfield({
          autocomplete: {
            source: 'ajax/getUsersNames.php?hint=' + document.getElementById('participant').value,
            delay: 100,
            minLength: 3
          },
          showAutocompleteOnFocus: true
        });
      });
      </script>
      <script>
      $(document).ready(function(){
        $('#membreM').tokenfield({
          autocomplete: {
            source: 'ajax/getUsersNames.php?hint=' + document.getElementById('membreM').value,
            delay: 100,
            minLength: 3
          },
          showAutocompleteOnFocus: true
        });
      });
      </script>


      <?php
      include 'includes/footer.php';
      ?>

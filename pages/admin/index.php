<?php
include 'includes/header.php';
include 'includes/side_bar.php';
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-md-12">
      <h1 class="page-header">Accueil</h1>
      <!-- page header -->
    </div>
    <!-- end  col 12 -->
  </div>
  <!-- end row -->
  <!-- page header -->
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-3">
              <i class="fa fa-archive fa-5x"></i>
            </div>
            <?php $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
            $query = $db->query('SELECT count(id_projet) AS nb FROM projet WHERE username  = "'.$_SESSION['username'].'"');
            $query = $query->fetch();
            ?>
            <div class="col-md-9 text-right">
              <div class="huge"><?php echo $query['nb']; ?></div>
              <div><p>Projets en cours</p></div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <!-- end  col 3 -->

    <div class="col-md-3">
      <div class="panel panel-green">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-3">
              <i class="fa fa-tasks fa-5x"></i>
            </div>
            <?php
            $query = $db->query('SELECT count(id_tache) AS nb FROM tache WHERE username  = "'.$_SESSION['username'].'"');
            $query = $query->fetch();
            ?>
            <div class="col-md-9 text-right">
              <div class="huge"><?php echo $query['nb']; ?></div>
              <div><p>Taches en cours</p></div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <!-- end  col 3 -->

    <div class="col-md-3">
      <div class="panel panel-yellow">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-3">
              <i class="fa fa-envelope fa-5x"></i>
            </div>
            <div class="col-md-9 text-right">
              <div class="huge">X</div>
              <div><p>Messages non lu</p></div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <!-- end  col 3 -->

    <div class="col-md-3">
      <div class="panel panel-red">
        <div class="panel-heading">
          <div class="row">
            <div class="col-md-3">
              <i class="fa fa-calendar fa-5x"></i>
            </div>
            <?php 
            $query = $db->query('SELECT COUNT(*) as nb FROM   evenement WHERE  YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1)');
            $query = $query->fetch();
            ?>
            <div class="col-md-9 text-right">
              <div class="huge"><?php echo $query['nb']; ?></div>
              <div><p>Events cette semaine</p></div>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <!-- end  col 3 -->
  </div>
  <!-- end row -->
  <hr/>
  <div class="row">
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">My projects</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <canvas id="projects_chart" height="300"></canvas>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <center><h3 class="panel-title">Mes taches</h3></center>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <canvas id="tache_chart" height="300"></canvas>
            </div>
          </div>
        </div>
        <a href="#">
          <div class="panel-footer">
            <span class="pull-left">Details</span>
            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
            <div class="clearfix"></div>
          </div>
        </a>
      </div>
    </div>
  </div>
  <!-- end row -->
</div>
<script type="text/javascript" src="js/taches.js"></script>
<script type="text/javascript" src="js/projectChart.js"></script>

<?php include 'includes/footer.php';?>

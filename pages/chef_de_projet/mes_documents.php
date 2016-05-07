<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
?>
<div id="page-wrapper">
  <div class="row">
      <div class="col-md-12">
          <h1 class="page-header">Mes documents</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#ajoutDoccument"><i class="fa fa-plus-circle"></i> Nouveau document</button>
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
                                  <th>Titre</th>
                                  <th>Nom du projet</th>
                                  <th>Date de création</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="odd gradeX">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="even gradeC">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>
                              <tr class="odd gradeA">
                                  <td>Titre 1</td>
                                  <td>Projet 1</td>
                                  <td>23-03-2016</td>
                              </tr>

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

  <!-- Modal -->
  <div id="ajoutDoccument" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">nouveau document</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form">
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">Titre</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="projets">Projet Concerné</label>
              <div class="col-sm-10">
                <select id="projets" class="form-control">
                  <option>projet1</option>
                  <option>projet2</option>
                  <option>projet3</option>
                  <option>projet4</option>
                  <option>projet5</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label" for="titre">Importer un  doccument (pdf)</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" id="titre" placeholder="Titre"/>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-primary pull-right">Importer</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<?php
  include 'includes/footer.php';
?>

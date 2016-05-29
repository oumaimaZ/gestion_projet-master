<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
	$p=$_POST['val'];

$query = $db->prepare('SELECT t.* FROM `tache` t WHERE t.id_projet ='.$p);

	$query->execute();
	while($ligne = $query->fetch())
           { 

              

               echo " <div class='col-lg-6 panel panel-default'>
		              <div class='panel-body'>
		              <div class='col-lg-10'>
			                 <div class='form-group col-lg-10'>
			              <label class='col-lg-8 control-label'>".$ligne['nom_tache']."</label></div></div>
              <div class='form-group'>
              <div class='col-sm-9'>
              <div class='progress'>
                      <div class='progress-bar progress-bar-striped' style='width: ".$ligne['progression']."%'>".$ligne['progression']."%</div>
                 </div></div></div>
                 <div class='form-group'>
                  <label  class='col-sm-4 control-label' >editer la progression </label>
                  <div class='col-xs-4'> <input type='number' min='0'max='100' class='form control' value='".$ligne['progression']."'>
                        </div>
                        </div>
                 </div>
                 
                        <div class='form-group'>
                         <label  class='col-sm-4 control-label' >date d'affectation</label>
                      <div class='col-xs-4'> ".$ligne['date_affectation']."
                        </div>
                        </div>

                 <div class='form-group'>
                      <label  class='col-sm-4 control-label' >date butoir</label>
                      <div class='col-xs-4'> ".$ligne['date_butoir']."
                        </div>
                        </div>
                        
                         
					</div></div>

              "



                 ;
          }
?>
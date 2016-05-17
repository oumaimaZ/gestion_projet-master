<script>

     $('#p1').change(function(){
        if($("#p1").is(":checked")) {
          $('#p2').attr("disabled",false);
           $('#p3').attr("disabled",false);
            $('#p4').attr("disabled",false);
             $('#p5').attr("disabled",false);
        }
        else{
          $('#p2').attr("disabled",true);
           $('#p3').attr("disabled",true);
            $('#p4').attr("disabled",true);
             $('#p5').attr("disabled",true);

        }
     });

</script>

<?php
	$db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
	$p=$_POST['val'];

$query = $db->prepare('SELECT p.*,g.username as participant
                   FROM projet p,groupe g
                    WHERE p.id_projet=g.id_projet
                    and p.id_projet ='.$p);


	$query->execute();
	while($ligne = $query->fetch())
           {



               echo " <div class='panel panel-default'>
		              <div class='panel-body'>
		              <div class='col-lg-9'>
			                 <div class='form-group'>
			              <label class='col-md-3 control-label'>".$ligne['participant']."</label></div></div>

                 <div class='form-group'>
                  <label  class='col-sm-4 control-label' >privilege du projet  </label>
                  <div class='panel panel-default'>

                                            <div class='panel-heading'>
                                                    <input name='p[]' type='checkbox' id='p1' value='1'>   p</div>
                                            <div class='panel-body'>
                                                    <div class='checkbox'>
                                                      <label><input type='checkbox' name='p[]' id='p2'value='2' disabled unchecked>creer</label>
                                                    </div>

                                                    <div class='checkbox'>
                                                      <label><input type='checkbox'name='p[]'id='p3' value='3' disabled checked>consulter</label>
                                                    </div>
                                                    <div class='checkbox'>
                                                      <label><input type='checkbox' name='p[]' id='p4'value='4' disabled unchecked>supprimer</label>
                                                    </div>

                                                    <div class='checkbox'>
                                                      <label><input type='checkbox'name='p[]'id='p5' value='5' disabled checked>editer</label>
                                                    </div>

                                            </div>

                                            <div class='panel-footer'>
                                              <div class='checkbox'>
                                              <label><input type='checkbox' id='p6'name='p[]' value='6'>Mes ps(tous les priv)</label>
                                              </div>
                                            </div></div>

                                            </div>

                        </div>
                       </div></div>

              ";
          }
?>

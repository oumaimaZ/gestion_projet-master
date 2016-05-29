
<!-- Modal detail -->

<?php
  $db = new PDO('mysql:host=localhost;dbname=mgp_data;charset=utf8', 'root', '');
  $id=$_POST['val'];
//$u=$_GET['id_user'];
$query = $db->prepare('SELECT * FROM `projet` p WHERE p.id_projet ='.$id);
  $query->execute();
$query0 = $db->prepare('SELECT  p.titre projet,t.nom_tache,t.progression,t.username,round((total/nb),0)as progproj,total,nb
from projet p,tache t,user u,(select count(id_tache)as nb,id_projet from tache  group by id_projet)a,
                             (select sum(progression)as total,id_projet from tache group by id_projet )b
                              where t.id_projet=p.id_projet
                             and t.username=u.username
                             and a.id_projet=p.id_projet
                             and b.id_projet=p.id_projet
                             and p.id_projet='.$id);
  $query0->execute();
 
$query1 = $db->prepare('SELECT  round((total/nb),0)as progproj
from projet p,tache t,user u,(select count(id_tache)as nb,id_projet from tache  group by id_projet)a,
                             (select sum(progression)as total,id_projet from tache group by id_projet )b
                              where t.id_projet=p.id_projet
                             and t.username=u.username
                             and a.id_projet=p.id_projet
                             and b.id_projet=p.id_projet
                             and p.id_projet='.$id.'
                             group by p.id_projet');
  $query1->execute();
$prog = $query1->fetch();
 
 $query2 = $db->prepare('SELECT d.* from document d
      where  id_projet='.$id);
  $query2->execute();

$query3 = $db->prepare('SELECT e.* from evenement e
      where  id_projet='.$id);
  $query3->execute();



  if ( $prog['progproj']<1) $statut='(ouvert)';
else if ( $prog['progproj']>1 & $prog['progproj']<100) $statut='(en cours )';
else if  ( $prog['progproj']=100) $statut='(achevée)';                          

  while($ligne = $query->fetch())


           { echo "
          <h3 class='modal-title'> ".$ligne['titre']."   ".$statut."</h3>         
          <div class='col-xs-4'> crée le :".$ligne['date_creation']."</div>
          <div class='col-xs-6'> prévu d'etre achevé le:".$ligne['date_butoir']."</div>
          <div class='form-group '>
           <div class='col-sm-7 '>  ".$ligne['description']." </div>
         </div>
       </div>";
       }?>
       
       <div class="modal-body">
        <div class='panel panel-default'>
        
          <div class='panel-body'>
           
<!-- taches--> 

            <div class='col-md-12 panel panel-default'>
              <div class='panel-heading'>
                Tache
              </div> 

            <div class='panel-body'>
           <?php  
            while($ligne = $query0->fetch())

           { echo "   
                <div class=' form-group'>
                <div class=' col-xs-3'>
                 <label class='control-label'> ".$ligne['username']."</label>
               </div>
              <div class=' col-xs-4 '>
                <div class='progress'>
                  <div class='progress-bar progress-bar-striped' style='width: ".$ligne['progression']."%'>".$ligne['progression']."%</div>
                </div>
              </div>
               <div class='col-xs-4'>
                ".$ligne['nom_tache']."
                </div>
                </div>
                ";}?>
            </div>


          </div>
<!-- end taches-->
<!-- documents -->
          <div class="col-md-6">
          <div class='panel panel-default'>
              <div class='panel-heading'>
                Documents
              </div> 
            <div class='panel-body'>
                <div class='form-group'>
             <?PHP  while($ligne = $query2->fetch())


           {   $nom=$ligne['nom_fichier'];
                      if($dossier = opendir('../bibliotheque'))
                      {
                        while(false !== ($fichier = readdir($dossier)))
                        {
                          if($fichier != '.' && $fichier != '..' && $fichier != 'mes_taches.php')
                          {
                            if( $fichier =basename($nom).PHP_EOL)
                              echo ' <div class="col-xs-6"><a href="../bibliotheque/' . $fichier . '">' . $fichier . '</a></div>';break;
                          }
                        }
                        closedir($dossier);
                      }
                      else  echo 'Le dossier n\' a pas pu être ouvert';
                    }
                ?>
                 </div>
            </div>

          </div>
          </div>

<!-- end documents-->


<!-- documents -->
          <div class="col-md-6">
          <div class='panel panel-default'>
              <div class='panel-heading'>
                évenement 
              </div> 
            <div class='panel-body'>
                <div class='form-group'>
             <?PHP  while($ligne = $query3->fetch())


           { echo "
         <div class='col-xs-12'><label><li> ".$ligne['objet']."à ".$ligne['heure']." </li> </label></div>        
          
         
          
           <div class='col-sm-7 '>  ".$ligne['description']." </div>
         
       ";
       }?>
                 </div>
            </div>

          </div>
          </div>

<!-- end documents-->



        </div>
      </div>
    </div>
  </div>
</div>

<!-- - -end of modal body- -->




<?php
  include 'includes/header.php';
  include 'includes/side_bar.php';
 ?>


 
 <div id="page-wrapper">
   <div class="row">
       <div class="col-md-12">
           <h1 class="page-header">Synthése</h1>
       </div>
       <!-- /.col-lg-12 -->
                    <form action="index.php" method="post">
            <input type="checkbox" name="options[]" value="1" /> Machine à bulles
            <input type="checkbox" name="options[]" value="2" /> Projection photos vidéos en live sur vidéoprojecteur
            <input type="checkbox" name="options[]" value="3" /> Machine à confettis ou T-shirt
            <input type="checkbox" name="options[]" value="4" /> Sonorisation pour vin d'honneur
            <input type="checkbox" name="options[]" value="5" /> Pack de 10 octolights
            <input type="checkbox" name="options[]" value="6" /> Magicien
            <input type="submit" name="submit" value="ok" />
            </form>
   </div><?php
 
 if (isset($_POST['submit'])){

      foreach($_POST['options[]'])
      {$check = implode('/',$_POST['options[]']); }
      echo $check;}
   
    header("location: index.php");
?>
 </div>
 <?php
  include 'includes/footer.php';
  ?>
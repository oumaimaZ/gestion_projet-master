<?php
include 'includes/header.php';
include 'includes/side_bar.php';
?>
<div id="page-wrapper">
  <button class="btn btn-primary" onclick="add();">Add</button>
  <div id="holder"></div>
</div>

<script>
  function add(){
    $(document).ready(function(){
      var content = '<div class="form-group" >'+
        '<input type="text" class="form-controle" />'+'
      </div>';
      $('#holder').append(content);
    });
  }
</script>
<?php include 'includes/footer.php'; ?>

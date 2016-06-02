<div class="modal fade" id="compose" role="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       <h4 class="modal-title">Compose Message</h4>
     </div>
     <form role="form" class="form-horizontal" method="POST" action="inbox.php">
      <div class="modal-body">

        <div class="form-group">
          <label class="col-sm-2" for="inputTo">À</label>
          <div class="col-sm-10"><input type="text" class="form-control" id="inputTo" name="to"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="type">type</label>
          <div class="col-sm-10">
            <select class="form-control" id="type" name="type">
              <option>Important</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2" for="inputSubject">Objet</label>
          <div class="col-sm-10"><input type="text" class="form-control" id="inputSubject" name="sujet"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-12" for="inputBody">Message</label>
          <div class="col-sm-12"><textarea class="form-control" id="inputBody" rows="9" name="msg"></textarea></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
        <button type="submit" name="sd" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>

      </div>
    </form>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal compose message -->
<script type="text/javascript">
    $('#inputTo').autocomplete({
          source: 'ajax/getUsersNames.php' 
      });
</script>
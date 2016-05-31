<script>
function back(){
	$("#result").load("mod/mod_model/select.php");
}
$(document).ready(function() {
	$("#result").load("mod/mod_model/select.php");
});
</script>

<div class="x_panel">
	<div class="x_title">
		<h2>Manage Model</h2>
		<button type="button" class="btn btn-sm btn-info" style="float:right;" data-toggle="modal" data-target="#tambah">
		  <i class="fa fa-plus-circle"></i> Add Model
		</button>
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div id="result"></div>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Data Model</h4>
      </div>
			<form action="" method="POST" class="form-horizontal form-label-left">
	      <div class="modal-body">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Model Name</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="text" class="form-control" name="models_name" id="models_name" placeholder="Enter Model Name" >
						</div>
					</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	        <button type="button" class="btn btn-primary" id="insert" style="margin-bottom:5px;">Save</button>
	      </div>
			</form>
    </div>
  </div>
</div>
<script>
$('#insert').click(function(){
	var models_name = $('#models_name').val();
	var datas="models_name="+models_name;
	if (models_name==""){
		alert('Form still empty!');
	}else{
		$.ajax({
			type: "POST",
			url: "mod/mod_model/action.php?add",
			data: datas
		}).done(function(data){
			$('#models_name').val('');
			back();
		})
		$('#insert').attr("data-dismiss", "modal");
		$( '.modal-backdrop' ).remove();
	}
})
</script>

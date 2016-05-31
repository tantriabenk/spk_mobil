<script>
function back(){
	$("#result").load("mod/mod_car/select.php");
}
$(document).ready(function() {
	$("#result").load("mod/mod_car/select.php");
});
</script>

<div class="x_panel">
	<div class="x_title">
		<h2>Manage Car</h2>
		<button type="button" class="btn btn-sm btn-info" style="float:right;" data-toggle="modal" data-target="#tambah">
		  <i class="fa fa-plus-circle"></i> Add Car
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
        <h4 class="modal-title" id="myModalLabel">Add Data Car</h4>
      </div>
			<form action="" method="POST" class="form-horizontal form-label-left">
	      <div class="modal-body">
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Car Name</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="text" class="form-control" name="car_name" id="car_name" placeholder="Enter Car Name" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Seat Capacity</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="number" class="form-control" name="seat_cap" id="seat_cap" placeholder="Enter Seat Capacity" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Engine Capacity</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="number" class="form-control" name="engine_cap" id="engine_cap" placeholder="Enter Engine Capacity" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Year</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select name="year" id="year" class="form-control">
								<?php
								$year = date("Y");
								for($i=($year-5); $i<($year+5); $i++){
									echo "<option value='$i'>$i</option>";
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Price High</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="number" class="form-control" name="price_high" id="price_high" placeholder="Enter Price High" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Price Low</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<input type="number" class="form-control" name="price_low" id="price_low" placeholder="Enter Price Low" >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Color</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select name="color_id" id="color_id" class="form-control">
								<?php
								$color = "colors";
								$fildc = "*";
								foreach($dbase->select($color, $fildc) as $datac){
									echo "<option value='$datac[color_id]'>$datac[color_name]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Model</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select name="models_id" id="models_id" class="form-control">
								<?php
								$models = "models";
								$fildm = "*";
								foreach($dbase->select($models, $fildm) as $datam){
									echo "<option value='$datam[models_id]'>$datam[models_name]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Fuel</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select name="fuels_id" id="fuels_id" class="form-control">
								<?php
								$fuels = "fuels";
								$fildf = "*";
								foreach($dbase->select($fuels, $fildf) as $dataf){
									echo "<option value='$dataf[fuels_id]'>$dataf[fuels_name]</option>";
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4 col-sm-4 col-xs-4">Transmission</label>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<select name="transmissions_id" id="transmissions_id" class="form-control">
								<?php
								$transmissions = "transmissions";
								$fildt = "*";
								foreach($dbase->select($transmissions, $fildt) as $datat){
									echo "<option value='$datat[transmissions_id]'>$datat[transmissions_name]</option>";
								}
								?>
							</select>
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
	var car_name = $('#car_name').val();
	var seat_cap = $('#seat_cap').val();
	var engine_cap = $('#engine_cap').val();
	var year = $('#year').val();
	var price_high = $('#price_high').val();
	var price_low = $('#price_low').val();
	var color_id = $('#color_id').val();
	var models_id = $('#models_id').val();
	var fuels_id = $('#fuels_id').val();
	var transmissions_id = $('#transmissions_id').val();
	var datas="car_name="+car_name+"&seat_cap="+seat_cap+"&engine_cap="+engine_cap+"&year="+year+"&price_high="+price_high+"&price_low="+price_low+"&color_id="+color_id+"&models_id="+models_id+"&fuels_id="+fuels_id+"&transmissions_id="+transmissions_id;
	if (car_name=="" || seat_cap=="" || engine_cap=="" || price_high=="" || price_low==""){
		alert('Form still empty!');
	}else{
		//alert(datas);
		$.ajax({
			type: "POST",
			url: "mod/mod_car/action.php?add",
			data: datas
		}).done(function(data){
			$('#car_name').val('');
			$('#seat_cap').val('');
			$('#engine_cap').val('');
			$('#price_high').val('');
			$('#price_low').val('');
			back();
		})
		$('#insert').attr("data-dismiss", "modal");
		$( '.modal-backdrop' ).remove();
	}
})
</script>

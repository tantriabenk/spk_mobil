<?php include_once "../../config.php"; ?>

<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="30px">No</th>
			<th>Car Name</th>
			<th>Color</th>
			<th>Model</th>
			<th>Fuel</th>
			<th>Transmission</th>
			<th>Year</th>
			<th width="120px">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//post data
		$table = array(
			'cars c',
			'fuels f',
			'models m',
			'colors co',
			'transmissions t'
		);
		$fild = "*";
		$where = "c.color_id=co.color_id AND f.fuels_id=c.fuels_id AND m.models_id=c.models_id AND t.transmissions_id=c.transmissions_id";
		$no = 1;
		foreach($dbase->select($table, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['car_name']; ?> </td>
			<td> <?php echo $data['color_name']; ?> </td>
			<td> <?php echo $data['models_name']; ?> </td>
			<td> <?php echo $data['fuels_name']; ?> </td>
			<td> <?php echo $data['transmissions_name']; ?> </td>
			<td> <?php echo $data['year']; ?> </td>
			<td>
				<a data-toggle="modal" data-target="#ubah<?php echo $data['car_id']; ?>" class="btn btn-small btn-success" title="Update Data"><i class="fa fa-edit"> </i></a>
				<?php
					//$checkJabatan = $dbase->checkMasterJabatan($data['ID_Jabatan']);
					//if($checkJabatan==0){
				?>
				<a data-toggle="modal" data-target="#hapus<?php echo $data['car_id']; ?>" class="btn btn-small btn-danger" title="Delete Data"><i class="fa fa-trash"> </i></a>
				<?php
					//}
				?>
			</td>
		</tr>
		<div style="clear:both"></div>

		<!-- Modal Ubah Data -->
		<div class="modal fade" id="ubah<?php echo $data['car_id']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ubah">Update Data Car</h4>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Car Name</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="text" class="form-control" value="<?php echo $data['car_name']; ?>" name="car_name" id="car_name<?php echo $data['car_id']; ?>" placeholder="Enter Car Name" >
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Seat Capacity</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="number" class="form-control" value="<?php echo $data['seat_cap']; ?>" name="seat_cap" id="seat_cap<?php echo $data['car_id']; ?>" placeholder="Enter Seat Capacity" >
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Engine Capacity</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="number" class="form-control" value="<?php echo $data['engine_cap']; ?>" name="engine_cap" id="engine_cap<?php echo $data['car_id']; ?>" placeholder="Enter Engine Capacity" >
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Year</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select name="year" id="year<?php echo $data['car_id']; ?>" class="form-control">
										<?php
										$year = date("Y");
										$y = $data['year'];
										for($i=($year-5); $i<($year+5); $i++){
											if($y=="$i"){
												echo "<option value='$i' selected>$i</option>";
											}else{
												echo "<option value='$i'>$i</option>";
											}
										}
										?>
									</select>
								</div>
							</div><br/><br/>

							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Price High</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="number" class="form-control" value="<?php echo $data['price_high']; ?>" name="price_high" id="price_high<?php echo $data['car_id']; ?>" placeholder="Enter Price High" >
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Price Low</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="number" class="form-control" value="<?php echo $data['price_low']; ?>" name="price_low" id="price_low<?php echo $data['car_id']; ?>" placeholder="Enter Price Low" >
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Color</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select name="color_id" id="color_id<?php echo $data['car_id']; ?>" class="form-control">
										<?php
										$color = "colors";
										$fildc = "*";
										foreach($dbase->select($color, $fildc) as $datac){
											if($data['color_id']=="$datac[color_id]"){
												echo "<option value='$datac[color_id]' selected>$datac[color_name]</option>";
											}else{
												echo "<option value='$datac[color_id]'>$datac[color_name]</option>";
											}
										}
										?>
									</select>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Model</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select name="models_id" id="models_id<?php echo $data['car_id']; ?>" class="form-control">
										<?php
										$models = "models";
										$fildm = "*";
										foreach($dbase->select($models, $fildm) as $datam){
											if($data['models_id']=="$datac[models_id]"){
												echo "<option value='$datam[models_id]' selected>$datam[models_name]</option>";
											}else{
												echo "<option value='$datam[models_id]'>$datam[models_name]</option>";
											}

										}
										?>
									</select>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Fuel</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select name="fuels_id" id="fuels_id<?php echo $data['car_id']; ?>" class="form-control">
										<?php
										$fuels = "fuels";
										$fildf = "*";
										foreach($dbase->select($fuels, $fildf) as $dataf){
											if($data['fuels_id']=="$dataf[fuels_id]"){
												echo "<option value='$dataf[fuels_id]' selected>$dataf[fuels_name]</option>";
											}else{
												echo "<option value='$dataf[fuels_id]'>$dataf[fuels_name]</option>";
											}

										}
										?>
									</select>
								</div>
							</div><br/><br/>
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Transmission</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<select name="transmissions_id" id="transmissions_id<?php echo $data['car_id']; ?>" class="form-control">
										<?php
										$transmissions = "transmissions";
										$fildt = "*";
										foreach($dbase->select($transmissions, $fildt) as $datat){
											if($data['transmissions_id']=="$datat[transmissions_id]"){
												echo "<option value='$datat[transmissions_id]' selected>$datat[transmissions_name]</option>";
											}else{
												echo "<option value='$datat[transmissions_id]'>$datat[transmissions_name]</option>";
											}
										}
										?>
									</select>
								</div>
							</div><br/><br/>
			      </div>
			      <div class="modal-footer">
							<input type="hidden" id="car_id<?php echo $data['car_id'] ?>" value="<?php echo $data['car_id'] ?>" />
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-primary" id="update<?php echo $data['car_id']; ?>" style="margin-bottom:5px;">Save</button>
			      </div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#update<?php echo $data['car_id']; ?>').click(function(){
			var car_id = $('#car_id<?php echo $data['car_id']; ?>').val();
			var car_name = $('#car_name<?php echo $data['car_id']; ?>').val();
			var seat_cap = $('#seat_cap<?php echo $data['car_id']; ?>').val();
			var engine_cap = $('#engine_cap<?php echo $data['car_id']; ?>').val();
			var year = $('#year<?php echo $data['car_id']; ?>').val();
			var price_high = $('#price_high<?php echo $data['car_id']; ?>').val();
			var price_low = $('#price_low<?php echo $data['car_id']; ?>').val();
			var color_id = $('#color_id<?php echo $data['car_id']; ?>').val();
			var models_id = $('#models_id<?php echo $data['car_id']; ?>').val();
			var fuels_id = $('#fuels_id<?php echo $data['car_id']; ?>').val();
			var transmissions_id = $('#transmissions_id<?php echo $data['car_id']; ?>').val();
			var datas="car_id="+car_id+"&car_name="+car_name+"&seat_cap="+seat_cap+"&engine_cap="+engine_cap+"&year="+year+"&price_high="+price_high+"&price_low="+price_low+"&color_id="+color_id+"&models_id="+models_id+"&fuels_id="+fuels_id+"&transmissions_id="+transmissions_id;
			if (car_name=="" || seat_cap=="" || engine_cap=="" || price_high=="" || price_low==""){
				$('#car_name<?php echo $data['car_id'] ?>').val('<?php echo $data['car_name']; ?>');
				$('#seat_cap<?php echo $data['car_id'] ?>').val('<?php echo $data['seat_cap']; ?>');
				$('#engine_cap<?php echo $data['car_id'] ?>').val('<?php echo $data['engine_cap']; ?>');
				$('#price_high<?php echo $data['car_id'] ?>').val('<?php echo $data['price_high']; ?>');
				$('#price_low<?php echo $data['car_id'] ?>').val('<?php echo $data['price_low']; ?>');
				alert('Form still empty!');
			}else{
				alert(datas);
				$.ajax({
					type: "POST",
					url: "mod/mod_car/action.php?update",
					data: datas
				}).done(function(data){
					back();
				})
				$('#update<?php echo $data['car_id'] ?>').attr("data-dismiss", "modal");
			 	$( '.modal-backdrop' ).remove();
			}
		})
		</script>

		<!-- Modal Hapus Data -->
		<div class="modal fade" style="text-align:center;" id="hapus<?php echo $data['car_id']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title" id="hapus">Delete Data Car</h2>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<h4>Are you sure want to delete <b><?php echo $data['car_name'] ?></b> ?</h4>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="idj" id="idj<?php echo $data['car_id'] ?>" value="<?php echo $data['ID_Jabatan']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
							<button type="button" class="btn btn-primary" id="delete<?php echo $data['car_id']; ?>" style="margin-bottom:5px;">Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#delete<?php echo $data['car_id'] ?>').click(function(){
			var car_id = $('#car_id<?php echo $data['car_id'] ?>').val();
			var datas="car_id="+car_id;
			$.ajax({
				type: "POST",
				url: "mod/mod_car/action.php?delete",
				data: datas
			}).done(function(data){
				back();
			})
			$('#delete<?php echo $data['car_id'] ?>').attr("data-dismiss", "modal");
			$( '.modal-backdrop' ).remove();
		})
		</script>
		<?php
		}
		?>

	</tbody>
</table>
<?php include_once "../../BottomResource.php"; ?>

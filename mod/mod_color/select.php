<?php include_once "../../config.php"; ?>
<?php include_once "../../TopResource.php"; ?>
<table id="datatable" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th width="30px">No</th>
			<th>Color Name</th>
			<th width="120px">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		//post data
		$table = array(
			'colors'
		);
		$fild = "*";
		$where = "";
		$no = 1;
		foreach($dbase->select($table, $fild, $where) as $data){
	  ?>
		<tr>
			<td> <?php echo $no++; ?> </td>
			<td> <?php echo $data['color_name']; ?> </td>
			<td>
				<a data-toggle="modal" data-target="#ubah<?php echo $data['color_id']; ?>" class="btn btn-small btn-success" title="Update Data"><i class="fa fa-edit"> </i></a>
				<?php
					//$checkInstansi = $dbase->checkMasterInstansi($data['ID_Instansi']);
					///if($checkInstansi==0){
				?>
				<a data-toggle="modal" data-target="#hapus<?php echo $data['color_id']; ?>" class="btn btn-small btn-danger" title="Delete Data"><i class="fa fa-trash"> </i></a>
				<?php
					//}
				?>
			</td>
		</tr>

		<div style="clear:both"></div>

		<!-- Modal Ubah Data -->
		<div class="modal fade" id="ubah<?php echo $data['color_id']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="ubah">Update Data Color</h4>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<div class="form-group">
								<label class="control-label col-md-4 col-sm-4 col-xs-4">Color Name</label>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="text" class="form-control" name="color_name" id="color_name<?php echo $data['color_id'] ?>" required value="<?php echo $data['color_name']; ?>" >
								</div>
							</div><br/><br/>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="color_id" id="color_id<?php echo $data['color_id'] ?>" value="<?php echo $data['color_id']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" id="update<?php echo $data['color_id']; ?>" style="margin-bottom:5px;">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#update<?php echo $data['color_id']; ?>').click(function(){
			var color_name = $('#color_name<?php echo $data['color_id'] ?>').val();
			var color_id = $('#color_id<?php echo $data['color_id'] ?>').val();
			var datas="color_name="+color_name+"&color_id="+color_id;
			if (color_name==""){
				$('#color_name<?php echo $data['color_id'] ?>').val('<?php echo $data['color_name']; ?>');
				alert('Form still empty!');
			}else{
				$.ajax({
					type: "POST",
					url: "mod/mod_color/action.php?update",
					data: datas
				}).done(function(data){
					back();
				})
				$('#update<?php echo $data['color_id'] ?>').attr("data-dismiss", "modal");
			 	$( '.modal-backdrop' ).remove();
			}
		})
		</script>

		<!-- Modal Hapus Data -->
		<div class="modal fade" style="text-align:center;" id="hapus<?php echo $data['color_id']; ?>" tabindex="" role="dialog" aria-labelledby="ubah">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h2 class="modal-title" id="hapus">Delete Data Color</h2>
					</div>
					<form action="" method="POST" class="form-horizontal form-label-left">
						<div class="modal-body">
							<h4>Are you sure want to delete <b><?php echo $data['color_name'] ?></b> ?</h4>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="color_id" id="color_id<?php echo $data['color_id'] ?>" value="<?php echo $data['color_id']; ?>" />
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-primary" id="delete<?php echo $data['color_id']; ?>" style="margin-bottom:5px;">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script>
		$('#delete<?php echo $data['color_id'] ?>').click(function(){
			var color_id = $('#color_id<?php echo $data['color_id'] ?>').val();
			var datas="color_id="+color_id;
			$.ajax({
				type: "POST",
				url: "mod/mod_color/action.php?delete",
				data: datas
			}).done(function(data){
				back();
			})
			$('#delete<?php echo $data['color_id'] ?>').attr("data-dismiss", "modal");
			$( '.modal-backdrop' ).remove();
		})
		</script>
		<?php
		}
		?>

	</tbody>
</table>
<?php include_once "../../BottomResource.php"; ?>

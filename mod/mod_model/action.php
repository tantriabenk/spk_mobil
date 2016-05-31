<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "models";
$models_name = ucwords($_POST['models_name']);


if(isset($_GET['add'])){
	$nilai = array(
		'models_name' => $models_name
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$models_id = $_POST['models_id'];
	$where = "models_id = '$models_id'";
	$nilai = array(
		'models_name' => $models_name
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$models_id = $_POST['models_id'];
	$where = "models_id = '$models_id'";
	$dbase->delete($tabel, $where);
}
?>

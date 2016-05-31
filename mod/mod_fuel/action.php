<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "fuels";
$fuels_name = ucwords($_POST['fuels_name']);


if(isset($_GET['add'])){
	$nilai = array(
		'fuels_name' => $fuels_name
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$fuels_id = $_POST['fuels_id'];
	$where = "fuels_id = '$fuels_id'";
	$nilai = array(
		'fuels_name' => $fuels_name
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$fuels_id = $_POST['fuels_id'];
	$where = "fuels_id = '$fuels_id'";
	$dbase->delete($tabel, $where);
}
?>

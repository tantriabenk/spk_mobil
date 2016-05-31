<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "colors";
$color_name = ucwords($_POST['color_name']);


if(isset($_GET['add'])){
	$nilai = array(
		'color_name' => $color_name
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$color_id = $_POST['color_id'];
	$where = "color_id = '$color_id'";
	$nilai = array(
		'color_name' => $color_name
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$color_id = $_POST['color_id'];
	$where = "color_id = '$color_id'";
	$dbase->delete($tabel, $where);
}
?>

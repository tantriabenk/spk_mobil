<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "transmissions";
$transmissions_name = ucwords($_POST['transmissions_name']);


if(isset($_GET['add'])){
	$nilai = array(
		'transmissions_name' => $transmissions_name
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$transmissions_id = $_POST['transmissions_id'];
	$where = "transmissions_id = '$transmissions_id'";
	$nilai = array(
		'transmissions_name' => $transmissions_name
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$transmissions_id = $_POST['transmissions_id'];
	$where = "transmissions_id = '$transmissions_id'";
	$dbase->delete($tabel, $where);
}
?>

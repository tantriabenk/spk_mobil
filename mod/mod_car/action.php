<?php
error_reporting(0);
include_once "../../config.php";

$tabel = "cars";

$car_name = ucwords($_POST['car_name']);
$seat_cap = $_POST['seat_cap'];
$engine_cap = $_POST['engine_cap'];
$year = $_POST['year'];
$price_high = $_POST['price_high'];
$price_low = $_POST['price_low'];
$color_id = $_POST['color_id'];
$models_id = $_POST['models_id'];
$fuels_id = $_POST['fuels_id'];
$transmissions_id = $_POST['transmissions_id'];


if(isset($_GET['add'])){
	$nilai = array(
		'car_name' => $car_name,
		'seat_cap' => $seat_cap,
		'engine_cap' => $engine_cap,
		'year' => $year,
		'price_high' => $price_high,
		'price_low' => $price_low,
		'color_id' => $color_id,
		'models_id' => $models_id,
		'fuels_id' => $fuels_id,
		'transmissions_id' => $transmissions_id,
	);
	$dbase->add($tabel, $nilai);
}else if(isset($_GET['update'])){
	$car_id = $_POST['car_id'];
	$where = "car_id = '$car_id'";
	$nilai = array(
		'car_name' => $car_name,
		'seat_cap' => $seat_cap,
		'engine_cap' => $engine_cap,
		'year' => $year,
		'price_high' => $price_high,
		'price_low' => $price_low,
		'color_id' => $color_id,
		'models_id' => $models_id,
		'fuels_id' => $fuels_id,
		'transmissions_id' => $transmissions_id,
	);
	$dbase->update($tabel, $nilai, $where);
}else if(isset($_GET['delete'])){
	$car_id = $_POST['car_id'];
	$where = "car_id = '$car_id'";
	$dbase->delete($tabel, $where);
}
?>

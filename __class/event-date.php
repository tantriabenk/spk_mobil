<?php
	function event_date($dt){
			$date = substr($dt,0,2);
			$month = getMonth(substr($dt,3,2));
			return $date.' '.$month.'';
	}

	function article_date($dt){
			$date = substr($dt,8,2);
			$month = getMonth(substr($dt,5,2));
			return "<span>$date</span><span>$month</span>";
	}

	function post_date($dt){
			$date = substr($dt,8,2);
			$month = getMonth(substr($dt,5,2));
			$year = substr($dt,0,4);
			return "$month $date, $year";
	}

	function getMonth($month){
				switch ($month){
					case 1:
						return "Jan";
						break;
					case 2:
						return "Feb";
						break;
					case 3:
						return "Mar";
						break;
					case 4:
						return "Apr";
						break;
					case 5:
						return "May";
						break;
					case 6:
						return "Jun";
						break;
					case 7:
						return "Jul";
						break;
					case 8:
						return "Aug";
						break;
					case 9:
						return "Sep";
						break;
					case 10:
						return "Oct";
						break;
					case 11:
						return "Nov";
						break;
					case 12:
						return "Dec";
						break;
				}
			}

function tgl_indo($tgl){
	$tanggal = substr($tgl,8,2); $bulan = getBulan(substr($tgl,5,2)); $tahun = substr($tgl,0,4);
	return $tanggal.' '.$bulan.' '.$tahun;
}

function getBulan($bln){
	switch ($bln){
		case 1:return "Januari";
		break;
		case 2:return "Februari";
		break;
		case 3:return "Maret";
		break;
		case 4:return "April";
		break;
		case 5:return "Mei";
		break;
		case 6:return "Juni";
		break;
		case 7:return "Juli";
		break;
		case 8:return "Agustus";
		break;
		case 9:return "September";
		break;
		case 10:return "Oktober";
		break;
		case 11:return "Nopember";
		break;
		case 12:return "Desember";
		break;
	}
}
?>

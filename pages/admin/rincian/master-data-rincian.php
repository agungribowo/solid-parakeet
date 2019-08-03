<div class="row">
<?php
	include "../../config/koneksi.php";
	
	if (isset($_GET['id_rincian']) AND ($_GET['id_spd']) AND ($_GET['id_peg'])) {
		$id_rincian = $_GET['id_rincian'];
		$id_spd		= $_GET['id_spd'];
		$id_peg		= $_GET['id_peg'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if ($_POST['save'] == "save") {
	$id_user 		=$_SESSION['id_user'];
	$jml_inap			=$_POST['jml_inap'];
	$nilai_inap			=$_POST['nilai_inap'];
	$ket_inap			=$_POST['ket_inap'];
	$jml_berangkat		=$_POST['jml_berangkat'];	
	$nilai_berangkat	=$_POST['nilai_berangkat'];	
	$ket_berangkat		=$_POST['ket_berangkat'];	
	$jml_kembali		=$_POST['jml_kembali'];	
	$nilai_kembali		=$_POST['nilai_kembali'];	
	$ket_kembali		=$_POST['ket_kembali'];	
	$jml_taxi_berangkat	=$_POST['jml_taxi_berangkat'];	
	$nilai_taxi_berangkat	=$_POST['nilai_taxi_berangkat'];	
	$ket_taxi_berangkat	=$_POST['ket_taxi_berangkat'];	
	$jml_taxi_kembali	=$_POST['jml_taxi_kembali'];	
	$nilai_taxi_kembali	=$_POST['nilai_taxi_kembali'];	
	$ket_taxi_kembali	=$_POST['ket_taxi_kembali'];	
	$jml_harian			=$_POST['jml_harian'];	
	$nilai_harian		=$_POST['nilai_harian'];	
	$ket_harian			=$_POST['ket_harian'];
	$jml_saku			=$_POST['jml_saku'];	
	$nilai_saku			=$_POST['nilai_saku'];	
	$ket_saku			=$_POST['ket_saku'];
	$uraian_lain		=$_POST['uraian_lain'];
	$jml_lain			=$_POST['jml_lain'];
	$nilai_lain			=$_POST['nilai_lain'];
	$ket_lain			=$_POST['ket_lain'];
	$uang_muka			=$_POST['uang_muka'];
		
	$suminap			=$jml_inap * $nilai_inap;	
	$sumberangkat		=$jml_berangkat * $nilai_berangkat;	
	$sumkembali			=$jml_kembali * $nilai_kembali;	
	$sumtaxi_berangkat	=$jml_taxi_berangkat * $nilai_taxi_berangkat;	
	$sumtaxi_kembali	=$jml_taxi_kembali * $nilai_taxi_kembali;	
	$sumharian			=$jml_harian * $nilai_harian;
	$sumsaku			=$jml_saku * $nilai_saku;
	$sumlain			=$jml_lain * $nilai_lain;

	$total				=$suminap+$sumberangkat+$sumkembali+$sumtaxi_berangkat+$sumtaxi_kembali+$sumharian+$sumsaku+$sumlain;
	
		//if (empty($_POST['jml_inap']) || empty($_POST['nilai_inap']) || empty($_POST['jml_berangkat']) || empty($_POST['nilai_berangkat']) || empty($_POST['jml_kembali']) || empty($_POST['nilai_kembali'])) {
			//$_SESSION['pesan'] = "Oops! Please fill all column ...";
			//header("location:index.php?page=form-master-data-rincian&id_spd=$id_spd&id_peg=$id_peg");
		//}//
		$id_satker = $_SESSION['id_satker'];

		//else{
		$insert =mysql_query("INSERT INTO tb_rincian (id_rincian, id_user, id_satker, id_spd, id_peg, jml_inap, nilai_inap, ket_inap, jml_berangkat, nilai_berangkat, ket_berangkat, jml_kembali, nilai_kembali, ket_kembali, jml_taxi_berangkat, nilai_taxi_berangkat, ket_taxi_berangkat, jml_taxi_kembali, nilai_taxi_kembali, ket_taxi_kembali, jml_harian, nilai_harian, ket_harian, jml_saku, nilai_saku, ket_saku, uraian_lain, jml_lain, nilai_lain, ket_lain, uang_muka, total)
		VALUES ('$id_rincian', '$id_user', '$id_satker', '$id_spd', '$id_peg', '$jml_inap', '$nilai_inap', '$ket_inap', '$jml_berangkat', '$nilai_berangkat', '$ket_berangkat', '$jml_kembali', '$nilai_kembali', '$ket_kembali', '$jml_taxi_berangkat', '$nilai_taxi_berangkat', '$ket_taxi_berangkat', '$jml_taxi_kembali', '$nilai_taxi_kembali', '$ket_taxi_kembali', '$jml_harian', '$nilai_harian', '$ket_harian', '$jml_saku', '$nilai_saku', '$ket_saku', '$uraian_lain', '$jml_lain', '$nilai_lain', '$ket_lain', '$uang_muka', '$total')");
			
			if($insert){
				$_SESSION['pesan'] = "Good! Insert data rincian success ...";
				header("location:index.php?page=form-view-nominatif");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		//}//
	}
?>
</div>
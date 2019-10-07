<div class="row">
<?php
	if (isset($_GET['id_rincian'])) {
	$id_rincian = $_GET['id_rincian'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}

	
	
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$id_rincian'");
	$hasil	= mysql_fetch_array ($query);

	if($hasil['id_user'] !== $_SESSION['id_user']) {
		$_SESSION['pesan'] = "Oops! Tidak dapat mengedit data user lain";
		header("location:index.php?page=form-edit-data-rincian&id_rincian=$id_rincian");
	}
				
	if ($_POST['edit'] == "edit") {
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
	
	$jml_saku2			=$_POST['jml_saku2'];	
	$nilai_saku2			=$_POST['nilai_saku2'];	
	$ket_saku2			=$_POST['ket_saku2'];

	$jml_saku3			=$_POST['jml_saku3'];	
	$nilai_saku3		=$_POST['nilai_saku3'];	
	$ket_saku3			=$_POST['ket_saku3'];


	
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
	$sumsaku			=$jml_saku2 * $nilai_saku2;
	$sumsaku			=$jml_saku3 * $nilai_saku3;
	$sumlain			=$jml_lain * $nilai_lain;
	$id_satker = $_SESSION['id_satker'];

	$total				=$suminap+$sumberangkat+$sumkembali+$sumtaxi_berangkat+$sumtaxi_kembali+$sumharian+$sumsaku+$sumsaku2+$sumlain3;
	
	
		//if (empty($_POST['jml_inap']) || empty($_POST['nilai_inap']) || empty($_POST['jml_berangkat']) || empty($_POST['nilai_berangkat']) || empty($_POST['jml_kembali']) || empty($_POST['nilai_kembali'])) {
			//$_SESSION['pesan'] = "Oops! Please fill all column ...";
			//header("location:index.php?page=form-edit-data-rincian&id_rincian=$id_rincian");
		//}	//	
		
		//else{//
		$update= mysql_query ("UPDATE tb_rincian SET jml_inap='$jml_inap', nilai_inap='$nilai_inap', ket_inap='$ket_inap', jml_berangkat='$jml_berangkat', nilai_berangkat='$nilai_berangkat', ket_berangkat='$ket_berangkat', jml_kembali='$jml_kembali', nilai_kembali='$nilai_kembali', ket_kembali='$ket_kembali', jml_taxi_berangkat='$jml_taxi_berangkat', nilai_taxi_berangkat='$nilai_taxi_berangkat', ket_taxi_berangkat='$ket_taxi_berangkat', jml_taxi_kembali='$jml_taxi_kembali', nilai_taxi_kembali='$nilai_taxi_kembali', ket_taxi_kembali='$ket_taxi_kembali', jml_harian='$jml_harian', nilai_harian='$nilai_harian', ket_harian='$ket_harian', jml_saku='$jml_saku', nilai_saku='$nilai_saku', ket_saku='$ket_saku',
		jml_saku2='$jml_saku2', nilai_saku2='$nilai_saku2', ket_saku2='$ket_saku2', jml_saku3='$jml_saku3', nilai_saku3='$nilai_saku3', ket_saku3='$ket_saku3', uraian_lain='$uraian_lain', jml_lain='$jml_lain', nilai_lain='$nilai_lain', ket_lain='$ket_lain', uang_muka='$uang_muka', total='$total' WHERE id_rincian='$id_rincian'  and id_satker='$id_satker' ");
		
		if($update){
				$_SESSION['pesan'] = "Good! Edit rincian success ...";
				header("location:index.php?page=detail-data-rincian&id_rincian=$id_rincian");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		
	}
?>
</div>
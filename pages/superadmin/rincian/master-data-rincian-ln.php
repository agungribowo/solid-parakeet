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
	$jml_berangkat		=$_POST['jml_berangkat'];	
	$nilai_berangkat	=$_POST['nilai_berangkat'];	
	$ket_berangkat		=$_POST['ket_berangkat'];	
	
	$jml_harian			=$_POST['jml_harian'];	
	$nilai_harian		=$_POST['nilai_harian'];	
	$ket_harian			=$_POST['ket_harian'];
	$jml_harian1		=$_POST['jml_harian1'];	
	$nilai_harian1		=$_POST['nilai_harian1'];	
	$ket_harian1		=$_POST['ket_harian1'];
	//$jml_pasport		=$_POST['jml_pasport'];	
	//$nilai_pasport	=$_POST['nilai_pasport'];	
	//$ket_pasport		=$_POST['ket_pasport'];
	$jml_reprentasi		=$_POST['jml_reprentasi'];	
	$nilai_reprentasi	=$_POST['nilai_reprentasi'];	
	$ket_reprentasi		=$_POST['ket_reprentasi'];
	
	$uraian_lain		=$_POST['uraian_lain'];
	$jml_lain			=$_POST['jml_lain'];
	$nilai_lain			=$_POST['nilai_lain'];
	$ket_lain			=$_POST['ket_lain'];
	$uang_muka			=$_POST['uang_muka'];
	
	$sumberangkat		=$jml_berangkat * $nilai_berangkat;	
	$sumharian			=$jml_harian * $nilai_harian;
	$sumharian1			=$jml_harian1 * $nilai_harian1;
	//$sumpasport			=$jml_pasport * $nilai_pasport;
	$sumreprentasi		=$jml_reprentasi * $nilai_reprentasi;
	$sumlain			=$jml_lain * $nilai_lain;

	$total				=$sumberangkat+$sumharian+$sumharian1+$sumreprentasi+$sumlain;

	// $id_satker = $_SESSION['id_satker'];
	
		//if (empty($_POST['jml_inap']) || empty($_POST['nilai_inap']) || empty($_POST['jml_berangkat']) || empty($_POST['nilai_berangkat']) || empty($_POST['jml_kembali']) || empty($_POST['nilai_kembali'])) {
			//$_SESSION['pesan'] = "Oops! Please fill all column ...";
			//header("location:index.php?page=form-master-data-rincian&id_spd=$id_spd&id_peg=$id_peg");
		//}//

		//else{

		$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
		$spd    =mysql_fetch_array($selSpd);
		$id_satker = $spd['satker'];

		$insert =mysql_query("INSERT INTO tb_rincian (id_rincian, id_satker, id_spd, id_peg, jml_berangkat, nilai_berangkat, ket_berangkat, jml_harian, nilai_harian, ket_harian, jml_harian1, nilai_harian1, ket_harian1, uraian_lain, jml_lain, nilai_lain, ket_lain, jml_reprentasi, nilai_reprentasi, ket_reprentasi, uang_muka, total)
		VALUES ('$id_rincian', '$id_satker', '$id_spd', '$id_peg', '$jml_berangkat', '$nilai_berangkat', '$ket_berangkat', '$jml_harian', '$nilai_harian', '$ket_harian', '$jml_harian1', '$nilai_harian1', '$ket_harian1', '$uraian_lain', '$jml_lain', '$nilai_lain', '$ket_lain', '$jml_reprentasi', '$nilai_reprentasi', '$ket_reprentasi', '$uang_muka', '$total')");
			
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
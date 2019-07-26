<div class="row">
<?php
	if (isset($_GET['id_rincian'])) {
	$id_rincian = $_GET['id_rincian'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$id_rincian' and id_satker='$id_satker'");
	$hasil	= mysql_fetch_array ($query);
				
	if ($_POST['edit'] == "edit") {
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
	$id_satker = $_SESSION['id_satker'];

	$total				=$sumberangkat+$sumharian+$sumharian1+$sumreprentasi+$sumlain;
	
		//if (empty($_POST['jml_inap']) || empty($_POST['nilai_inap']) || empty($_POST['jml_berangkat']) || empty($_POST['nilai_berangkat']) || empty($_POST['jml_kembali']) || empty($_POST['nilai_kembali'])) {
			//$_SESSION['pesan'] = "Oops! Please fill all column ...";
			//header("location:index.php?page=form-edit-data-rincian&id_rincian=$id_rincian");
		//}	//	
		
		//else{//
		$update= mysql_query ("UPDATE tb_rincian SET jml_berangkat='$jml_berangkat', nilai_berangkat='$nilai_berangkat', ket_berangkat='$ket_berangkat', jml_harian='$jml_harian', nilai_harian='$nilai_harian', ket_harian='$ket_harian', jml_harian1='$jml_harian1', nilai_harian1='$nilai_harian1', ket_harian1='$ket_harian1', jml_reprentasi='$jml_reprentasi', nilai_reprentasi='$nilai_reprentasi', ket_reprentasi='$ket_reprentasi', uraian_lain='$uraian_lain', jml_lain='$jml_lain', nilai_lain='$nilai_lain', ket_lain='$ket_lain', uang_muka='$uang_muka', total='$total' WHERE id_rincian='$id_rincian'  and id_satker='$id_satker'");
		
		if($update){
				$_SESSION['pesan'] = "Good! Edit rincian success ...";
				header("location:index.php?page=detail-data-rincian-ln&id_rincian=$id_rincian");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		//}//
	}
?>
</div>
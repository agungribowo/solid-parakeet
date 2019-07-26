<div class="row">
<?php
include "../../config/koneksi.php";
$id_satker = $_SESSION['id_satker'];

	function kdauto($tabel, $inisial){
		$struktur   = mysql_query("SELECT * FROM $tabel");
		$field      = mysql_field_name($struktur,0);
		$panjang    = mysql_field_len($struktur,0);
		$qry  = mysql_query("SELECT max(".$field.") FROM ".$tabel);
		$row  = mysql_fetch_array($qry);
		if ($row[0]=="") {
		$angka=0;
		}
		else {
		$angka= substr($row[0], strlen($inisial));
		}
		$angka++;
		$angka      =strval($angka);
		$tmp  ="";
		for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
		}
		return $inisial.$tmp.$angka;
		}
	$id_kwitansi	=kdauto("tb_kwitansi","");
	
if (isset($_GET['id_spd']) AND ($_GET['id_peg']) AND ($_GET['lama'])) {
	$id_spd 	= $_GET['id_spd'];
	$id_peg		= $_GET['id_peg'];
	$lama		= $_GET['lama'];
	
	$selSpd	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$spd	=mysql_fetch_array($selSpd);
	$ta	=$spd['ta'];
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
	$harian	=$tuj['harian'];
	$jumlah	=$lama*$harian;
	
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_spd) && $id_spd != "") {
		$insert =mysql_query("INSERT INTO tb_kwitansi (id_kwitansi, id_satker, id_spd, id_peg, jumlah, ta, jns_tuj) VALUES ('$id_kwitansi', '$id_satker', '$id_spd', '$id_peg', '$jumlah', '$ta', '$tuj[jenis]')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Create kwitansi success ...";
			header("location:index.php?page=form-view-data-kwitansi");
		}
		else {
			echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
		}
	}
?>
</div>
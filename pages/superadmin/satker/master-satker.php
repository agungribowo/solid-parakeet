<div class="row">
<?php		
	include "../../config/koneksi.php";
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
	$id_satker	=kdauto("tb_satker","");
	
	if ($_POST['save'] == "save") {
	$satker	=$_POST['satker'];
	$id_kpa	=$_POST['id_kpa'];
	$id_ppk	=$_POST['id_ppk'];
	$no_ppk	=$_POST['no_ppk'];
	$id_bendahara	=$_POST['id_bendahara'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT satker FROM tb_satker WHERE satker='$_POST[satker]'"));
	
		if (empty($_POST['satker'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-satker");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-satker");
		}
		
		else{
		$insert = mysql_query("INSERT INTO tb_satker (id_satker, no_ppk, satker, id_kpa, id_ppk, id_bendahara) VALUES ('$id_satker', '$no_ppk', '$satker', '$id_kpa', '$id_ppk', '$id_bendahara')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Insert master Unit Kerja success ...";
			header("location:index.php?page=form-view-data-satker");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
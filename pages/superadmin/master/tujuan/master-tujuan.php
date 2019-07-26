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
	$id_tujuan	=kdauto("tb_tujuan","");
	
	if ($_POST['save'] == "save") {
	$tujuan	=$_POST['tujuan'];
	$jenis	=$_POST['jenis'];
	$harian	=$_POST['harian'];
	$saku	=$_POST['saku'];
	$inap		=$_POST['inap'];
	$meeting	=$_POST['meeting'];
	$taksi		=$_POST['taksi'];
	$transport	=$_POST['transport'];
	$lain		=$_POST['lain'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT tujuan FROM tb_tujuan WHERE tujuan='$_POST[tujuan]'"));
	
		if (empty($_POST['tujuan']) || empty($_POST['jenis'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-tujuan");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-tujuan");
		}
		
		else{
		$insert = mysql_query("INSERT INTO tb_tujuan (id_tujuan, tujuan, jenis, harian, saku, inap, meeting, taksi, transport, lain) VALUES ('$id_tujuan', '$tujuan', '$jenis', '$harian', '$saku', '$inap', '$meeting', '$taksi', '$transport', '$lain')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Insert master tujuan success ...";
			header("location:index.php?page=form-view-data-tujuan");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
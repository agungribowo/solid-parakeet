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
	$id_kelengkapan	=kdauto("tb_kelengkapan","");
	
	if ($_POST['save'] == "save") {
	$uraian	=$_POST['uraian'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT uraian FROM tb_kelengkapan WHERE uraian='$_POST[uraian]'"));
	
		if (empty($_POST['uraian'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-kelengkapan");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-kelengkapan");
		}
		
		else{
		$insert = mysql_query("INSERT INTO tb_kelengkapan (id_kelengkapan, uraian) VALUES ('$id_kelengkapan', '$uraian')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Insert master kelengkapan success ...";
			header("location:index.php?page=form-view-data-kelengkapan");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
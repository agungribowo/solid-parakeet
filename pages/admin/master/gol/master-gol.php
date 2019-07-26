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
	$id_gol	=kdauto("tb_gol","");
	
	if ($_POST['save'] == "save") {
	$kode_gol	=$_POST['kode_gol'];
	$gol		=$_POST['gol'];
	
	$cekkd	=mysql_num_rows (mysql_query("SELECT gol FROM tb_gol WHERE gol='$_POST[gol]'"));
	
		if (empty($_POST['kode_gol']) || empty($_POST['gol'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-gol");
		}
		else if($cekkd > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-gol");
		}
		
		else{
		$insert = mysql_query("INSERT INTO tb_gol (id_gol, kode_gol, gol) VALUES ('$id_gol', '$kode_gol', '$gol')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Insert master golongan success ...";
			header("location:index.php?page=form-view-data-gol");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
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
	$id_peg	=kdauto("tb_pegawai","");
	
	if ($_POST['save'] == "save") {
	$nip		=$_POST['nip'];
	$nip_val	=$_POST['nip_val'];
	$nama		=$_POST['nama'];
	$pangkat	=$_POST['pangkat'];
	$id_gol		=$_POST['id_gol'];
	$jab		=$_POST['jab'];
	$id_satker	=$_POST['id_satker'];	
	
	$ceknip	=mysql_num_rows (mysql_query("SELECT nip FROM tb_pegawai WHERE nip='$_POST[nip]'"));
	
		if (empty($_POST['nip']) || empty($_POST['nama']) || empty($_POST['pangkat']) || empty($_POST['id_gol']) || empty($_POST['id_satker'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-pegawai");
		}
		else if($ceknip > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-pegawai");
		}
		
		else{
		$insert =mysql_query("INSERT INTO tb_pegawai (id_peg, nip_val, nip, nama, pangkat, gol, jab, satker) VALUES ('$id_peg', '$nip_val', '$nip', '$nama', '$pangkat', '$id_gol', '$jab', '$id_satker')");
		
			if($insert){
				$_SESSION['pesan'] = "Good! Insert master pegawai success ...";
				header("location:index.php?page=form-view-data-pegawai");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
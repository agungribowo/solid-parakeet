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
	$id_ta	=kdauto("tb_ta","");
	
	if ($_POST['save'] == "save") {
	$tahun	=$_POST['tahun'];
	$pagu_ln	=$_POST['pagu_ln'];
	$pagu_dn	=$_POST['pagu_dn'];
	$pagu_dk	=$_POST['pagu_dk'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT tahun FROM tb_ta WHERE tahun='$_POST[tahun]' AND id_satker=$id_satker"));
	
		if (empty($_POST['tahun']) || empty($_POST['pagu_ln'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-ta");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-ta");
		}
		
		else{
		$insert = mysql_query("INSERT INTO tb_ta (id_ta, tahun, pagu_ln, pagu_dn, pagu_dk, id_satker) VALUES ('$id_ta', '$tahun', '$pagu_ln', '$pagu_dn', '$pagu_dk', $id_satker)");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Insert master tahun anggaran success ...";
			header("location:index.php?page=form-view-data-ta");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
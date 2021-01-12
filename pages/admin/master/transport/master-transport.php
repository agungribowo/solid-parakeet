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
	$id_transport	=kdauto("tb_transport","");
	
	if ($_POST['save'] == "save") {
	$transport	=$_POST['transport'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT transport FROM tb_transport WHERE transport='$_POST[transport]'"));
	
		if (empty($_POST['transport'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-transport");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-transport");
		}
		
		else{
		$insert = mysql_query("INSERT INTO tb_transport (id_transport, transport) VALUES ('$id_transport', '$transport')");
		
		if($insert){
			$_SESSION['pesan'] = "Good! Insert master jenis transportasi success ...";
			header("location:index.php?page=form-view-data-transport");
		}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
<div class="row">
<?php
	if (isset($_GET['id_riil'])) {
	$id_riil = $_GET['id_riil'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_riil WHERE id_riil='$id_riil'");
	$hasil	= mysql_fetch_array ($query);


				
	if ($_POST['edit'] == "edit") {
	$uraian1	=$_POST['uraian1'];
	$uraian2	=$_POST['uraian2'];
	$uraian3	=$_POST['uraian3'];
	$uraian4	=$_POST['uraian4'];

	$jml1	=$_POST['jml1'];
	$jml2	=$_POST['jml2'];
	$jml3	=$_POST['jml3'];
	$jml4	=$_POST['jml4'];

	if($hasil['id_user'] != $_SESSION['id_user']) {
		$_SESSION['pesan'] = "Oops! Tidak dapat mengedit data user lain ...";
		header("location:index.php?page=detail-data-riil&id_riil=$id_riil");
	} else {
	$id_satker = $_SESSION['id_satker'];
		$q = "UPDATE tb_riil SET uraian1='$uraian1', uraian2='$uraian2', uraian3='$uraian3', uraian4='$uraian4',jml1='$jml1', jml2='$jml2',jml3='$jml3',jml4='$jml4' WHERE id_riil='$id_riil' AND id_satker='$id_satker'";
		$update= mysql_query ($q);
		
		if($update){
				$_SESSION['pesan'] = "Good! Edit pengeluaran riil success ...";
				header("location:index.php?page=detail-data-riil&id_riil=$id_riil");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
}
?>
</div>
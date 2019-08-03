<div class="row">
<?php
	include "../../config/koneksi.php";
	
	if (isset($_GET['id_riil']) AND ($_GET['id_spd']) AND ($_GET['id_peg']) AND ($_GET['id_rincian'])) {
		$id_riil 	= $_GET['id_riil'];
		$id_spd		= $_GET['id_spd'];
		$id_peg		= $_GET['id_peg'];
		$id_rincian	= $_GET['id_rincian'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}


	
	if ($_POST['save'] == "save") {
	$uraian1	=$_POST['uraian1'];
	$uraian2	=$_POST['uraian2'];
	$uraian3	=$_POST['uraian3'];
	$uraian4	=$_POST['uraian4'];
	$jml1		=$_POST['jml1'];
	$jml2		=$_POST['jml2'];
	$jml3		=$_POST['jml3'];
	$jml4		=$_POST['jml4'];

	$query2	= mysql_query("SELECT id_spd FROM tb_spd WHERE id_spd=$id_spd");
	$spd	= mysql_fetch_array ($query2);
	$id_satker = $_SESSION['id_satker'];
	
		$insert =mysql_query("INSERT INTO tb_riil (id_riil, id_user, id_satker, id_spd, id_peg, id_rincian, uraian1, uraian2, uraian3, uraian4, jml1, jml2, jml3, jml4 )
		VALUES ('$id_riil', '$id_user', '$id_satker', '$id_spd', '$id_peg', '$id_rincian', '$uraian1', '$uraian2', '$uraian3',  '$uraian4', '$jml1', '$jml2', '$jml3', '$jml4')");
			
			if($insert){
				$_SESSION['pesan'] = "Good! Insert data pengeluaran riil success ...";
				header("location:index.php?page=form-view-data-rincian");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
?>
</div>
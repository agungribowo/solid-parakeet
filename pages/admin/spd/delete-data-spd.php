<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_spd'])) {
	$id_spd = $_GET['id_spd'];
	$id_satker = $_SESSION['id_satker'];
	$query   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$data    =mysql_fetch_array($query);
		$no	=$data['nomor'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_spd) && $id_spd != "") {

		$id_satker = $_SESSION['id_satker'];
	
		$cekrinci	=mysql_num_rows (mysql_query("SELECT id_spd FROM tb_rincian WHERE id_spd='$id_spd' and id_satker ='$id_satker'"));
		$cekkwi		=mysql_num_rows (mysql_query("SELECT id_spd FROM tb_kwitansi WHERE id_spd='$id_spd' and id_satker ='$id_satker'"));
		
		if($cekrinci > 0) {
			$_SESSION['pesan'] = "Oops! Data telah diproses sehingga tidak dapat dihapus ...";
			header("location:index.php?page=form-view-data-spd");
		}
		else if($cekkwi > 0) {
			$_SESSION['pesan'] = "Oops! Data telah diproses sehingga tidak dapat dihapus ...";
			header("location:index.php?page=form-view-data-spd");
		}
		else{
			$delete	=mysql_query("DELETE FROM tb_spd WHERE id_spd='$id_spd' and id_satker ='$id_satker'  and id_satker='$id_satker'");
			//
			$delnom	=mysql_query("DELETE FROM tb_nominatif WHERE id_spd='$id_spd' and id_satker ='$id_satker'  and id_satker='$id_satker'");
		
			if($delete){
				$_SESSION['pesan'] = "Good! Delete data SPD $no success ...";
				header("location:index.php?page=form-view-data-spd");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
	mysql_close($Open);
?>
</div>
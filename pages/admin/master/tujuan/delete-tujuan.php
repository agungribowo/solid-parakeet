<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_tujuan'])) {
	$id_tujuan = $_GET['id_tujuan'];
	
	$query   =mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$id_tujuan'");
	$data    =mysql_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_tujuan) && $id_tujuan != "") {
		$delete		=mysql_query("DELETE FROM tb_tujuan WHERE id_tujuan='$id_tujuan'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete tujuan success ...";
				header("location:index.php?page=form-view-data-tujuan");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysql_close($Open);
?>
</div>
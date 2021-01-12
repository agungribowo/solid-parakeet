<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_kelengkapan'])) {
	$id_kelengkapan = $_GET['id_kelengkapan'];
	
	$query   =mysql_query("SELECT * FROM tb_kelengkapan WHERE id_kelengkapan='$id_kelengkapan'");
	$data    =mysql_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_kelengkapan) && $id_kelengkapan != "") {
		$delete		=mysql_query("DELETE FROM tb_kelengkapan WHERE id_kelengkapan='$id_kelengkapan'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete kelengkapan success ...";
				header("location:index.php?page=form-view-data-kelengkapan");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysql_close($Open);
?>
</div>
<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_satker'])) {
	$id_satker = $_GET['id_satker'];
	
	$query   =mysql_query("SELECT * FROM tb_satker WHERE id_satker='$id_satker'");
	$data    =mysql_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_satker) && $id_satker != "") {
		$delete		=mysql_query("DELETE FROM tb_satker WHERE id_satker='$id_satker'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete Unit Kerja success ...";
				header("location:index.php?page=form-view-data-satker");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysql_close($Open);
?>
</div>
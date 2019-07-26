<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_transport'])) {
	$id_transport = $_GET['id_transport'];
	
	$query   =mysql_query("SELECT * FROM tb_transport WHERE id_transport='$id_transport'");
	$data    =mysql_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_transport) && $id_transport != "") {
		$delete		=mysql_query("DELETE FROM tb_transport WHERE id_transport='$id_transport'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete jenis transportasi success ...";
				header("location:index.php?page=form-view-data-transport");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysql_close($Open);
?>
</div>
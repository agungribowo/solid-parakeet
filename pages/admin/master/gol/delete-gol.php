<div class="row">
<?php
include "../../config/koneksi.php";
if (isset($_GET['id_gol'])) {
	$id_gol = $_GET['id_gol'];
	
	$query   =mysql_query("SELECT * FROM tb_gol WHERE id_gol='$id_gol'");
	$data    =mysql_fetch_array($query);
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	if (!empty($id_gol) && $id_gol != "") {
		$delete		=mysql_query("DELETE FROM tb_gol WHERE id_gol='$id_gol'");
			if($delete){
				$_SESSION['pesan'] = "Good! Delete golongan success ...";
				header("location:index.php?page=form-view-data-gol");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	mysql_close($Open);
?>
</div>
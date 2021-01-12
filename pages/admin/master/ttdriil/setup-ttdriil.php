<div class="row">
<?php
	if (isset($_GET['id_ttdriil'])) {
	$id_ttdriil = $_GET['id_ttdriil'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$setup	= mysql_query("SELECT * FROM tb_ttdriil WHERE id_ttdriil='$id_ttdriil'");
	$hasil	= mysql_fetch_array ($setup);
				
	if ($_POST['setup'] == "setup") {
	$teks	=$_POST['teks'];
	$id_peg	=$_POST['id_peg'];
	
		if (empty($_POST['teks']) || empty($_POST['id_peg'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-setup-ttdriil&id_ttdriil=$id_ttdriil");
		}
		else{
		$update= mysql_query ("UPDATE tb_ttdriil SET teks='$teks', id_peg='$id_peg' WHERE id_ttdriil='$id_ttdriil'");
			if($update){
				$_SESSION['pesan'] = "Good! setup penandatangan success ...";
				header("location:index.php?page=form-view-ttdriil");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
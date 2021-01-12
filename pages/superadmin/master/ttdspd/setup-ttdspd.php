<div class="row">
<?php
	if (isset($_GET['id_ttdspd'])) {
	$id_ttdspd = $_GET['id_ttdspd'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$setup	= mysql_query("SELECT * FROM tb_ttdspd WHERE id_ttdspd='$id_ttdspd'");
	$hasil	= mysql_fetch_array ($setup);
				
	if ($_POST['setup'] == "setup") {
	$teks	=$_POST['teks'];
	$id_peg	=$_POST['id_peg'];
	
		if (empty($_POST['teks']) || empty($_POST['id_peg'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-setup-ttdspd&id_ttdspd=$id_ttdspd");
		}
		else{
		$update= mysql_query ("UPDATE tb_ttdspd SET teks='$teks', id_peg='$id_peg' WHERE id_ttdspd='$id_ttdspd'");
			if($update){
				$_SESSION['pesan'] = "Good! setup penandatangan success ...";
				header("location:index.php?page=form-view-ttdspd");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
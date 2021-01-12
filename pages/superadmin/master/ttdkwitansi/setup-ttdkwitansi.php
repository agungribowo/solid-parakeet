<div class="row">
<?php
	if (isset($_GET['id_ttdkwitansi'])) {
	$id_ttdkwitansi = $_GET['id_ttdkwitansi'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$setup	= mysql_query("SELECT * FROM tb_ttdkwitansi WHERE id_ttdkwitansi='$id_ttdkwitansi'");
	$hasil	= mysql_fetch_array ($setup);
				
	if ($_POST['setup'] == "setup") {
	$teks1		=$_POST['teks1'];
	$id_peg1	=$_POST['id_peg1'];
	$teks2		=$_POST['teks2'];
	$id_peg2	=$_POST['id_peg2'];
	
		if (empty($_POST['teks1']) || empty($_POST['id_peg1']) || empty($_POST['teks2']) || empty($_POST['id_peg2'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-setup-ttdkwitansi&id_ttdkwitansi=$id_ttdkwitansi");
		}
		else{
		$update= mysql_query ("UPDATE tb_ttdkwitansi SET teks1='$teks1', id_peg1='$id_peg1', teks2='$teks2', id_peg2='$id_peg2' WHERE id_ttdkwitansi='$id_ttdkwitansi'");
			if($update){
				$_SESSION['pesan'] = "Good! setup penandatangan success ...";
				header("location:index.php?page=form-view-ttdkwitansi");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
<div class="row">
<?php
	if (isset($_GET['id_tujuan'])) {
	$id_tujuan = $_GET['id_tujuan'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$id_tujuan'");
	$hasil	= mysql_fetch_array ($query);
		$notnm	=$hasil['tujuan'];
				
	if ($_POST['edit'] == "edit") {
	$tujuan	=$_POST['tujuan'];
	$jenis	=$_POST['jenis'];
	$harian	=$_POST['harian'];
	$saku	=$_POST['saku'];
	$inap		=$_POST['inap'];
	$meeting	=$_POST['meeting'];
	$taksi		=$_POST['taksi'];
	$transport	=$_POST['transport'];
	$lain	=$_POST['lain'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT tujuan FROM tb_tujuan WHERE tujuan='$_POST[tujuan]' AND tujuan!='$notnm'"));
		
		if (empty($_POST['tujuan']) || empty($_POST['jenis'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-tujuan");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-tujuan");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_tujuan SET tujuan='$tujuan', jenis='$jenis', harian='$harian', saku='$saku', inap='$inap', meeting='$meeting', taksi='$taksi', transport='$transport', lain='$lain' WHERE id_tujuan='$id_tujuan'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master tujuan success ...";
				header("location:index.php?page=form-view-data-tujuan");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
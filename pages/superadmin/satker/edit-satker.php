<div class="row">
<?php
	if (isset($_GET['id_satker'])) {
	$id_satker = $_GET['id_satker'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_satker WHERE id_satker='$id_satker'");
	$hasil	= mysql_fetch_array ($query);
		$notnm	=$hasil['satker'];
				
	if ($_POST['edit'] == "edit") {
	$satker	=$_POST['satker'];
	$id_kpa	=$_POST['id_kpa'];
	$id_ppk	=$_POST['id_ppk'];
	$no_ppk	=$_POST['no_ppk'];
	$id_bendahara	=$_POST['id_bendahara'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT satker FROM tb_satker WHERE satker='$_POST[satker]' AND satker!='$notnm'"));
		
		if (empty($_POST['satker'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-satker");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-satker");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_satker SET satker='$satker', id_ppk='$id_ppk', no_ppk='$no_ppk', id_kpa='$id_kpa', id_bendahara='$id_bendahara' WHERE id_satker='$id_satker'");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master Unit Kerja success ...";
				header("location:index.php?page=form-view-data-satker");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
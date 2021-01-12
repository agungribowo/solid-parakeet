<div class="row">
<?php
	$id_satker = $_SESSION['id_satker'];
	if (isset($_GET['id_ta'])) {
	$id_ta = $_GET['id_ta'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_ta WHERE id_ta='$id_ta'");
	$hasil	= mysql_fetch_array ($query);
		$notnm	=$hasil['tahun'];
				
	if ($_POST['edit'] == "edit") {
	$tahun	=$_POST['tahun'];
	$pagu_ln	=$_POST['pagu_ln'];
	$pagu_dn	=$_POST['pagu_dn'];
	$pagu_dk	=$_POST['pagu_dk'];
	
	$ceknm	=mysql_num_rows (mysql_query("SELECT tahun FROM tb_ta WHERE tahun='$_POST[tahun]' AND tahun!='$notnm' AND id_satker=$id_satker"));
		
		if (empty($_POST['tahun']) || empty($_POST['pagu_ln'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-view-data-ta");
		}
		else if($ceknm > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-view-data-ta");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_ta SET tahun='$tahun', pagu_ln='$pagu_ln', pagu_dn='$pagu_dn', pagu_dk='$pagu_dk' WHERE id_ta='$id_ta' AND id_satker=$id_satker");
			if($update){
				$_SESSION['pesan'] = "Good! Edit master tahun anggaran success ...";
				header("location:index.php?page=form-view-data-ta");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
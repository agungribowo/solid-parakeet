<div class="row">
<?php
	if (isset($_GET['id_peg'])) {
	$id_peg = $_GET['id_peg'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$id_peg'");
	$hasil	= mysql_fetch_array ($query);
		$notnip	=$hasil['nip'];
				
	if ($_POST['edit'] == "edit") {
	$nip		=$_POST['nip'];
	$nip_val	=$_POST['nip_val'];
	$nama		=$_POST['nama'];
	$pangkat	=$_POST['pangkat'];
	$id_gol		=$_POST['id_gol'];
	$jab		=$_POST['jab'];
	$id_satker	=$_POST['id_satker'];
	
	$ceknip	=mysql_num_rows (mysql_query("SELECT nip FROM tb_pegawai WHERE nip='$_POST[nip]' AND nip!='$notnip'"));
	
		if (empty($_POST['nip']) || empty($_POST['nama']) || empty($_POST['pangkat']) || empty($_POST['id_gol']) || empty($_POST['id_satker'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-edit-data-pegawai&id_peg=$id_peg");
		}		
		else if($ceknip > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-edit-data-pegawai&id_peg=$id_peg");
		}
		else{
		$update= mysql_query ("UPDATE tb_pegawai SET nip_val='$nip_val', nip='$nip', nama='$nama', pangkat='$pangkat', gol='$id_gol', jab='$jab', satker='$id_satker' WHERE id_peg='$id_peg'");
		
		if($update){
				$_SESSION['pesan'] = "Good! Edit data pegawai $hasil[nip] success ...";
				header("location:index.php?page=form-view-data-pegawai");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
<div class="row">
<?php
	if (isset($_GET['id_spd'])) {
	$id_spd = $_GET['id_spd'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";

	$id_satker = $_SESSION['id_satker'];

	$query	= mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$hasil	= mysql_fetch_array ($query);
	$pegawai=$hasil['pegawai'];

				
	if ($_POST['edit'] == "edit") {
		$pengikut		= implode(',', $_POST['pengikut']);
		
		$semua_peg		="$pegawai".","."$pengikut";
		$semua_pengikut =explode(',', $pengikut);

		$daftarpegawai = '('.$pengikut.')';
		$tglberangkat = $hasil['tgl_berangkat'];
		$tglkembali = $hasil['tgl_kembali'];
		$aqr = "SELECT A.id_nominatif FROM tb_nominatif A INNER JOIN tb_spd B ON B.id_spd=A.id_spd WHERE A.pegawai IN $daftarpegawai AND B.tgl BETWEEN $tglberangkat AND $tglkembali";
		$qrycek = mysql_num_rows(mysql_query($aqr));

		if (empty($_POST['pengikut'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-edit-pengikut&id_spd=$id_spd");
		}
		else if(in_array($pegawai, $semua_pengikut)){
			$_SESSION['pesan'] = "Oops! Duplikat daftar nominatif pegawai ...";
			header("location:index.php?page=form-edit-pengikut&id_spd=$id_spd");
		}
		else if($qrycek>0){
			$_SESSION['pesan'] = "Oops! Salah satu pegawai masih dalam perjalanan dinas ...";
			header("location:index.php?page=form-edit-pengikut&id_spd=$id_spd");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_spd SET pengikut='$pengikut', semua_peg='$semua_peg' WHERE id_spd='$id_spd' and id_satker='$id_satker'");
		
			$delnom	=mysql_query("DELETE FROM tb_nominatif WHERE id_spd='$id_spd'");
			$nom	=explode(',', $semua_peg);
			foreach ($nom as $listpeg) {
				$values="($id_spd, '$listpeg')";
				$insertnom	=mysql_query("INSERT INTO tb_nominatif (id_spd, pegawai) VALUES ".$values);
			}
			
		if($update){
				$_SESSION['pesan'] = "Good! Edit pengikut SPD success ...";
				header("location:index.php?page=detail-data-spd&id_spd=$id_spd");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
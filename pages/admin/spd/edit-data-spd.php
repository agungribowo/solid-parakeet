<div class="row">
<?php
	if (isset($_GET['id_spd'])) {
	$id_spd = $_GET['id_spd'];
	}
	else {
		die ("Error. No Kode Selected! ");	
	}
	include "../../config/koneksi.php";
	$query	= mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$hasil	= mysql_fetch_array ($query);
		$notno	=$hasil['nomor'];
		$pengikut	=$hasil['pengikut'];
		$notpeg	=$hasil['pegawai'];
				
	if ($_POST['edit'] == "edit") {
	$pejabat		=$_POST['pejabat'];
	$tingkat_biaya	=$_POST['tingkat_biaya'];
	$transport		=$_POST['transport'];
	$ket			=$_POST['ket'];	
	$keperluan		=$_POST['keperluan'];	
	$nomor			=$_POST['nomor'];
	// $ppk			=$_POST['ppk'];	
	$no_ppk			=$_POST['no_ppk'];
	$tgl			=$_POST['tgl'];	
	$pegawai		=$_POST['pegawai'];	
	$asal			=$_POST['asal'];	
	$tujuan			=$_POST['tujuan'];	
	$tgl_berangkat	=$_POST['tgl_berangkat'];	
	$tgl_kembali	=$_POST['tgl_kembali'];	
	$no_sprin		=$_POST['no_sprin'];	
	$tgl_sprin		=$_POST['tgl_sprin'];
	$satker			=$_SESSION['id_satker'];	
	$ta				=$_POST['ta'];	
	$ma				=$_POST['ma'];	
	$jenis_pengeluaran	=$_POST['jenis_pengeluaran'];	
	$id_satker = $_SESSION['id_satker'];
	
	if(empty($pengikut)){
		$semua_peg		="$pegawai";
	}
	else{
		$semua_peg		="$pegawai".","."$pengikut";
	}
	
	$semua_pengikut =explode(',', $pengikut);

	$pengikut_problem = false;
	foreach ($semua_pengikut as $pengikut) {
		$kunci	=mysql_num_rows (mysql_query("SELECT pegawai, tgl_berangkat, tgl_kembali FROM tb_spd WHERE pegawai='$pengikut' AND tgl_berangkat >='$tgl_berangkat' AND tgl_kembali <='$tgl_berangkat'"));
		if($kunci > 0) 
		  {
			  $pengikut_problem = true;
			  break;
		  }
	}
	
	list($ynom,$mnom)	=explode ("-",$tgl);
	$nomer	="SPD-"."$nomor"."/PPK."."$no_ppk"."/"."$mnom"."/$ynom";
	
	$cekno	=mysql_num_rows (mysql_query("SELECT nomor FROM tb_spd WHERE nomor='$nomer' AND nomor!='$notno' and id_satker='$id_satker' "));
	
	$aqr = "SELECT A.id_nominatif FROM tb_nominatif A INNER JOIN tb_spd B ON B.id_spd=A.id_spd WHERE A.pegawai=$pegawai AND B.tgl BETWEEN $tgl_berangkat AND $tgl_kembali";
	$qrycek = mysql_num_rows(mysql_query($aqr));
	
	// $kunci	=mysql_num_rows (mysql_query("SELECT pegawai, tgl_berangkat, tgl_kembali FROM tb_spd WHERE pegawai='$_POST[pegawai]' AND pegawai!='$notpeg' AND tgl_berangkat <='$tgl_berangkat' AND tgl_kembali >='$tgl_berangkat'"));
	
		if (empty($_POST['pejabat']) || empty($_POST['keperluan']) || empty($_POST['nomor']) || empty($_POST['pegawai']) || empty($_POST['tujuan']) || empty($_POST['jenis_pengeluaran'])) {
			$_SESSION['pesan'] = "Oops! Please fill all column ...";
			header("location:index.php?page=form-edit-data-spd&id_spd=$id_spd");
		}		
		else if($cekno > 0) {
			$_SESSION['pesan'] = "Oops! Duplikat data ...";
			header("location:index.php?page=form-edit-data-spd&id_spd=$id_spd");
		}
		else if($qrycek > 0) {
			$_SESSION['pesan'] = "Oops! Pegawai bersangkutan masih dalam perjalan dinas ...";
			header("location:index.php?page=form-edit-data-spd&id_spd=$id_spd");
		}
		else if($hasil['id_user'] != $_SESSION['id_user']) {
			$_SESSION['pesan'] = "Oops! Tidak dapat mengedit data user lain ...";
			header("location:index.php?page=form-edit-data-spd&id_spd=$id_spd");
		}
		else if(in_array($pegawai, $semua_pengikut)){
			$_SESSION['pesan'] = "Oops! Duplikat daftar nominatif pegawai ...";
			header("location:index.php?page=form-edit-data-spd&id_spd=$id_spd");
		}
		else if($pengikut_problem) {
			$_SESSION['pesan'] = "Oops! Pengikut masih dalam perjalan dinas ...";
			header("location:index.php?page=form-edit-data-spd&id_spd=$id_spd");
		}
		
		else{
		$update= mysql_query ("UPDATE tb_spd SET pejabat='$pejabat', tingkat_biaya='$tingkat_biaya', transport='$transport', ket='$ket', keperluan='$keperluan', nomor='$nomer', tgl='$tgl', pegawai='$pegawai', asal='$asal', tujuan='$tujuan', tgl_berangkat='$tgl_berangkat', tgl_kembali='$tgl_kembali', no_sprin='$no_sprin', tgl_sprin='$tgl_sprin', satker='$satker', ta='$ta', ma='$ma', jenis_pengeluaran='$jenis_pengeluaran', semua_peg='$semua_peg' WHERE id_spd='$id_spd' and id_satker='$id_satker'");
		
			$delnom	=mysql_query("DELETE FROM tb_nominatif WHERE id_spd='$id_spd'");
			$nom	=explode(',', $semua_peg);
			foreach ($nom as $listpeg) {
				$values="($id_spd, '$listpeg')";
				$insertnom	=mysql_query("INSERT INTO tb_nominatif (id_spd, pegawai) VALUES ".$values);
			}
		
		$update_kwi= mysql_query ("UPDATE tb_kwitansi SET ta='$ta' WHERE id_spd='$id_spd' and id_satker='$id_satker' ");
			
		if($update){
				$_SESSION['pesan'] = "Good! Edit data SPD $hasil[no] success ...";
				header("location:index.php?page=form-view-data-spd");
			}
			else {
				echo "<div class='register-logo'><b>Oops!</b> 404 Error Server.</div>";
			}
		}
	}
?>
</div>
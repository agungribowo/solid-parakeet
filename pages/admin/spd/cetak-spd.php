<?php
ob_start();
include'../../../assets/plugins/tcpdf/tcpdf.php';

class MYPDF extends TCPDF {
	public function Header() {
        // Logo
        //$image_file ='../../../assets/images/avatars/print.png';
		//$this->Image($image_file, 10, 10, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Header
        //$html = '<p><b>REPORT STOCK</b></p>';
		//$this->writeHTMLCell($w = 0, $h = 0, $x = 40, $y = 10, $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
    }
}

$pdf = new MYPDF('P', 'mm', 'F4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Andi Hatmoko');
$pdf->SetTitle('Report');
$pdf->SetSubject('TCPDF');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(20, 10, 15);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 5);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 9);

	include "../../../config/koneksi.php";
	
	if (isset($_GET['id_spd'])) {
		$id_spd = $_GET['id_spd'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	$selLog	=mysql_query("SELECT * FROM tb_logo WHERE id_logo='1'");
	$log	=mysql_fetch_array($selLog);
	
	$query	=mysql_query("SELECT * FROM tb_spd WHERE id_spd='$id_spd'");
	$data	=mysql_fetch_array($query);
	list($y1,$m1,$d1)	=explode ("-",$data['tgl']);
	list($y2,$m2,$d2)	=explode ("-",$data['tgl_berangkat']);
	list($y3,$m3,$d3)	=explode ("-",$data['tgl_kembali']);
	list($y4,$m4,$d4)	=explode ("-",$data['tgl_sprin']);
	
	//
	if ($m1 == "01"){
		$m1	="Januari";
	}
	else if ($m1 == "02"){
		$m1 ="Februari";
	}
	else if ($m1 == "03"){
		$m1 ="Maret";
	}
	else if ($m1 == "04"){
		$m1 ="April";
	}
	else if ($m1 == "05"){
		$m1 ="Mei";
	}
	else if ($m1 == "06"){
		$m1 ="Juni";
	}
	else if ($m1 == "07"){
		$m1 ="Juli";
	}
	else if ($m1 == "08"){
		$m1 ="Agustus";
	}
	else if ($m1 == "09"){
		$m1 ="September";
	}
	else if ($m1 == "10"){
		$m1 ="Oktober";
	}
	else if ($m1 == "11"){
		$m1 ="November";
	}
	else if ($m1 == "12"){
		$m1 ="Desember";
	}
	
	//
	if ($m2 == "01"){
		$m2	="Januari";
	}
	else if ($m2 == "02"){
		$m2 ="Februari";
	}
	else if ($m2 == "03"){
		$m2 ="Maret";
	}
	else if ($m2 == "04"){
		$m2 ="April";
	}
	else if ($m2 == "05"){
		$m2 ="Mei";
	}
	else if ($m2 == "06"){
		$m2 ="Juni";
	}
	else if ($m2 == "07"){
		$m2 ="Juli";
	}
	else if ($m2 == "08"){
		$m2 ="Agustus";
	}
	else if ($m2 == "09"){
		$m2 ="September";
	}
	else if ($m2 == "10"){
		$m2 ="Oktober";
	}
	else if ($m2 == "11"){
		$m2 ="November";
	}
	else if ($m2 == "12"){
		$m2 ="Desember";
	}
	
	//
	if ($m3 == "01"){
		$m3	="Januari";
	}
	else if ($m3 == "02"){
		$m3 ="Februari";
	}
	else if ($m3 == "03"){
		$m3 ="Maret";
	}
	else if ($m3 == "04"){
		$m3 ="April";
	}
	else if ($m3 == "05"){
		$m3 ="Mei";
	}
	else if ($m3 == "06"){
		$m3 ="Juni";
	}
	else if ($m3 == "07"){
		$m3 ="Juli";
	}
	else if ($m3 == "08"){
		$m3 ="Agustus";
	}
	else if ($m3 == "09"){
		$m3 ="September";
	}
	else if ($m3 == "10"){
		$m3 ="Oktober";
	}
	else if ($m3 == "11"){
		$m3 ="November";
	}
	else if ($m3 == "12"){
		$m3 ="Desember";
	}
	
	//
	if ($m4 == "01"){
		$m4	="Januari";
	}
	else if ($m4 == "02"){
		$m4 ="Februari";
	}
	else if ($m4 == "03"){
		$m4 ="Maret";
	}
	else if ($m4 == "04"){
		$m4 ="April";
	}
	else if ($m4 == "05"){
		$m4 ="Mei";
	}
	else if ($m4 == "06"){
		$m4 ="Juni";
	}
	else if ($m4 == "07"){
		$m4 ="Juli";
	}
	else if ($m4 == "08"){
		$m4 ="Agustus";
	}
	else if ($m4 == "09"){
		$m4 ="September";
	}
	else if ($m4 == "10"){
		$m4 ="Oktober";
	}
	else if ($m4 == "11"){
		$m4 ="November";
	}
	else if ($m4 == "12"){
		$m4 ="Desember";
	}
	
	$tampilSet	=mysql_query("SELECT * FROM tb_setup WHERE id_setup='1'");
	$set	=mysql_fetch_array($tampilSet);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[pegawai]'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selGol	=mysql_query("SELECT * FROM tb_gol WHERE id_gol='$peg[gol]'");
	$gol	=mysql_fetch_array($selGol);
	
	$selTra	=mysql_query("SELECT * FROM tb_transport WHERE id_transport='$data[transport]'");
	$tra	=mysql_fetch_array($selTra);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$data[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
	
	$selSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$data[satker]'");
	$sat	=mysql_fetch_array($selSat);
	
	$id_satker = $data['id_satker'];

	$ttdspd	=mysql_query("SELECT * FROM tb_ttdspd WHERE id_satker = '$id_satker'");
	$ttd	=mysql_fetch_array($ttdspd);
	$kepala	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttd[id_peg]'");
	$kep	=mysql_fetch_array($kepala);
	
	$ttdspd2	=mysql_query("SELECT * FROM tb_ttdspd2 WHERE id_satker = '$id_satker'");
	$ttds2		=mysql_fetch_array($ttdspd2);
	$kiri		=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttds2[id_peg1]'");
	$kepkiri	=mysql_fetch_array($kiri);
	$kanan		=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttds2[id_peg2]'");
	$kepkanan	=mysql_fetch_array($kanan);
	
	$brkt	=new DateTime($data['tgl_berangkat']);
	$kmbl	=new DateTime($data['tgl_kembali']);
	$diff	=$kmbl->diff($brkt);
	$lama	=($diff->d)+1;
	
	$uang	=$lama*($tuj['harian']);
	
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
	
$head ='<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td width="290" align="center"><font style="text-transform:uppercase">'.$set['instansi'].'</font></td>	
				<td width="330"></td>
			</tr>
			<tr>
				<td align="center"><font style="text-transform:uppercase">'.$set['kota'].'</font></td>	
				<td></td>
			</tr>
			<tr>
				<td align="center"><u>'.$set['alamat'].'</u></td>	
				<td></td>
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="1">
			<tr>
				<td width="360"></td>	
				<td width="80">Lembar Ke</td>
				<td width="180">: 1</td>
			</tr>
			<tr>
				<td></td>	
				<td>Kode No.</td>
				<td>: </td>
			</tr>
			<tr>
				<td></td>	
				<td>Nomor</td>
				<td>: '.$data['nomor'].'</td>
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="1">
			<tr align="center">
				<td width="213"></td>';
				if (empty($log['logo2'])){
				$head .='<td width="194"><img src="../../../assets/img/default.png" width="70" height="70"/></td>';
				}
				else{
				$head .='<td width="194"><img src="../../../assets/img/'.$log['logo2'].'" width="70" height="70"/></td>';
				}
		$head .='<td width="213"></td>
			</tr>
			<tr align="center">
				<td></td>
				<td style="border-bottom-width: thin;"><b><font size="11">SURAT PERJALANAN DINAS</font></b></td>	
				<td></td>
			</tr>
			<tr align="center">
				<td></td>
				<td><font size="13"><b>(SPD)</b></font></td>
				<td></td>				
			</tr>
		</table>';	
$pdf->writeHTML($head, true, false, false, false, '');

$html ='<table border="0" cellspacing="0" cellpadding="5">
			<tr>
				<td align="center" width="30" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">1</td>
				<td width="290" style="border-top-width: solid; border-right-width: solid;">Pejabat yang Memberi Perintah</td>
				<td width="300" style="border-top-width: solid; border-right-width: solid;"><font style="text-transform:none">'.$data['pejabat'].'</font></td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">2</td>
				<td style="border-top-width: solid; border-right-width: solid;">Nama Pegawai Pelaksana Perjalanan Dinas<br/>'.$peg['nip_val'].' </td>
				<td style="border-top-width: solid; border-right-width: solid;"><font style="text-transform:none">'.$peg['nama'].' <br/> '.$peg['nip_val'].' '.$peg['nip'].'</font></td>
			</tr>
			<tr>
				<td align="center" rowspan="3" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">3</td>
				<td style="border-top-width: solid; border-right-width: solid;">a. Pangkat dan Golongan</td>
				<td style="border-top-width: solid; border-right-width: solid;"><font style="text-transform:none">'.$peg['pangkat'].' / ' .$gol['gol'].'</font></td>
			</tr>
			<tr>
				<td style="border-right-width: solid;">b. Jabatan / Instansi</td>
				<td style="border-right-width: solid;"><font style="text-transform:none">'.$peg['jab'].'</font></td>
			</tr>
			<tr>
				<td style="border-right-width: solid;">c. Tingkat Biaya Perjalanan Dinas</td>
				<td style="border-right-width: solid;"><font style="text-transform:none">'.$data['tingkat_biaya'].'</font></td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">4</td>
				<td style="border-top-width: solid; border-right-width: solid;">Maksud Perjalanan Dinas</td>
				<td style="border-top-width: solid; border-right-width: solid;">'.$data['keperluan'].'<br /></td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">5</td>
				<td style="border-top-width: solid; border-right-width: solid;">Alat Angkutan yang dipergunakan</td>
				<td style="border-top-width: solid; border-right-width: solid;">Angkutan '.$tra['transport'].'</td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">6</td>
				<td style="border-top-width: solid; border-right-width: solid;">a. Tempat Berangkat<br />b. Tempat Tujuan</td>
				<td style="border-top-width: solid; border-right-width: solid;">a. <font style="text-transform:none">'.$data['asal'].'</font><br />b. <font style="text-transform:none">'.$tuj['tujuan'].'</font></td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">7</td>
				<td style="border-top-width: solid; border-right-width: solid;">a. Lamanya Perjalanan Dinas<br />b. Tanggal Berangkat<br />c. Tanggal Harus Kembali/Tiba di Tempat Baru *)</td>
				<td style="border-top-width: solid; border-right-width: solid;">a. '.$lama.' ('.(terbilang($lama)).') Hari<br />b. '.$d2.' '.$m2.' '.$y2.'<br />c. '.$d3.' '.$m3.' '.$y3.'</td>
			</tr>';
			$selPeng=mysql_query("SELECT * FROM tb_nominatif WHERE id_spd='$id_spd' AND pegawai!='$data[pegawai]' ORDER BY id_nominatif");
			$rows	=mysql_num_rows($selPeng)+1;
			$html .='<tr>
				<td align="center" rowspan="'.$rows.'" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">8</td>
				<td style="border-top-width: solid; border-right-width: solid; border-bottom-width: solid;">Pengikut : &nbsp; &nbsp; &nbsp; &nbsp; Nama</td>
				<td align="center" style="border-top-width: solid; border-right-width: solid; border-bottom-width: solid;">Jabatan </td>
			</tr>';
			$no=1;
			while($peng=mysql_fetch_array($selPeng)) {
			$ikut	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$peng[pegawai]'");
			$selikut	=mysql_fetch_array($ikut);
			$html .='<tr>
				<td style="border-right-width: solid;"> <font style="text-transform:none">'.$no++.'. '.$selikut['nama'].'</font></td>	
				<td style="border-right-width: solid;"><font style="text-transform:none">'.$selikut['jab'].'</font></td>	
			</tr>';
			}
	$html .='<tr>
				<td align="center" rowspan="2" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;">9</td>
				<td style="border-top-width: solid; border-right-width: solid;">Pembebanan Anggaran</td>
				<td style="border-top-width: solid; border-right-width: solid;"></td>
			</tr>
			<tr>
				<td style="border-right-width: solid;">a. Instansi<br />b. Akun</td>
				<td style="border-right-width: solid;">'.$set['instansi'].'<br />'.$data['ma'].'</td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid; border-left-width: solid; border-right-width: solid; border-bottom-width: solid;">10</td>
				<td style="border-top-width: solid; border-right-width: solid; border-bottom-width: solid;">Dasar Surat Perintah</td>
				<td style="border-top-width: solid; border-right-width: solid; border-bottom-width: solid;">'.$data['no_sprin'].' Tanggal '.$d4.' '.$m4.' '.$y4.'</td>
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="1">
			<tr>
				<td width="30"></td>
				<td width="290"><font size="7">*) coret yang tidak perlu</font></td>
				<td width="300"></td>
			</tr>
		</table><br />
		<table border="0" cellspacing="0" cellpadding="1">
			<tr>
				<td width="30"></td>
				<td width="290"></td>
				<td width="170">Dikeluarkan di</td>
				<td width="20">:</td>
				<td width="110" align="right">'.$data['asal'].'</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td style="border-bottom-width: solid;">Tanggal</td>
				<td style="border-bottom-width: solid;">:</td>
				<td style="border-bottom-width: solid;" align="right">'.$d1.' '.$m1.' '.$y1.'</td>
			</tr>
		</table>';
$pdf->writeHTML($html, true, false, false, false, '');

$sign = '<table cellpadding="0" border="0" align="center">
			<tr>
				<td width="25%"></td>
				<td width="25%"></td>
				<td width="50%">'.$ttd['teks'].'</td>
			</tr>
			<tr>
				<td height="45"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font style="text-transform:none;"><u>'.$kep['nama'].'</u></font></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td align="center"><font style="text-transform:none;">'.$kep['nip_val'].' '.$kep['nip'].'</font></td>
			</tr>
		</table>';
$pdf->writeHTML($sign, true, false, false, false, '');

$pdf->AddPage();
$pdf->SetFont('helvetica', '', 9);

$page2 = '<table cellpadding="0" border="0" align="center">
			<tr>
				<td>- 2 -</td>
			</tr>
		</table><br /><br />
		<table cellpadding="3" border="0">
			<tr>
				<td width="310" rowspan="6" style="border-top-width: solid; border-left-width: solid; border-right-width: solid;"></td>
				<td width="20" style="border-top-width: solid;">I.</td>
				<td width="130" style="border-top-width: solid;">Berangkat dari (Tempat Kedudukan)</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;border-right-width: solid;"><font style="text-transform:uppercase;">'.$data['asal'].'</font></td>
			</tr>
			<tr>
				<td rowspan="5"></td>
				<td>Ke</td>
				<td>:</td>
				<td style="border-right-width: solid;"><font style="text-transform:uppercase;">'.$tuj['tujuan'].'</font></td>
			</tr>
			<tr>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td height="20" style="border-right-width: solid;">'.$d2.' '.$m2.' '.$y2.'</td>
			</tr>
			<tr>
				<td colspan="3" height="25" style="border-right-width: solid;" align="center">'.$ttd['teks'].'</td>
			</tr>
			<tr>
				<td colspan="3" height="45" style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td colspan="3" height="25" style="border-right-width: solid;" align="center"><u>'.$kep['nama'].'</u><br>'.$kep['nip_val'].' '.$kep['nip'].'</td>
			</tr>
			<tr>
				<td width="20" style="border-top-width: solid; border-left-width: solid;" rowspan="6">II.</td>
				<td width="130" style="border-top-width: solid;">Tiba di</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;">.......................</td>
				<td width="20" style="border-top-width: solid; border-left-width: solid;" rowspan="6"></td>
				<td width="130" style="border-top-width: solid;">Berangkat dari</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td>.......................</td>
				<td>Ke</td>
				<td>:</td>
				<td style="border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td style="border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td colspan="3">Kepala .................................................</td>
				<td colspan="3" style="border-right-width: solid;">Kepala .................................................</td>
			</tr>
			<tr>
				<td colspan="3" height="45"></td>
				<td colspan="3" height="45" style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td colspan="3" height="25">(.......................................................)</td>
				<td colspan="3" height="25" style="border-right-width: solid;">(.......................................................)</td>
			</tr>
			<tr>
				<td width="20" style="border-top-width: solid; border-left-width: solid;" rowspan="6">III.</td>
				<td width="130" style="border-top-width: solid;">Tiba di</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;">.......................</td>
				<td width="20" style="border-top-width: solid; border-left-width: solid;" rowspan="6"></td>
				<td width="130" style="border-top-width: solid;">Berangkat dari</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td>.......................</td>
				<td>Ke</td>
				<td>:</td>
				<td style="border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td style="border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td colspan="3">Kepala .................................................</td>
				<td colspan="3" style="border-right-width: solid;">Kepala .................................................</td>
			</tr>
			<tr>
				<td colspan="3" height="45"></td>
				<td colspan="3" height="45" style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td colspan="3" height="25">(.......................................................)</td>
				<td colspan="3" height="25" style="border-right-width: solid;">(.......................................................)</td>
			</tr>
			<tr>
				<td width="20" style="border-top-width: solid; border-left-width: solid;" rowspan="6">IV.</td>
				<td width="130" style="border-top-width: solid;">Tiba di</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;">.......................</td>
				<td width="20" style="border-top-width: solid; border-left-width: solid;" rowspan="6"></td>
				<td width="130" style="border-top-width: solid;">Berangkat dari</td>
				<td width="20" style="border-top-width: solid;">:</td>
				<td width="140" style="border-top-width: solid;border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td>.......................</td>
				<td>Ke</td>
				<td>:</td>
				<td style="border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td colspan="3"></td>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td style="border-right-width: solid;">.......................</td>
			</tr>
			<tr>
				<td colspan="3">Kepala .................................................</td>
				<td colspan="3" style="border-right-width: solid;">Kepala .................................................</td>
			</tr>
			<tr>
				<td colspan="3" height="45"></td>
				<td colspan="3" height="45" style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td colspan="3" height="25">(.......................................................)</td>
				<td colspan="3" height="25" style="border-right-width: solid;">(.......................................................)</td>
			</tr>
			<tr>
				<td style="border-top-width: solid; border-left-width: solid;" rowspan="7">V.</td>
				<td style="border-top-width: solid;">Tiba di (Tempat Kedudukan)</td>
				<td style="border-top-width: solid;">:</td>
				<td style="border-top-width: solid;">'.$data['asal'].'</td>
				<td style="border-top-width: solid; border-left-width: solid;" rowspan="7"></td>
				<td style="border-top-width: solid;border-right-width: solid;" colspan="3" rowspan="2">Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang sesingkat-singkatnya.</td>
			</tr>
			<tr>
				<td>Pada Tanggal</td>
				<td>:</td>
				<td>.......................</td>
			</tr>
			<tr>
				<td colspan="3" align="center"></td>
				<td colspan="3" align="center" style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td colspan="3" align="center">'.$ttds2['teks1'].'</td>
				<td colspan="3" align="center" style="border-right-width: solid;">'.$ttds2['teks2'].'</td>
			</tr>
			<tr>
				<td colspan="3" height="45"></td>
				<td colspan="3" height="45" style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><font style="text-transform:none;"><u>'.$kepkiri['nama'].'</u></font></td>
				<td colspan="3" align="center" style="border-right-width: solid;"><font style="text-transform:none;"><u>'.$kepkanan['nama'].'</u></font></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><font style="text-transform:none;">'.$kepkiri['nip_val'].' '.$kepkiri['nip'].'</font></td>
				<td colspan="3" align="center" style="border-right-width: solid;"><font style="text-transform:none;">'.$kepkanan['nip_val'].' '.$kepkanan['nip'].'</font></td>
			</tr>
			<tr>
				<td style="border-top-width: solid; border-left-width: solid;">VI.</td>
				<td style="border-top-width: solid; border-right-width: solid;" colspan="7">Catatan Lain-Lain :</td>
			</tr>
			<tr>
				<td style="border-top-width: solid; border-left-width: solid;border-bottom-width: solid;" rowspan="2">VII</td>
				<td style="border-top-width: solid; border-right-width: solid;" colspan="7">PERHATIAN :</td>
			</tr>
			<tr>
				<td style="border-right-width: solid;border-bottom-width: solid;" colspan="7">PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan peraturan-peraturan Keuangan Negara apabila negara menderita rugi akibat kesalahan, kelalaian, dan kealpaannya.</td>
			</tr>
		</table>';
$pdf->writeHTML($page2, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('SPD_'.$data['nomor'].'.pdf', 'I');
?>
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

$pdf = new MYPDF('L', 'mm', 'F4', true, 'UTF-8', false);

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
$pdf->SetMargins(10, 10, 10);
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
	
	$selSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$data[id_satker]'");
	$sat	=mysql_fetch_array($selSat);
	
	$id_satker = $data['id_satker'];

	$ttdspd	=mysql_query("SELECT * FROM tb_ttdspd WHERE id_satker = '$id_satker'");
	$ttd	=mysql_fetch_array($ttdspd);
	
	$kepala	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttd[id_peg]'");
	$kep	=mysql_fetch_array($kepala);
	
	$ttdnom	=mysql_query("SELECT * FROM tb_ttdnominatif WHERE id_satker = '$id_satker'");
	$ttdn	=mysql_fetch_array($ttdnom);
	
	$kepnom1	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttdn[id_peg1]'");
	$kepn1	=mysql_fetch_array($kepnom1);
	$kepnom2	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttdn[id_peg2]'");
	$kepn2	=mysql_fetch_array($kepnom2);
	
	$brkt	=new DateTime($data['tgl_berangkat']);
	$kmbl	=new DateTime($data['tgl_kembali']);
	$diff	=$kmbl->diff($brkt);
	$lama	=($diff->d)+1;
	
	//$uang	=$tuj['harian']+$tuj['saku']+($lama*$tuj['inap'])+$tuj['transport']+$tuj['lain'];
	
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
	
$pagenom = '<table border="0" cellspacing="0" cellpadding="2" style="margin-bottom:40px;">
			<tr>
				<td width="300" align="center"><u><font size="10" style="text-transform:uppercase">'.$set['instansi'].'</font></u></td>	
				<td width="500"></td>
				<td width="300"></td>
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td width="300" rowspan="3"></td>	
				<td width="500" align="center"><font size="9">DAFTAR NOMINATIF / RINCIAN PERJALANAN DINAS</font></td>
				<td width="300" rowspan="3"></td>
			</tr>
			<tr>
				<td align="center"><font size="9" style="text-transform:uppercase">'.$data['keperluan'].' mulai tanggal '.$d2.' '.$m2.' '.$y2.' s/d '.$d3.' '.$m3.' '.$y3.'</font></td>	
			</tr>
			<tr>
				<td align="center"><font size="9" style="text-transform:uppercase;text-decoration:underline;">SESUAI DENGAN SPD NOMOR:  '.$data['nomor'].', tanggal '.$d1.' '.$m1.' '.$y1.'</font></td>	
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td>&nbsp;</td>	
			</tr>
			<tr>
				<td><font style="text-transform:uppercase">'.$data['ma'].'</font></td>	
			</tr>
		</table>
		<table border="1" cellspacing="0" cellpadding="2">
			<tr>
				<td width="25" height="24" align="center"><b>NO</b></td>	
				<td width="205" align="center"><b>NAMA</b></td>
				<td width="100" align="center"><b>TUJUAN</b></td>
				<td width="100" align="center"><b>TGl. BERANGKAT</b></td>
				<td width="50" align="center"><b>HARI JALDIS</b></td>
				<td width="90" align="center"><b>UANG HARIAN 100%</b></td>
				<td width="90" align="center"><b>UANG HARIAN 40% / 30%</b></td>
				<td width="90" align="center"><b>REPRENTASI</b></td>
				<td width="90" align="center"><b>TRANSPORT</b></td>
				<td width="90" align="center"><b>LAIN-LAIN</b></td>
				<td width="90" align="center"><b>JUMLAH</b></td>
				<td width="80" align="center"><b>TTD</b></td>
			</tr>
			<tr>
				<td align="center"><b>1</b></td>	
				<td align="center"><b>2</b></td>	
				<td align="center"><b>3</b></td>	
				<td align="center"><b>4</b></td>	
				<td align="center"><b>5</b></td>	
				<td align="center"><b>6</b></td>	
				<td align="center"><b>7</b></td>	
				<td align="center"><b>8</b></td>	
				<td align="center"><b>9</b></td>	
				<td align="center"><b>10</b></td>	
				<td align="center"><b>11</b></td>	
				<td align="center"><b>12</b></td>	
			</tr>';
			$selRin=mysql_query("SELECT * FROM tb_rincian WHERE id_spd='$id_spd'");
			$no=1;
			
			while ($rin	=mysql_fetch_array($selRin)){
				$listpeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$rin[id_peg]'");
				$list	=mysql_fetch_array($listpeg);
				
				$harian	=$rin['jml_harian']*$rin['nilai_harian'];
				$harian1=$rin['jml_harian1']*$rin['nilai_harian1'];
				$reprentasi=$rin['jml_reprentasi']*$rin['nilai_reprentasi'];
				$saku=$rin['jml_saku']*$rin['nilai_saku'];
				$inap=$rin['jml_inap']*$rin['nilai_inap'];
				$transport=$rin['jml_berangkat']*$rin['nilai_berangkat'] + $rin['jml_kembali']*$rin['nilai_kembali'] + 
				$rin['jml_taxi_berangkat']*$rin['nilai_taxi_berangkat'] + $rin['jml_taxi_kembali']*$rin['nilai_taxi_kembali'];
				$lain=$rin['jml_lain']*$rin['nilai_lain'];
				
				$subtot	=mysql_query("SELECT SUM(total) AS tot FROM tb_rincian WHERE id_spd='$id_spd'"); 
				$sub	=mysql_fetch_assoc($subtot);
				$total		=$sub['tot'];
	
	$pagenom .='<tr>
				<td align="center" height="30">'.$no++.'</td>	
				<td><font style="text-transform:none">'.$list['nama'].'</font></td>	
				<td align="center"><font style="text-transform:none">'.$tuj['tujuan'].'</font></td>	
				<td align="center"><font style="text-transform:none">'.$d2.' '.$m2.' '.$y2.'</font></td>
				<td align="center">'.$lama.'</td>				
				<td align="right">'.number_format($harian,0,",",".").'</td>	
				<td align="right">'.number_format($harian1,0,",",".").'</td>	
				<td align="right">'.number_format($reprentasi,0,",",".").'</td>	
				<td align="right">'.number_format($transport,0,",",".").'</td>	
				<td align="right">'.number_format($lain,0,",",".").'</td>	
				<td align="right">'.number_format($rin['total'],0,",",".").'</td>	
				<td></td>
				</tr>';
				}
	$pagenom .='<tr>
				<td colspan="10" align="center"><b>JUMLAH</b></td>	
				<td align="right"><b>'.number_format($total,0,",",".").'</b></td>	
				<td></td>	
			</tr>
		</table>
		<table cellpadding="2" border="0" align="center">
			<tr>
				<td width="25%"></td>
				<td width="50%"></td>
				<td width="25%"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>'.$data['asal'].', '.date("d F Y").'</td>
			</tr>
			<tr>
				<td>SETUJUI BAYAR:</td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td>'.$ttdn['teks1'].'</td>
				<td></td>
				<td>'.$ttdn['teks2'].'</td>
			</tr>
			<tr>
				<td height="45"></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td align="center"><font style="text-transform:none;"><b><u>'.$kepn1['nama'].'</u></b></font></td>
				<td></td>
				<td align="center"><font style="text-transform:none;"><b><u>'.$kepn2['nama'].'</u></b></font></td>
			</tr>
			<tr>
				<td align="center"><font style="text-transform:none;"> NIP '.$kepn1['nip'].'</font></td>
				<td></td>
				<td align="center"><font style="text-transform:none;">NIP '.$kepn2['nip'].'</font></td>
			</tr>
		</table>';
$pdf->writeHTML($pagenom, true, false, false, false, '');


//Close and output PDF document
$pdf->Output('SPD_'.$data['nomor'].'.pdf', 'I');
?>
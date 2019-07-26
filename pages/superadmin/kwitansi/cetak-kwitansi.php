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

$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', false);

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
$pdf->SetMargins(20, 15, 15);
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
	
	if (isset($_GET['id_kwitansi'])) {
		$id_kwitansi = $_GET['id_kwitansi'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	$tampilSet	=mysql_query("SELECT * FROM tb_setup WHERE id_setup='1'");
	$set	=mysql_fetch_array($tampilSet);
	
	$query	=mysql_query("SELECT * FROM tb_kwitansi WHERE id_kwitansi='$id_kwitansi'");
	$data	=mysql_fetch_array($query);
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
	
	$selSat	=mysql_query("SELECT * FROM tb_satker WHERE id_satker='$spd[satker]'");
	$sat	=mysql_fetch_array($selSat);
	
	$selTah	=mysql_query("SELECT * FROM tb_ta WHERE id_ta='$spd[ta]'");
	$tah	=mysql_fetch_array($selTah);
	
	$id_satker = $data['id_satker'];

	$ttdkwi	=mysql_query("SELECT * FROM tb_ttdkwitansi WHERE id_satker=$id_satker");
	$ttd		=mysql_fetch_array($ttdkwi);
	$kiri		=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttd[id_peg1]'");
	$kepkiri	=mysql_fetch_array($kiri);
	$kanan		=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttd[id_peg2]'");
	$kepkanan	=mysql_fetch_array($kanan);
	
	list($y1,$m1,$d1)	=explode ("-",$spd['tgl']);
	list($y2,$m2,$d2)	=explode ("-",$spd['tgl_berangkat']);
	list($y3,$m3,$d3)	=explode ("-",$spd['tgl_kembali']);
	list($y4,$m4,$d4)	=explode ("-",$spd['tgl_sprin']);
	
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
	
$head ='<table border="0" cellspacing="0" cellpadding="1">
			<tr>
				<td width="520" colspan="3"><font style="text-transform:uppercase">'.$set['instansi'].'</font></td>	
				<td width="100" colspan="2"><font size="8">Bukti Kas No. :</font></td>
			</tr>
			<tr>
				<td width="75"><font style="text-transform:uppercase">BENDAHARA</font></td>	
				<td width="10">:</td>	
				<td width="435"><font style="text-transform:uppercase">'.$sat['satker'].'</font></td>	
				<td><font size="8">Bentuk :</font></td>
				<td></td>
			</tr>
			<tr>
				<td><font style="text-transform:uppercase">NOMINKU</font></td>	
				<td>:</td>	
				<td></td>	
				<td><font size="8">Lembar :</font></td>
				<td><font size="8"><u>kesatu</u></font></td>
			</tr>
			<tr>
				<td></td>	
				<td></td>	
				<td></td>	
				<td></td>
				<td><font size="8"><u>kedua</u></font></td>
			</tr>
			<tr>
				<td></td>	
				<td></td>	
				<td></td>	
				<td></td>
				<td><font size="8"><u>ketiga</u></font></td>
			</tr>
			<tr>
				<td colspan="4" align="center"><font style="text-transform:uppercase;"><b><u>KWITANSI</u></b></font></td>		
				<td><font size="8"><u>keempat</u></font></td>
			</tr>
		</table>
		<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td colspan="3"></td>	
			</tr>
			<tr>
				<td width="120">Tahun  Anggaran</td>	
				<td width="10">:</td>
				<td width="490"><font style="text-transform:uppercase">'.$tah['tahun'].'</font></td>
			</tr>
			<tr>
				<td>Mata Anggaran</td>	
				<td>:</td>
				<td><font style="text-transform:uppercase">'.$spd['ma'].'</font></td>
			</tr>
			<tr>
				<td>Jenis Pengeluaran</td>	
				<td>:</td>
				<td><font style="text-transform:uppercase">'.$spd['jenis_pengeluaran'].'</font></td>
			</tr>
			<tr>
				<td colspan="3"></td>	
			</tr>
		</table>
		<table border="1" cellspacing="0" cellpadding="0">
		</table>';	
$pdf->writeHTML($head, true, false, false, false, '');

$html ='<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td width="100">Terima  dari</td>	
				<td width="10">:</td>
				<td width="510"><font style="text-transform:uppercase">'.$ttd['teks2'].'</font></td>
			</tr>
			<tr>
				<td colspan="3" style="border-bottom-style: dotted;"></td>	
			</tr>
			<tr>
				<td colspan="3">Uang sejumlah Rp. <b><i>'.number_format($data['jumlah'],0,",",".").' &nbsp; ('.ucwords (terbilang($data['jumlah'])).' Rupiah)</i></b></td>
			</tr>
			<tr>
				<td colspan="3"></td>	
			</tr>
			<tr>
				<td colspan="3" style="border-bottom-style: dotted;"></td>	
			</tr>
			<tr>
				<td width="100">Untuk keperluan</td>	
				<td width="10"></td>
				<td width="510">Biaya perjalanan dinas biasa dalam rangka:<br />'.$spd['keperluan'].' di '.$tuj['tujuan'].'</td>
			</tr>
			<tr>
				<td colspan="3"></td>	
			</tr>
			<tr>
				<td>Sesuai</td>	
				<td>:</td>
				<td>'.$spd['nomor'].' &nbsp; &nbsp; &nbsp; &nbsp; Tanggal '.$d1.' '.$m1.' '.$y1.'</td>
			</tr>
			<tr>
				<td colspan="3" style="border-bottom-style: dotted;"></td>	
			</tr>
			<tr>
				<td colspan="3" style="border-bottom-style: dotted;"></td>	
			</tr>
			<tr>
				<td>Keterangan</td>
				<td>:</td>
				<td>Disebelah terlampir ............. helai surat ./. tanda bukti pembayaran ---------------------------------------------</td>
			</tr>
			<tr>
				<td colspan="3"></td>	
			</tr>
		</table>
		<table border="1" cellspacing="0" cellpadding="0">
		</table>';
$pdf->writeHTML($html, true, false, false, false, '');

$sign = '<table cellpadding="2" border="0">
			<tr>
				<td width="5%"></td>
				<td width="35%" align="center"></td>
				<td width="20%"></td>
				<td width="35%" align="center">'.$spd['asal'].', '.date("d F Y").'</td>
				<td width="5%"></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"></td>
				<td></td>
				<td align="center">Yang Menerima</td>
				<td></td>
			</tr>
			<tr>
				<td height="45"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"></td>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;"><u>'.$peg['nama'].'</u></font></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"></td>
				<td></td>';
				if(stristr($peg['pangkat'], 'jend') === FALSE){
		$sign .='<td align="center"><font style="text-transform:uppercase;">NIP '.$peg['nip'].'</font></td>';
				}
				else{
		$sign .='<td align="center"><font style="text-transform:uppercase;">'.$peg['pangkat'].'</font></td>';		
				}
		$sign .='<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<table cellpadding="0" border="1">
		</table>';
$pdf->writeHTML($sign, true, false, false, false, '');

$sign1 = '<table cellpadding="2" border="0">
			<tr>
				<td width="5%"></td>
				<td width="35%" align="center">SETUJU DIBAYAR</td>
				<td width="20%"></td>
				<td width="35%" align="center"></td>
				<td width="5%"></td>
			</tr>
			<tr>
				<td></td>
				<td align="center">'.$ttd['teks1'].'</td>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;">'.$ttd['teks2'].'</font></td>
				<td></td>
			</tr>
			<tr>
				<td height="45"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;"><u>'.$kepkiri['nama'].'</u></font></td>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;"><u>'.$kepkanan['nama'].'</u></font></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;">NIP '.$kepkiri['nip'].'</font></td>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;">NIP '.$kepkanan['nip'].'</font></td>
				<td></td>
			</tr>
		</table>';
$pdf->writeHTML($sign1, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('KWITANSI_'.$spd['nomor'].'.pdf', 'I');
?>
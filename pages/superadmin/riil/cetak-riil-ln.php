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
$pdf->SetMargins(20, 25, 15);
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
	
	if (isset($_GET['id_riil'])) {
		$id_riil = $_GET['id_riil'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	$query	=mysql_query("SELECT * FROM tb_riil WHERE id_riil='$id_riil'");
	$data	=mysql_fetch_array($query);
	
	// $selRin	=mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$data[id_rincian]'");
	// $rin	=mysql_fetch_array($selRin);
	// $inap	=$rin['jml_inap']*$rin['nilai_inap'];
	// $taxi_berangkat	=$rin['jml_taxi_berangkat']*$rin['nilai_taxi_berangkat'];
	// $taxi_kembali	=$rin['jml_taxi_kembali']*$rin['nilai_taxi_kembali'];
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	$ttdriil=mysql_query("SELECT * FROM tb_ttdriil WHERE id_satker='$spd[id_satker]'");
	$ttd	=mysql_fetch_array($ttdriil);
	$kepala	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttd[id_peg]'");
	$kep	=mysql_fetch_array($kepala);
	
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
	
	
$head ='<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td align="center" colspan="4"><font style="text-transform:uppercase"><b>DAFTAR PENGELUARAN RIIL</b></font></td>	
			</tr>
			<tr>
				<td align="center" colspan="4"></td>	
			</tr>
			<tr>
				<td colspan="4">Yang bertandatangan di bawah ini:</td>	
			</tr>
			<tr>
				<td width="40"></td>	
				<td width="110">Nama</td>	
				<td width="10">:</td>
				<td width="460"><font style="text-transform:uppercase">'.$peg['nama'].'</font></td>
			</tr>
			<tr>
				<td></td>	
				<td>NIP</td>	
				<td>:</td>
				<td><font style="text-transform:uppercase">'.$peg['nip'].'</font></td>
			</tr>
				<tr>
				<td></td>	
				<td>Pangkat</td>	
				<td>:</td>
				<td><font style="text-transform:uppercase">'.$peg['pangkat'].'</font></td>
			</tr>
			<tr>
				<td></td>	
				<td>Jabatan</td>	
				<td>:</td>
				<td><font style="text-transform:uppercase">'.$peg['jab'].'</font></td>
			</tr>
			<tr>
				<td align="center" colspan="4"></td>	
			</tr>
			<tr>
				<td colspan="4">Berdasarkan Surat Perjalanan Dinas (SPD) Nomor : '.$spd['nomor'].' tanggal  '.$d1.' '.$m1.' '.$y1.', dengan ini kami menyatakan dengan sesungguhnya bahwa:</td>	
			</tr>
			<tr>
				<td align="center" colspan="4"></td>	
			</tr>
			<tr>
				<td align="center">1.</td>	
				<td colspan="3">Biaya transpor pegawai dan/atau biaya penginapan di bawah ini yang tidak dapat diperoleh bukti-bukti pengeluarannya, meliputi :</td>	
			</tr>
		</table>';	
$pdf->writeHTML($head, true, false, false, false, '');

$html ='<table border="0" cellspacing="0" cellpadding="4">
			<tr>
				<td rowspan="6" width="40" style="border-right-width: solid;"></td>
				<td align="center" width="40" style="border-top-width: solid;"><b>NO</b></td>
				<td align="center" width="440" style="border-top-width: solid;border-left-width: solid;"><b>URAIAN</b></td>
				<td align="center" width="100" style="border-top-width: solid;border-left-width: solid;border-right-width: solid;"><b>JUMLAH</b></td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid;border-right-width: solid;">1</td>
				<td style="border-top-width: solid;border-right-width: solid;">'.$data['uraian1'].'</td>
				<td align="right" style="border-top-width: solid;border-right-width: solid;">'.number_format($data['jml1'],0,",",".").'</td>
			</tr>
			<tr>
				<td align="center" style="border-right-width: solid;">2</td>
				<td style="border-right-width: solid;">'.$data['uraian2'].'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml2'],0,",",".").'</td>
			</tr>
			<tr>
				<td align="center" style="border-right-width: solid;">3</td>
				<td style="border-right-width: solid;">'.$data['uraian3'].'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml3'],0,",",".").'</td>
			</tr>
			<tr>
				<td align="center" style="border-right-width: solid;">4</td>
				<td style="border-right-width: solid;">'.$data['uraian4'].'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml4'],0,",",".").'</td>
			</tr>
			<tr>
				<td align="center" colspan="2" style="border-top-width: solid;border-right-width: solid;border-bottom-width: solid;"><b>Jumlah</b></td>
				<td align="right" style="border-top-width: solid;border-bottom-width: solid;border-right-width: solid;"><b>'.number_format($data['jml1']+$data['jml2']+$data['jml3']+$data['jml4'],0,",",".").'</b></td>
			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
			<tr>
				<td width="40" align="center">2.</td>
				<td width="580">Jumlah uang tersebut pada angka 1 di atas benar-benar dikeluarkan untuk pelaksanaan Perjalanan Dinas dimaksud dan apabila di kemudian hari terdapat kelebihan atas pembayaran, kami bersedia untuk menyetorkan kelebihan tersebut ke Kas Negara.</td>
			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
			<tr>
				<td colspan="4">Demikian pernyataan ini kami buat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.</td>
			</tr>
		</table><br /><br /><br />';
$pdf->writeHTML($html, true, false, false, false, '');

$sign = '<table cellpadding="2" border="0">
			<tr>
				<td width="5%"></td>
				<td width="35%" align="center">Mengetahui / Menyetujui :</td>
				<td width="20%"></td>
				<td width="35%" align="center">'.$spd['asal'].', '.date("d F Y").'</td>
				<td width="5%"></td>
			</tr>
			<tr>
				<td></td>
				<td align="center">'.$ttd['teks'].'</td>
				<td></td>
				<td align="center">Pelaksana SPD</td>
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
				<td align="center"><font style="text-transform:uppercase;"><u>'.$kep['nama'].'</u></font></td>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;"><u>'.$peg['nama'].'</u></font></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"><font style="text-transform:uppercase;">'.$kep['nip_val'].' '.$kep['nip'].'</font></td>
				<td></td>';
				if(stristr($peg['pangkat'], 'jend') === FALSE){
		$sign .='<td align="center"><font style="text-transform:uppercase;">'.$peg['nip_val'].' '.$peg['nip'].'</font></td>';
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
		<table cellpadding="1" border="1">
		</table>';
$pdf->writeHTML($sign, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('RIIL_'.$spd['nomor'].'.pdf', 'I');
?>
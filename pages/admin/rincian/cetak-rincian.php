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
	
	if (isset($_GET['id_rincian'])) {
		$id_rincian = $_GET['id_rincian'];
	}
	else {
		die ("Error. No ID Selected! ");	
	}
	
	$query	=mysql_query("SELECT * FROM tb_rincian WHERE id_rincian='$id_rincian'");
	$data	=mysql_fetch_array($query);
	
	$selSpd   =mysql_query("SELECT * FROM tb_spd WHERE id_spd='$data[id_spd]'");
	$spd    =mysql_fetch_array($selSpd);
	
	$selPeg	=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$data[id_peg]'");
	$peg	=mysql_fetch_array($selPeg);
	
	$selTuj	=mysql_query("SELECT * FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
	$tuj	=mysql_fetch_array($selTuj);
	
	$id_satker = $data['id_satker'];
	
	$ttdrinci	=mysql_query("SELECT * FROM tb_ttdrincian WHERE  id_satker = '$id_satker'");
	$ttdrin		=mysql_fetch_array($ttdrinci);
	$kiri		=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttdrin[id_peg1]'");
	$kepkiri	=mysql_fetch_array($kiri);
	$kanan		=mysql_query("SELECT * FROM tb_pegawai WHERE id_peg='$ttdrin[id_peg2]'");
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
	
$head ='<table border="0" cellspacing="0" cellpadding="2">
			<tr>
				<td align="center" colspan="3"><font style="text-transform:uppercase"><b>RINCIAN BIAYA PERJALANAN DINAS</b></font></td>	
			</tr>
			<tr>
				<td align="center" colspan="3"></td>	
			</tr>
			<tr>
				<td width="150">Lampiran SPD Nomor</td>	
				<td width="10">:</td>
				<td width="460">'.$spd['nomor'].'</td>
			</tr>
			<tr>
				<td>Tanggal</td>	
				<td>:</td>
				<td>'.$d1.' '.$m1.' '.$y1.'</td>
			</tr>
			<tr>
				<td>Kegiatan</td>	
				<td>:</td>
				<td>'.$spd['keperluan'].'</td>
			</tr>
		</table>';	
$pdf->writeHTML($head, true, false, false, false, '');

$html ='<table border="0" cellspacing="0" cellpadding="4">
			<tr>
				<td align="center" width="40" style="border-top-width: solid;border-left-width: solid;"><b>NO</b></td>
				<td align="center" width="340" colspan="4" style="border-top-width: solid;border-left-width: solid;"><b>PERINCIAN BIAYA</b></td>
				<td align="center" width="100" style="border-top-width: solid;border-left-width: solid;border-right-width: solid;"><b>JUMLAH</b></td>
				<td align="center" width="140" style="border-top-width: solid;border-right-width: solid;"><b>KETERANGAN</b></td>
			</tr>
			<tr>
				<td align="center" style="border-top-width: solid;border-left-width: solid;border-right-width: solid;">1</td>
				<td width="210" style="border-top-width: solid;">Biaya penginapan di '.$tuj['tujuan'].'</td>
				<td width="30" align="right" style="border-top-width: solid;">'.$data['jml_inap'].'</td>
				<td width="20" style="border-top-width: solid;">X</td>
				<td width="80" align="right" style="border-top-width: solid;border-right-width: solid;">'.number_format($data['nilai_inap'],0,",",".").'</td>
				<td align="right" style="border-top-width: solid;border-right-width: solid;">'.number_format($data['jml_inap']*$data['nilai_inap'],0,",",".").'</td>
				<td style="border-top-width: solid;border-right-width: solid;">'.$data['ket_inap'].'</td>
			</tr>
			<tr>
				<td rowspan="5" align="center" style="border-left-width: solid;border-right-width: solid;">2</td>
				<td colspan="4" style="border-right-width: solid;">Transportasi :</td>
				<td style="border-right-width: solid;"></td>
				<td style="border-right-width: solid;"></td>
			</tr>
			<tr>
				<td>'.$spd['asal'].' - '.$tuj['tujuan'].'</td>
				<td align="right">'.$data['jml_berangkat'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_berangkat'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_berangkat']*$data['nilai_berangkat'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_berangkat'].'</td>
			</tr>
			<tr>
				<td>'.$tuj['tujuan'].' - '.$spd['asal'].'</td>
				<td align="right">'.$data['jml_kembali'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_kembali'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_kembali']*$data['nilai_kembali'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_kembali'].'</td>
			</tr>
			<tr>
				<td>Taxi '.$spd['asal'].' PP</td>
				<td align="right">'.$data['jml_taxi_berangkat'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_taxi_berangkat'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_taxi_berangkat']*$data['nilai_taxi_berangkat'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_taxi_berangkat'].'</td>
			</tr>
			<tr>
				<td>Taxi '.$tuj['tujuan'].' PP</td>
				<td align="right">'.$data['jml_taxi_kembali'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_taxi_kembali'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_taxi_kembali']*$data['nilai_taxi_kembali'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_taxi_kembali'].'</td>
			</tr>
			<tr>
				<td align="center" style="border-left-width: solid;border-right-width: solid;">3</td>
				<td>Uang Harian</td>
				<td align="right">'.$data['jml_harian'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_harian'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_harian']*$data['nilai_harian'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_harian'].'</td>
			</tr>
			<tr>
				<td rowspan="4" align="center" style="border-left-width: solid;border-right-width: solid;">4</td>
				<td colspan="4" style="border-right-width: solid;">Uang Saku Rapat :</td>
				<td style="border-right-width: solid;"></td>
				<td style="border-right-width: solid;"></td>
			</tr>
			<tr>
		

				<td>Uang Saku Rapat Halfday</td>
				<td align="right">'.$data['jml_saku'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_saku'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_saku']*$data['nilai_saku'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_saku'].'</td>
			</tr>
			<tr>
				<td>Uang Saku Rapat Fullday</td>
				<td align="right">'.$data['jml_saku2'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_saku2'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_saku2']*$data['nilai_saku2'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_saku2'].'</td>
			</tr>
			<tr>
				<td>Uang Saku Rapat Fullboard</td>
				<td align="right">'.$data['jml_saku3'].'</td>
				<td>X</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['nilai_saku3'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_saku3']*$data['nilai_saku3'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_saku3'].'</td>
			</tr>
			<tr>
			
				<td align="center" style="border-left-width: solid;border-right-width: solid;">5</td>
				<td width="210">'.$data['uraian_lain'].'</td>
				<td width="30" align="right">'.$data['jml_lain'].'</td>
				<td width="20">X</td>
				<td width="80" align="right" style="border-right-width: solid;">'.number_format($data['nilai_lain'],0,",",".").'</td>
				<td align="right" style="border-right-width: solid;">'.number_format($data['jml_lain']*$data['nilai_lain'],0,",",".").'</td>
				<td style="border-right-width: solid;">'.$data['ket_lain'].'</td>
			</tr>
			<tr>
				<td colspan="5" align="center" style="border-left-width: solid;border-top-width: solid;border-right-width: solid;"><b>Jumlah</b></td>
				<td align="right" style="border-top-width: solid;border-right-width: solid;"><b>'.number_format($data['total'],0,",",".").'</b></td>
				<td style="border-top-width: solid;border-right-width: solid;"></td>
			</tr>
			<tr>
				<td style="border-top-width: solid;border-left-width: solid;border-bottom-width: solid;"></td>
				<td colspan="6" style="border-top-width: solid;border-right-width: solid;border-bottom-width: solid;">Terbilang : <i>'.ucwords (terbilang($data['total'])).' Rupiah</i></td>
			</tr>
		</table>';
$pdf->writeHTML($html, true, false, false, false, '');

$sign1 = '<table cellpadding="2" border="0">
			<tr>
				<td width="5%"></td>
				<td width="35%"></td>
				<td width="20%"></td>
				<td width="35%" align="center">'.$spd['asal'].', '.date("d F Y").'</td>
				<td width="5%"></td>
			</tr>
			<tr>
				<td></td>
				<td>Telah dibayarkan Sejumlah</td>
				<td></td>
				<td>Telah Menerima Jumlah Uang Sebesar</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><b>Rp '.number_format($data['total'],0,",",".").'</b></td>
				<td></td>
				<td><b>Rp '.number_format($data['total'],0,",",".").'</b></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center">'.$ttdrin['teks2'].'</td>
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
				<td align="center"><font style="text-transform:none;"><u>'.$kepkanan['nama'].'</u></font></td>
				<td></td>
				<td align="center"><font style="text-transform:none;"><u>'.$peg['nama'].'</u></font></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"><font style="text-transform:none;">'.$kepkanan['nip_val'].' '.$kepkanan['nip'].'</font></td>
				<td></td>';
				if(stristr($peg['pangkat'], 'jend') === FALSE){
		$sign1 .='<td align="center"><font style="text-transform:none;">'.$peg['nip_val'].' '.$peg['nip'].'</font></td>';
				}
				else{
		$sign1 .='<td align="center"><font style="text-transform:none;">'.$peg['pangkat'].'</font></td>';		
				}
		$sign1 .='<td></td>
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
$pdf->writeHTML($sign1, true, false, false, false, '');

$foot = '<table cellpadding="2" border="0">
			<tr>
				<td colspan="4" align="center">PERHITUNGAN SPD RAMPUNG</td>
			</tr>
			<tr>
				<td width="5%"></td>
				<td width="35%"></td>
				<td width="55%"></td>
				<td width="5%"></td>
			</tr>
			<tr>
				<td></td>
				<td>Ditetapkan Sejumlah</td>
				<td>: Rp '.number_format($data['total'],0,",",".").'</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>Yang Telah dibayar Semula</td>
				<td>: Rp '.number_format($data['uang_muka'],0,",",".").'</td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td>Sisa Kurang/Lebih</td>
				<td>: Rp '.number_format(($data['total']-$data['uang_muka']),0,",",".").'</td>
				<td></td>
			</tr>
		</table>';
$pdf->writeHTML($foot, true, false, false, false, '');

$sign2 = '<table cellpadding="2" border="0">
			<tr>
				<td width="5%"></td>
				<td width="35%"></td>
				<td width="20%"></td>
				<td width="35%" align="center">'.$ttdrin['teks1'].'</td>
				<td width="5%"></td>
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
				<td></td>
				<td></td>
				<td align="center"><font style="text-transform:none;"><u>'.$kepkiri['nama'].'</u></font></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td align="center"><font style="text-transform:none;">'.$kepkiri['nip_val'].' '.$kepkiri['nip'].'</font></td>
				<td></td>
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
$pdf->writeHTML($sign2, true, false, false, false, '');

//Close and output PDF document
$pdf->Output('RINCIAN_'.$spd['nomor'].'.pdf', 'I');
?>
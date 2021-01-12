<style type="text/css">
.dtHorizontalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalExample th, td {
white-space: nowrap;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
</style>


<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
	<li>
		<?php
			if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
				echo "<span class='pesan'><div class='btn btn-sm btn-inverse m-b-10'><i class='fa fa-bell text-warning'></i>&nbsp; ".$_SESSION['pesan']." &nbsp; &nbsp; &nbsp;</div></span>";
			}
			$_SESSION['pesan'] ="";
		?>
	</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Report<small> SPD</small></h1>
<!-- end page-header -->
<div class="profile-container">
	<!-- begin profile-section -->
	<div class="profile-section">
		<div class="panel-body">
			<form action="index.php?page=report-spd-bydate" class="form-horizontal" method="POST" enctype="multipart/form-data" >
				<div class="form-group">
					<label class="col-md-2 control-label">Periode</label>
					<div class="col-md-3">
						<div class="input-group date" id="datepicker-disabled-past1" data-date-format="yyyy-mm-dd">
							<input type="text" name="start" placeholder="Start Date" class="form-control" />
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="input-group date" id="datepicker-disabled-past2" data-date-format="yyyy-mm-dd">
							<input type="text" name="end" placeholder="End date" class="form-control" />
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						</div>
					</div>
					<div class="col-md-3">
						<button type="submit" name="report" value="report" class="btn btn-success"><i class="fa fa-search"></i> &nbsp;Get Report</button>&nbsp;
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- end profile-section -->
	<!-- begin profile-section -->
	<div class="profile-section">
		<div class="panel-body">
	<table id="dtHorizontalExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
				<thead>
					<tr>
						<th class="th-sm" width="4%">No</th>
						<th class="th-sm" >Pegawai</th>
						<th class="th-sm" >Nomor SPD/No Sprin</th>
						<th class="th-sm" >Tgl SPD</th>
						<th class="th-sm" >Keperluann</th>
						<th class="th-sm" >Tujuan</th>
						<th class="th-sm" >Tgl Berangkat</th>
						<th class="th-sm" >Tgl Kembali</th>
						<th class="th-sm" >Status</th>
						<th class="th-sm" width="4%">Jumlah Hari</th>
						<th class="th-sm" width="4%">Unit</th>
					</tr>
				</thead>
				<tbody>
					<?php

						include "../../config/koneksi.php";
						$no=0;
						$query	=mysql_query("SELECT A.id_nominatif, A.pegawai, A.id_satker, B.nomor, B.tgl, B.keperluan, B.asal, B.tujuan, B.tgl_berangkat, B.tgl_kembali, B.no_sprin FROM tb_nominatif A INNER JOIN tb_spd B ON B.id_spd=A.id_spd ORDER BY A.pegawai,B.tgl DESC");
						while($spd	=mysql_fetch_array($query)){
						list($y1,$m1,$d1)	=explode ("-",$spd['tgl']);
						list($y2,$m2,$d2)	=explode ("-",$spd['tgl_berangkat']);
						$no++
					?>
					<tr>
						<td><?php echo $no?></td>
						<td><?php
							$selPeg	=mysql_query("SELECT nama,nip,satker,nip_val FROM tb_pegawai WHERE id_peg='$spd[pegawai]'");
							$peg	=mysql_fetch_array($selPeg);
							echo $peg['nama'].' <br> '.$peg['nip_val'].' '.$peg['nip'];
							?>
						</td>
						<td><?php echo $spd['nomor'].'<br>'.$spd['no_sprin'];?></td>
						<td><?php echo $d1?>-<?php echo $m1?>-<?php echo $y1?></td>
						<td><?php echo $spd['keperluan'];?></td>
						<td><?php
							$selTuj	=mysql_query("SELECT tujuan FROM tb_tujuan WHERE id_tujuan='$spd[tujuan]'");
							$tuj	=mysql_fetch_array($selTuj);
							echo $tuj['tujuan'];
							?>
						</td>
						<td><?php echo $d2?>-<?php echo $m2?>-<?php echo $y2?></td>
						<td><?php echo date("d-m-Y",strtotime( $spd['tgl_kembali']));?></td>
						<td><?php 
						$paymentDate = date('Y-m-d');
						$paymentDate=date('Y-m-d', strtotime($paymentDate));

						$contractDateBegin = date('Y-m-d', strtotime($spd['tgl_kembali']));
						
						if ($paymentDate >= $contractDateBegin){
    					$lala = "Selesai";
						}else{
   						 $lala =  "Proses";  
							}

						echo $lala ;?></td>
						<td><?php
							$brkt	=new DateTime($spd['tgl_berangkat']);
							$kmbl	=new DateTime($spd['tgl_kembali']);
							$diff	=$kmbl->diff($brkt);
							$lama	=($diff->d)+1;
							echo $lama;
							?>
						</td>
						<td><?php
							$selSat	=mysql_query("SELECT satker FROM tb_satker WHERE id_satker='$peg[satker]'");
							$tuj	=mysql_fetch_array($selSat);
							echo $tuj['satker'];
							?>
						</td>
					</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<!-- end profile-section -->
</div>


<script> // 500 = 0,5 s
	Date.prototype.addDays = function(days) {
		var date = new Date(this.valueOf());
		date.setDate(date.getDate() + days);
		return date;
	}

	$(document).ready(function(){setTimeout(function(){$(".pesan").fadeIn('slow');}, 500);});
	setTimeout(function(){$(".pesan").fadeOut('slow');}, 7000);
	$(document).ready(function(){
	$('#datatable').DataTable({
		"fnDrawCallback": function() {
		$table = $(this);
		// for each row in the table body...

		
		let rows = $table.find("tbody>tr");
		var no = 1;
		rows.each(function(idx, value) {
		var $tr = $(value);

		if (idx>0) 
		if ($tr.context.cells[1].innerText == $(rows[idx-1]).context.cells[1].innerText) {
	  	    $($tr.context.cells[1]).css('color', 'rgba(0, 0, 0, 0)');
			$($tr.context.cells[0]).text('');

			let st = $tr.context.cells[6].innerText;
			let st2 = $(rows[idx-1]).context.cells[6].innerText;
			let hr = parseInt($tr.context.cells[7].innerText);
			let hr2 = $(rows[idx-1]).context.cells[7].innerText;

			let pattern = /(\d{2})\-(\d{2})\-(\d{4})/;
			let dt = new Date(st.replace(pattern,'$3-$2-$1'));
			let dt2 = new Date(st2.replace(pattern,'$3-$2-$1'));

			let limit = dt.addDays(hr);
			let limit2 = dt2.addDays(hr2);
			
			if (dt<=limit2 && dt>=dt2) {
				$($tr.context.cells[6]).css('background', 'red');
				$($tr.context.cells[7]).css('background', 'red');
			}
				
		} else {
			no++;
			$($tr.context.cells[0]).text(no);
		}
	
  });

 // end if the table has the proper class
} // end fnDrawCallback()
	});
});

</script>


<script type="text/javascript">
$(document).ready(function () {
$('#dtHorizontalExample').DataTable({
"scrollY": "50vh",
"scrollCollapse": true,
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});
</script>
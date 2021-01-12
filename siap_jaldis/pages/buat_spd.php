<?php
require '../cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kelola Admin</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
<?php require '../koneksi.php'; ?>
<?php require '../sidebar.php'; ?>
      <!-- Main Content -->
      <div id="content">

<?php require '../navbar.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
<?php
if ($_SESSION['id'] == 1) {
	$lihat = 'none';
} else {
	$lihat = 'hidden';
};
?>



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Buat Jaldis</h6>
            </div>
            <div class="card-body">
              <div class="">
  
  <div class="row">
   <!--  kiri -->
  <div class="col-md-6">
  <div class="form-group">
  <label>Pejabat Pemberi Perintah</label>
  <input type="text" name="pejabat" class="form-control" >      
  </div>
<div class="form-group">
  <label>Tingkat Biaya Perjalanan Dinas</label>
  <input type="text" name="pejabat" class="form-control" >      
  </div>
  <div class="form-group">
  <label>Jenis Transportasi</label>
  <select class="form-control" name="trasportasi" >
    <option>Pilih</option>
    <option value="Darat">Darat</option>
    <option value="Laut">Laut</option>
    <option value="Udara">Udara</option>
    
  </select>    
  </div>

  <div class="form-group">
  <label>Pegawai</label>
    <select  class="form-control select2 chosen-select" style="width: 100%;"  name="pegawai" required="required">
                  
                 <option value=""  disable>--- Pilih data---</option>
      <?php

        $q = mysqli_query($koneksi, "SELECT * FROM pegawai_bnpt");
        while($data = mysqli_fetch_array($q)){
          echo '<option style="color: blue" value="'.$data['id_peg'].'">'.$data['nama_pegawai'].' ('.$data['nip'].' '.$data['golongan'].' ('.$data['jabatan'].'))</option>';
        }

      ?>
      </select>
  </div>
 
 <div class="form-group">
  <label>Keperluan</label>
  <textarea  name="keperluan" class="form-control"></textarea>      
  </div>
</div>



<!-- kiri akhir -->
<!-- kanan -->
 <div class="col-md-6">
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">

<?php 
$k = $_SESSION['unit_satker']; 
$query_jaldis = mysqli_query($koneksi,"SELECT * FROM unit WHERE id_unit='$k'");
//$result = mysqli_query($conn, $query);
 $lala = mysqli_fetch_array($query_jaldis);


?>


  <label>Nomor Jaldis</label>
  <input type="text" name="nomor_jaldis" class="form-control">      
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
  <label>PPK</label>
  <input type="text" name="nomor_jaldis" class="form-control"  value="<?php echo $lala['id_unit']; ?>"  readonly="readonly">      
  </div>
</div>
</div>

  <div class="form-group">
  <label>Nama PPK</label>
  <input type="text" name="nomor_jaldis" class="form-control" value="<?php echo $lala['ppk']; ?>"  readonly="readonly">      
  </div>
    <div class="form-group">
  <label>Tanggal</label>
  <input type="date" name="tgl_jaldis" class="form-control"  >      
  </div>
      <div class="form-group">
  <label>Asal</label>
  <input type="text" name="asal" class="form-control"  >      
  </div>
      <div class="form-group">
  <label>Tujuan</label>
  <select  class="form-control select2 chosen-select" style="width: 100%;" name="tujuan" required="required">
                  
                 <option value=""  disable>--- Pilih data---</option>
      <?php

        $q = mysqli_query($koneksi, "SELECT * FROM kota_tujuan WHERE jenis ='Dalam Negeri' ");
        while($data = mysqli_fetch_array($q)){
          echo '<option style="color: blue" value="'.$data['id_tujuan'].'">'.$data['kota_tujuan'].'</option>';
        }

      ?>
      </select>       
  </div>

     <div class="form-group">
  <label>Tanggal Berangkat</label>
  <input type="date" name="berangkat" class="form-control"  >      
  </div>


     <div class="form-group">
  <label>Tanggal Kembali</label>
  <input type="date" name="Kembali" class="form-control"  >      
  </div>
   <div class="form-group">
  <label>No Sprint</label>
  <input type="text" name="referensi" class="form-control"  >      
  </div>


     <div class="form-group">
  <label>Tanggal Sprint</label>
  <input type="date" name="tgl_ref" class="form-control"  >      
  </div>
   <div class="form-group">
  <label>Satuan Kerja</label>
<select  class="form-control select2 chosen-select" style="width: 100%;"  name="satker" required="required">
                  
                 <option value=""  disable>--- Pilih data---</option>
      <?php

        $q = mysqli_query($koneksi, "SELECT * FROM unit");
        while($data = mysqli_fetch_array($q)){
          echo '<option style="color: blue" value="'.$data['id_unit'].'">'.$data['unit_kerja'].'</option>';
        }

      ?>
      </select>     
  </div>

  <div class="form-group">
  <label>Tahun Anggaran</label>
  <input type="text" name="ta" class="form-control"  >      
  </div>

  <div class="form-group">
  <label>Mata Anggaran</label>
  <input type="text" name="mata" class="form-control"  >      
  </div>


  <div class="form-group">
  <label>Jenis Pengeluaran</label>
  <input type="text" name="jns_keluar" class="form-control"  >      
  </div>


<button type="submit" class="btn btn-success" style="float: right;">Save</button>  

</div>
</div>

<!-- kanan akhir -->
  
              </div>
            </div>
          </div>
		

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require '../footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
<?php require 'logout-modal.php';?>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>

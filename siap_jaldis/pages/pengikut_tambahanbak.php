<?php
require '../cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="../js/jquery.min.js" type="text/javascript"></script>
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
              <h6 class="m-0 font-weight-bold text-primary">Tambahan Pengikut</h6>
            </div>
            <div class="card-body">
              <div class="">
  
  <div class="row">
   <!--  kiri -->
  <div class="col-md-6">
<form role="form" action="../aksi/proses_tambahan_pengikut.php" method="get">

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
   
 
</div>



<!-- kiri akhir -->
<!-- kanan -->
 <div class="col-md-6">
  <div class="row">
  <div class="col-md-6">
  <div class="form-group">

  <label>Tanggal Berangkat</label>
  <input type="date" name="tgl_berangkat" class="form-control">      
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
  <label>Tanggal Kembali</label>
  <input type="date" name="tgl_kembali" class="form-control" >      
  </div>
</div>
</div>




</div>
</div>

  <div id="insert-form"></div>

<!-- kanan akhir -->
  
              </div>
            </div>
          </div>
		  <button type="button" id="btn-tambah-form">Tambah Data Form</button>
    <button type="button" id="btn-reset-form">Reset Form</button><br><br>


<button type="submit" class="btn btn-success" style="float: right;">Save</button>  

        </div>
        <!-- /.container-fluid -->
</form>
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



<input type="hidden" id="jumlah-form" value="1">
<script>
  $(document).ready(function(){ // Ketika halaman sudah diload dan siap
    $("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      
      // Kita akan menambahkan form dengan menggunakan append
      // pada sebuah tag div yg kita beri id insert-form
      $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
        "<table>" +
        "<tr>" +
        "<td>NIS</td>" +
        "<td><input type='text' name='nis[]' required></td>" +
        "</tr>" +
        "<tr>" +
        "<td>Nama</td>" +
        "<td><input type='text' name='nama[]' required></td>" +
        "</tr>" +
        "<tr>" +
        "<td>Telepon</td>" +
        "<td><input type='text' name='telp[]' required></td>" +
        "</tr>" +
        "<tr>" +
        "<td>Alamat</td>" +
        "<td><textarea name='alamat[]' required></textarea></td>" +
        "</tr>" +
        "</table>" +
        "<br><br>");
      
      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });
    
    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });
  </script>
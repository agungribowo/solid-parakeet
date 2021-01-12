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


<!-- <?php
$id = $_GET['Kode'];
$query_edit = mysqli_query($koneksi,"SELECT pengikut.* 
  FROM pengikut 
  WHERE id_jaldis='$id'");
$row = mysqli_fetch_array($query_edit);
?>
 -->


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Biaya Perjalanan Dinas</h6>
            </div>
            <div class="card-body">
              <div class="">
  
   <div class="table-responsive">

     <h6 class="m-0 font-weight-bold text-primary">Pegawai</h6><br>
<table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
     <tr>
                      <th class="th-sm">Nama</th>
                        <th width="100px" class="th-sm">Harian</th>
                      <th class="th-sm">Uang Harian</th>
                       <th class="th-sm">Uang Saku</th>
                       <th class="th-sm">Hotel</th>
                       <th class="th-sm">Transport</th>
                       <th class="th-sm">Rept.</th>
                        <th class="th-sm">Aksi</th>
                    </tr>
  </thead>
  <tbody>
      <?php 
      $id = $_GET['Kode'];
$query = mysqli_query($koneksi,"SELECT jaldis.*
  FROM jaldis 
  WHERE nomor_jaldis='$id'
  ");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
    $Kode = $data['id_jaldis'];

  $tgl1 = $data['berangkat'];

  $tgl2 = $data['kembali'];




$selisih = strtotime($tgl2) -  strtotime($tgl1);
$hari = $selisih/(60*60*24);

?>
    
    <tr>
                      <td> <input type="text" name="pegawai" class="form-control" value="<?php echo $data['pegawai']?>" readonly="readonly" >      </td>
                    <td> <input type="text" name="hari" class="form-control" value="<?php echo $hari ?> hari"  readonly="readonly"> </td>
                     <td> <input type="text" name="pejabat" class="form-control"  >      </td>
                       <td> <input type="text" name="pejabat" class="form-control" >      </td>
                       <td> <input type="text" name="pejabat" class="form-control" >      </td>
                     <td> <input type="text" name="pejabat" class="form-control" >      </td>
                       <td> <input type="text" name="pejabat" class="form-control" >      </td>
                         <td><button type="submit" class="btn btn-success" style="float: right;">Edit</button>  </td>
     
   
</tr>
 
<?php               
} 
?>
    
</form>


              </tbody>
                </table>





<!-- table -->
     <h6 class="m-0 font-weight-bold text-primary">Pengikut</h6><br>
<table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
     <tr>
                      <th class="th-sm">Nama</th>
                        <th width="100px" class="th-sm">Harian</th>
                      <th class="th-sm">Uang Harian</th>
                       <th class="th-sm">Uang Saku</th>
                       <th class="th-sm">Hotel</th>
                       <th class="th-sm">Transport</th>
                       <th class="th-sm">Rept.</th>
                        <th class="th-sm">Aksi</th>
                    </tr>
  </thead>
  <tbody>
      <?php 
      $id = $_GET['Kode'];
$query = mysqli_query($koneksi,"SELECT pengikut.* , pegawai_bnpt.*
  FROM pengikut
  INNER JOIN pegawai_bnpt on pengikut.pegawai = pegawai_bnpt.id_peg 
  WHERE id_jaldis='$id'
  ");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
    $Kode = $data['id_jaldis'];

  $tgl1 = $data['berangkat_ikut'];

  $tgl2 = $data['kembali_ikut'];




$selisih = strtotime($tgl2) -  strtotime($tgl1);
$hari = $selisih/(60*60*24);

?>
    
    <tr>
                      <td> <input type="text" name="pejabat" class="form-control" value="<?php echo $data['nama_pegawai']?>" readonly="readonly" >      </td>
                    <td> <input type="text" name="pejabat" class="form-control" value="<?php echo $hari ?> hari"  readonly="readonly"> </td>
                     <td> <input type="text" name="pejabat" class="form-control"  >      </td>
                       <td> <input type="text" name="pejabat" class="form-control" >      </td>
                       <td> <input type="text" name="pejabat" class="form-control" >      </td>
                     <td> <input type="text" name="pejabat" class="form-control" >      </td>
                       <td> <input type="text" name="pejabat" class="form-control" >      </td>
                       <td><button type="submit" class="btn btn-success" style="float: right;">Edit</button>  </td>
     
   
</tr>
 
<?php               
} 
?>
    
</form>


              </tbody>
                </table>




</div>

<!-- kanan akhir -->
  
              </div>
            </div>
          </div>
		
<button type="submit" class="btn btn-success" style="float: right;">Save</button>  

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

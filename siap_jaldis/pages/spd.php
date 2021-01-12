<?php
require '../cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
         <link rel="stylesheet" href="../plugins/choosen/chosen.css">
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

<a href="buat_spd" type="button" class="btn btn-success" style="margin:5px"><i class="fa fa-plus">Tambah</i></a><br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar Jaldis</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
     <tr>
                      <th class="th-sm">Nomor Jaldis</th>
                      <th class="th-sm">Tgl Jaldis</th>
                      <th class="th-sm">Pegawai</th>
                      <th class="th-sm">Tujuan</th>
                      <th class="th-sm">Pengikut</th>
                       <th class="th-sm">User</th>
                     <th class="th-sm">Aksi</th>
                    </tr>
  </thead>
  <tbody>
     <?php 
$query = mysqli_query($koneksi,"SELECT jaldis.*
  FROM jaldis
  ");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
    $Kode = $data['nomor_jaldis'];
?>
    <tr>
                      <td><?=$data['nomor_jaldis']?></td>
                      <td><?=$data['tgl_jaldis']?></td>
                      <td><?=$data['pegawai']?></td>
                       <td><?=$data['tujuan']?></td>
                      <td></td>
                       <td>Ristian</td>
            <td>
                    <!-- Button untuk modal -->
        <a href="pengikut_tambahan?&Kode=<?php echo $Kode; ?>" type="button" class="btn btn-warning" style="margin:5px" ><i class="fa fa-user"> Pengikut</i></a>
          <a href="biaya?&Kode=<?php echo $Kode; ?>"  target="_self"type="button" class="btn btn-success" style="margin:5px" ><i class="fas fa-money-bill-wave"> Biaya</i></a> <br>
  <a href="#" type="button" class=" fa fa-folder btn btn-success"></a>
<a href="#" type="button" class=" fa fa-edit btn btn-primary"></a>
<a href="#" type="button" class="fas fa-trash-alt  btn btn-danger"></a>
</td>
</tr>
    
</form>
</div>
</div>

</div>
</div>




<?php               
} 
?>
                  </tbody>
                </table>
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

    <script src="../plugins/choosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="../plugins/choosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="../plugins/choosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

  <script src="../js/table.js"></script>
</body>

</html>



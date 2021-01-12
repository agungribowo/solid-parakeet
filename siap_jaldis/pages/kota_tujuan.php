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

<button type="button" class="btn btn-success" style="margin:5px" data-toggle="modal" data-target="#myModalTambah"><i class="fa fa-plus">Tambah</i></button><br>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kota Tujuan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
               <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
    <tr>
                      <th class="th-sm" >Tujuan</th>
                      <th class="th-sm" >Jenis</th>
                       <th class="th-sm" >Uang Saku</th>
                      <th class="th-sm" >Halfday</th>
                      <th class="th-sm" >Fullday</th>
                      <th class="th-sm" >Fullboard</th>
                      <th class="th-sm" >Hotel</th>
                      <th class="th-sm" >Taxi</th>
                      <th class="th-sm" >Pesawat/KA/Bus</th>
                      <th class="th-sm" >Lain-lain</th>
                     
                      <th class="th-sm" >Aksi</th>
                    </tr>
  </thead>
  <tbody>
 <?php 
$query = mysqli_query($koneksi,"SELECT * 
  FROM kota_tujuan
  ");
$no = 1;
while ($data = mysqli_fetch_assoc($query)) 
{
?>
  <tr>
                      <td><?=$data['kota_tujuan']?></td>
                      <td><?=$data['jenis']?></td>
                       <td><?=$data['u_saku']?></td>
                      <td><?=$data['halfday']?></td>
                       <td><?=$data['fullday']?></td>
                       <td><?=$data['fullboard']?></td>
                       <td><?=$data['hotel']?></td>
                        <td><?=$data['taxi']?></td>
                         <td><?=$data['pesawat']?></td>
                       <td><?=$data['lainnya']?></td>
            <td>
                    <!-- Button untuk modal -->
<a href="#" type="button" class=" fa fa-edit btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $data['id_unit']; ?>"></a>
</td>
</tr>
    
  
<!-- Modal Edit Mahasiswa-->
<div class="modal fade" id="myModal<?php echo $data['id_peg']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Ubah Data Unit</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
<form role="form" action="../aksi/proses_edit_unit.php" method="get">

<?php
$id = $data['id_peg']; 
$query_edit = mysqli_query($koneksi,"SELECT * FROM unit WHERE id_unit='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>


<input type="hidden" name="id_unit" value="<?php echo $row['id_unit']; ?>">

<div class="form-group">
<label>Unit Kerja</label>
<input type="text" name="unit_kerja" class="form-control" value="<?php echo $row['unit_kerja']; ?>">      
</div>

<div class="form-group">
<label>KPA</label>
 <select  class="form-control " style="width: 100%;"   name="kpa" required="required">
                  
                 <option value="<?php echo $row['kpa']; ?>"  disable><?php echo $row['kpa']; ?></option>
      <?php

        $q = mysqli_query($koneksi, "SELECT * FROM pegawai_bnpt");
        while($data1 = mysqli_fetch_array($q)){
          echo '<option value="'.$data1['nama_pegawai'].'">'.$data1['nama_pegawai'].' ('.$data1['nip'].'/'.$data1['jabatan'].')</option>';
        }

      ?>
      </select>
</div>

<div class="form-group">
<label>PPK</label>
 <select  class="form-control " style="width: 100%;"   name="ppk" required="required">
                  
                 <option value="<?php echo $row['ppk']; ?>"  disable><?php echo $row['ppk']; ?></option>
      <?php

        $q = mysqli_query($koneksi, "SELECT * FROM pegawai_bnpt");
        while($data1 = mysqli_fetch_array($q)){
          echo '<option value="'.$data1['nama_pegawai'].'">'.$data1['nama_pegawai'].' ('.$data1['nip'].'/'.$data1['jabatan'].')</option>';
        }

      ?>
      </select>
</div>

<div class="form-group">
<label>Bendahara</label>
 <select  class="form-control " style="width: 100%;"   name="bendahara" required="required">
                  
                 <option value="<?php echo $row['bendahara']; ?>"  disable><?php echo $row['bendahara']; ?></option>
      <?php

        $q = mysqli_query($koneksi, "SELECT * FROM pegawai_bnpt");
        while($data1 = mysqli_fetch_array($q)){
          echo '<option value="'.$data1['nama_pegawai'].'">'.$data1['nama_pegawai'].' ('.$data1['nip'].'/'.$data1['jabatan'].')</option>';
        }

      ?>
      </select>     
</div>


<div class="modal-footer">  
<button type="submit" class="btn btn-success">Ubah</button>
<a href="../aksi/hapus_unit.php?id_unit=<?=$row['id_unit'];?>" Onclick="confirm('Anda Yakin Ingin Menghapus?')" class="btn btn-danger">Hapus</a>
<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
</div>
<?php 
}
//mysql_close($host);
?>  
       
</form>
</div>
</div>

</div>
</div>



 <!-- Modal -->
  <div id="myModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- konten modal-->
      <div class="modal-content">
        <!-- heading modal -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- body modal -->
    <form action="../aksi/unit.php" method="get">
        <div class="modal-body">
    Tujuan : 
         <input type="text" class="form-control" name="tujuan">


<!-- $query_edit = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE id_karyawan='$id'");
//$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($query_edit)) {  
?>
 -->
    Jenis Tujuan : 
         <select  class="form-control " style="width: 100%;"   name="jns_tujuan" required="required">
                  
            <option value=""  disable>--- Pilih data---</option>
             <option value="Dalam Kota"  >Dalam Kota</option>
            <option value="Dalam Negeri"  >Dalam Negeri</option>
             <option value="Luar Negeri"  >Luar Negeri</option>
      </select>
     Uang Harian : 
         <input type="text" class="form-control" name="u_harian">
    Halfday : 
         <input type="text" class="form-control" name="halfday">
    Fullday : 
          <input type="text" class="form-control" name="fullday">
    Fullboard : 
          <input type="text" class="form-control" name="fullboard">
    Hotel : 
          <input type="text" class="form-control" name="hotel">
    Taxi : 
          <input type="text" class="form-control" name="taxi">
    Pesawat/KA/Bus : 
          <input type="text" class="form-control" name="pesawat">
    Lain-lainya : 
          <input type="text" class="form-control" name="lainnya">






        </div>
        <!-- footer modal -->
        <div class="modal-footer">
    <button type="submit" class="btn btn-success" >Tambah</button>
    </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
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

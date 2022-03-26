<?php 
require_once "function/database.php";

$koneksi = new database();

?>

  <div class="row">
    <div class="col-lg-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Data Anggota
          <a class="btn btn-primary pull-right" href="?page=tambah">
            <i class="glyphicon glyphicon-plus"></i> Tambah
          </a>
        </h4>
      </div>

  <?php  
  if (empty($_GET['alert'])) {
    echo "";
  } elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
  } elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil disimpan.
          </div>";
  } elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil diubah.
          </div>";
  } elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil dihapus.
          </div>";
  }
  ?>

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Data Anggota</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
              </tr>
            </thead>   

            <tbody>
            <?php
            $no = 1;
            foreach ($koneksi->tampil_data() as $row) {              

              echo "  <tr>
                    <td width='50' class='center'>$no</td>
                    <td width='60'>$row[id]</td>
                    <td width='150'>$row[nama]</td>
                    <td width='180'>$row[tempat_lahir],$row[tanggal_lahir]</td>
                    <td width='120'>$row[jenis_kelamin]</td>
                    <td width='120'>$row[agama]</td>
                    <td width='250'>$row[alamat]</td>
                    <td width='80'>$row[no_telepon]</td>

                    <td width='100'>
                      <div class=''>
                        <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-primary btn-sm' href='?page=ubah&id=$row[id]'>
                          <i class='glyphicon glyphicon-edit'></i>
                        </a>";
            ?>
                        <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="proses-anggota.php?action=delete&id=<?php echo $row['id'];?>" onclick="return confirm('Anda yakin ingin menghapus siswa <?php echo $row['nama']; ?>?');">
                          <i class="glyphicon glyphicon-trash"></i>
                        </a>
            <?php
              echo "
                      </div>
                    </td>
                  </tr>";
              $no++;
            }
            ?>
            </tbody>           
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
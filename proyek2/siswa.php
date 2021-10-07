<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <title> Jaya Mahendra</title>
    <link rel="icon" href="https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png">
</head>
    <!-- navbar -->
    <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  
  <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Tugas</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
        <a class="nav-link" href="siswa.php">Pendaftar</a>
        <a class="nav-link text-white" href="pages/siswa-input.php">Daftar</a>
      </nav>
    </div>
  </header>

    <!-- end navbar -->

    <!-- Aksi Insert Data dalam DB -->
    <?php
    include 'koneksi.php';
    if (isset($_REQUEST['simpan'])) {
        // $idsiswa = $_REQUEST['idsiswa'];
        $nama_siswa = $_REQUEST['nama_siswa'];
        $alamat = $_REQUEST['alamat'];
        $jenis_kelamin = $_REQUEST['jenis_kelamin'];
        $agama = $_REQUEST['agama'];
        $sekolah_asal = $_REQUEST['sekolah_asal'];

        $result = mysqli_query($db, "INSERT INTO siswa (nama_siswa, alamat, jenis_kelamin, agama, sekolah_asal) 
                      values ('$nama_siswa','$alamat','$jenis_kelamin','$agama','$sekolah_asal')");
        if ($result) {
            echo "<script>
        alert('Tambah Data Berhasil !');
        document.location='siswa.php';
        </script>";
        } else {
            echo "<script>
        alert('Tambah Data Gagal !');
        document.location='siswa.php';
        </script>";
        }
    }

    //   // Script update data
    if (isset($_REQUEST['update'])) {
        $idsiswa = $_REQUEST['idsiswa'];
        $nama_siswa = $_REQUEST['nama_siswa'];
        $alamat = $_REQUEST['alamat'];
        $jenis_kelamin = $_REQUEST['jenis_kelamin'];
        $agama = $_REQUEST['agama'];
        $sekolah_asal = $_REQUEST['sekolah_asal'];

        $result = mysqli_query($db, "UPDATE siswa SET 
                      idsiswa='$idsiswa', 
                      nama_siswa='$nama_siswa', 
                      alamat='$alamat', 
                      jenis_kelamin='$jenis_kelamin', 
                      agama='$agama',
                      sekolah_asal='$sekolah_asal' 
                      WHERE idsiswa='$idsiswa'");
        if ($result) {
            echo "<script>
        alert('Edit Data Berhasil !');
        document.location='siswa.php';
        </script>";
        } else {
            echo "<script>
        alert('Edit Data Gagal !');
        document.location='siswa.php';
        </script>";
        }
    }
    // // Akhir update data

    if (isset($_REQUEST['hapus'])) {
        $idsiswa = $_REQUEST['idsiswa'];

        $result = mysqli_query($db, "DELETE FROM siswa WHERE idsiswa='$idsiswa'");

        if ($result) {
            echo "<script>
        alert('Hapus Data Berhasil !');
        document.location='siswa.php';
        </script>";
        } else {
            echo "<script>
        alert('Hapus Data Gagal !');
        document.location='siswa.php';
        </script>";
        }
    }
    ?>

    <!-- Menampilkan data  -->
    <div class="container">
        <br><br><br>
        <h2>Pendaftar</h2>
        <br>
        <table class="table table-striped table-dark">
            <tr>
                <th>Id Siswa</th>
                <th>Nama Siswa</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Asal Sekolah</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'koneksi.php';
            $no = 1;
            $query = mysqli_query($db, "SELECT * FROM siswa ORDER BY idsiswa ASC");
            while ($data = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <!-- <?php $jenis_kelamin = "L";
                            if ($jenis_kelamin = 'L') {
                                echo "Laki-Laki";
                            } ?> -->
                    <td><?php echo $data['idsiswa']; ?></td>
                    <td><?php echo $data['nama_siswa']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php if ($data['jenis_kelamin'] == "L") {
                            echo "Laki-Laki";
                        } else {
                            echo "Perempuan";
                        } ?></td>
                    <td><?php echo $data['agama']; ?></td>
                    <td><?php echo $data['sekolah_asal']; ?></td>
                    <td>

                        <!-- Edit Data -->
                        <a href="index.php?hal=edit&id=<?= $data['idsiswa'] ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?php echo $data['idsiswa']; ?>">Edit</a>

                        <div class="modal fade bs-example-modal-lg" id="edit<?php echo $data['idsiswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog  modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Edit Data Peserta</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal" action="" method="POST">
                                            <input type="hidden" name="idsiswa" value="<?php echo $data['idsiswa']; ?>">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Nama Siswa</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputEmail3" name="nama_siswa" value="<?php echo $data['nama_siswa']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Alamat</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputPassword3" class="col-sm-2 control-label">Jenis Kelamin</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="jenis_kelamin">
                                                        <disabled>
                                                            <option>Pilih Jenis Kelamin</option>
                                                        </disabled>
                                                        <option value="L" <?php if ($data['jenis_kelamin'] == "L") {
                                                                                echo "selected";
                                                                            } ?>>Laki-Laki</option>
                                                        <option value="P" <?php if ($data['jenis_kelamin'] == "P") {
                                                                                echo "selected";
                                                                            } ?>>Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Agama</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" name="agama">
                                                        <option>
                                                            <disabled>Pilih Agama
                                                            </disabled>
                                                        </option>
                                                        </disabled>
                                                        <option value="Islam" <?php if ($data['agama'] == "Islam") {
                                                                                    echo "selected";
                                                                                } ?>>Islam</option>
                                                        <option value="Kristen" <?php if ($data['agama'] == "Kristen") {
                                                                                    echo "selected";
                                                                                } ?>>Kristen</option>
                                                        <option value="Khatolik" <?php if ($data['agama'] == "Khatolik") {
                                                                                        echo "selected";
                                                                                    } ?>>Khatolik</option>
                                                        <option value="Hindu" <?php if ($data['agama'] == "Hindu") {
                                                                                    echo "selected";
                                                                                } ?>>Hindu</option>
                                                        <option value="Budha" <?php if ($data['agama'] == "Budha") {
                                                                                    echo "selected";
                                                                                } ?>>Budha</option>
                                                        <option value="Konghucu" <?php if ($data['agama'] == "Konghucu") {
                                                                                        echo "selected";
                                                                                    } ?>>Konghucu</option>
                                                        <option value="Lainnya" <?php if ($data['agama'] == "Lainnya") {
                                                                                    echo "selected";
                                                                                } ?>>Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Asal Sekolah</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" name="sekolah_asal" value="<?php echo $data['sekolah_asal']; ?>">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                        <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir edit data -->
                        <!-- Hapus data -->
                        <a href="#" class="btn btn-danger btn-sm" data-target=".bs-example-modal-lg<?php echo $data['idsiswa']; ?>" data-toggle="modal">Hapus</a>
                        <div class="modal fade bs-example-modal-lg<?php echo $data['idsiswa']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Konfirmasi Hapus Data</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <h7>Anda yakin ingin menghapus data?</h7>
                                        <form action="" method="POST">
                                            <input type="hidden" name="idsiswa" value="<?php echo $data['idsiswa']; ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger" name="hapus">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    <!-- Akhir hapus data -->
    </td>
    </tr>
<?php } ?>
</table>

</div>
<!-- Menampilkan Data -->
<p class="lead">
              <a href="pages/siswa-input.php" class="btn btn-lg btn-secondary">Tambah Data</a>
            </p>
<br><br><br>
  <footer class="mt-auto text-white-50">
    <p>Tugas by Jaya Mahendra</p>
  </footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
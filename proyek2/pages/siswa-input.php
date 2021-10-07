<!DOCTYPE html>
<html>

<head>
	<title> Input Siswa</title>
	<link rel="icon" href="https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</head>

<body class="d-flex h-100 text-white bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<br><br>
				<h3>Input Data Siswa</h3>
				<br><br>
				<form action="proses/siswa-input-proses.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="idsiswa">ID Siswa</label>
						<input type="number" name="idsiswa" class="form-control" disabled="" placeholder="Diisi Otomatis menggunakan Auto Increment">
					</div>
					<div class="form-group">
						<label for="nama_siswa">Nama</label>
						<input type="text" name="nama_siswa" class="form-control">
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea class="form-control" name="alamat" rows="3"></textarea>
					</div>
					<div class="form-group">
						<label for="jenis_kelamin">Jenis Kelamin</label>
						<select name="jenis_kelamin" class="form-control">
							<option selected disabled>Pilih Jenis Kelamin</option>
							<option value="L">Laki-Laki</option>
							<option value="P">Perempuan</option>
						</select>
					</div>
					<div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Agama</label>
                                <div class="col-sm-12">
                                    <select class="form-control" name="agama">
                                        <option selected disabled>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
					<div class="form-group">
						<label for="sekolah_asal">Sekolah Asal</label>
						<input type="text" name="sekolah_asal" class="form-control">
					</div>
					<br>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>


</body>

</html>
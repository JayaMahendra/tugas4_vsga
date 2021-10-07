<?php
include'../../koneksi.php';
$idsiswa=$_POST['idsiswa'];
$nama_siswa=$_POST['nama_siswa'];
$alamat=$_POST['alamat'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$agama=$_POST['agama'];
$sekolah_asal=$_POST['sekolah_asal'];
	
	$sql = 
	"INSERT INTO siswa
		VALUES('$idsiswa','$nama_siswa','$alamat','$jenis_kelamin','$agama','$sekolah_asal')";
	$query = mysqli_query($db, $sql);

	header("location:../../siswa.php");
?>
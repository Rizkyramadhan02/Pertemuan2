<?php 

require_once "function/database.php";
$koneksi = new database();

$action = $_GET['action'];
if($action == "add")
{
	$koneksi->tambah_data($_POST['id'],$_POST['nama'],$_POST['tempat_lahir'],$_POST['tanggal_lahir'],$_POST['jenis_kelamin'],$_POST['agama'],$_POST['alamat'],$_POST['no_telepon']);
	if($koneksi){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 2 */
            header("Location: index.php?alert=2");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }
	//header('location:index.php');
}
elseif($action=="update")
{
	$koneksi->update($_POST['nama'],$_POST['tempat_lahir'],$_POST['tanggal_lahir'],$_POST['jenis_kelamin'],$_POST['agama'],$_POST['alamat'],$_POST['no_telepon'],$_POST['id']);
	//header('location:index.php');
	if($koneksi){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 3 */
            header("Location: index.php?alert=3");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }
}
elseif($action=="delete")
{
	$id = $_GET['id'];
	$koneksi->delete_data($id);
	if($id){
            /* jika data berhasil disimpan alihkan ke halaman siswa dan tampilkan pesan = 4 */
            header("Location: index.php?alert=4");
        }
        else{
            /* jika data gagal disimpan alihkan ke halaman siswa dan tampilkan pesan = 1 */
            header("Location: index.php?alert=1");
        }
	//header('location:index.php');
}
?>
<?php 
class database{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "koperasi";
    var $koneksi = "";
    
    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
        
    }

    function tampil_data()
    {
        $query = mysqli_query($this->koneksi,"select * from data_anggota");
        while($row = mysqli_fetch_array($query)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tambah_data($id, $nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $alamat, $no_telepon)
    {
        $query = mysqli_query($this->koneksi,"insert into data_anggota values ('$id','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$agama','$alamat','$no_telepon')");
    }

    function get_by_id($id)
    {
        $query = mysqli_query($this->koneksi,"select * from data_anggota where id='$id'");
        return $query->fetch_array();
    }

    function update($nama, $tempat_lahir, $tanggal_lahir, $jenis_kelamin, $agama, $alamat, $no_telepon, $id) {
        $query = mysqli_query($this->koneksi,"UPDATE data_anggota SET 

                                                  nama            = '$nama',
                                                  tempat_lahir    = '$tempat_lahir',
                                                  tanggal_lahir   = '$tanggal_lahir',
                                                  jenis_kelamin   = '$jenis_kelamin',
                                                  agama           = '$agama',
                                                  alamat          = '$alamat',
                                                  no_telepon      = '$no_telepon'
                                            WHERE id             = '$id'"); 
    }

    function delete_data($id) {
        $query = mysqli_query($this->koneksi, "DELETE FROM data_anggota WHERE id = '$id'");
    }
}
?>
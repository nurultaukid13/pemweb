<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $id_driver = $data['id_driver'];
        $nama = $data['nama'];
        $no_sim = $data['no_sim'];
        $alamat = $data['alamat'];

        $query = "INSERT INTO driver VALUES('$id_driver', '$nama', '$no_sim', '$alamat')";
        $sql = mysqli_query(koneksi_db(), $query);
        
        return true;
    }

    function ubah_data ($data){
        $id_driver = $data['id_driver'];
        $nama = $data['nama'];
        $no_sim = $data['no_sim'];
        $alamat = $data['alamat'];

        $query = "UPDATE driver SET id_driver = '$id_driver', nama = '$nama', no_sim = '$no_sim', alamat = '$alamat' WHERE id_driver = '$id_driver'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $id_driver = $data['hapus'];
        $querytampil = "SELECT*FROM driver WHERE id_driver = '$id_driver'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM driver WHERE id_driver = '$id_driver';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>
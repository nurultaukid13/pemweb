<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $id_bus = $data['id_bus'];
        $plat = $data['plat'];
        $status = $data['status'];

        $query = "INSERT INTO bus VALUES('$id_bus', '$plat', '$status')";
        $sql = mysqli_query(koneksi_db(), $query);
        
        return true;
    }

    function ubah_data ($data){
        $id_bus = $data['id_bus'];
        $plat = $data['plat'];
        $status = $data['status'];

        $query = "UPDATE bus SET id_bus = '$id_bus', plat = '$plat', status = '$status' WHERE id_bus = '$id_bus'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $id_bus = $data['hapus'];
        $querytampil = "SELECT*FROM bus WHERE id_bus = '$id_bus'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM bus WHERE id_bus = '$id_bus';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>
<?php
    include '../main/koneksi.php';
    function tambah_data($data, $files){
        $productline= $data['productline'];
        $textdescription = $data['textdescription'];
        $htmldescription = $data['htmldescription'];

        $split = explode('.', $files['image']['name']);
        $format = $split[count($split) - 1];
        $image = $productline.'.'.$format;

        $query = "INSERT INTO productlines VALUES('$productline', '$textdescription', '$htmldescription', '$image')";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function ubah_data($data, $files){
        $productline = $data['productline'];
        $textdescription = $data['textdescription'];
        $htmldescription = $data['htmldescription'];

        $querytampil = "SELECT*FROM productlines WHERE productLine = '$productline';";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        if($files['image']['name']==""){
            $image = $result['image'];
        }else{
            $split = explode('.', $files['image']['name']);
            $format = $split[count($split) - 1];
            $image = $result['productline'].'.'.$format;
        }

        $query = "UPDATE productlines SET textDescription ='$textdescription', htmlDescription = '$htmldescription', image = '$image' WHERE productLine = '$productline';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $productline = $data['hapus'];
        $querytampil = "SELECT*FROM productlines WHERE productLine = '$productline'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        unlink("../img/". $result['image']);

        $query = "DELETE FROM productlines WHERE productLine = '$productline';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>
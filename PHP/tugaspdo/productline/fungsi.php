<?php
    include '../main/koneksi.php';
    function tambah_data($data, $files){
        $productline= $data['productline'];
        $textdescription = $data['textdescription'];
        $htmldescription = $data['htmldescription'];

        $split = explode('.', $files['image']['name']);
        $format = $split[count($split) - 1];
        $image = $productline.'.'.$format;

        $query = "INSERT INTO productlines VALUES (:productline, :textdescription, :htmldescription, :image)";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':productline', $productline);
        $stmt->bindParam(':textdescription', $textdescription);
        $stmt->bindParam(':htmldescription', $htmldescription);
        $stmt->bindParam(':image', $image);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function ubah_data($data, $files){
        $productline = $data['productline'];
        $textdescription = $data['textdescription'];
        $htmldescription = $data['htmldescription'];

        $querytampil = "SELECT*FROM productlines WHERE productLine = :productline;";
        $stmt=koneksi_db()->prepare($querytampil);
        $stmt->bindParam(':productline', $productline);
        $stmt->execute();
        $result = $stmt->fetch();

        if($files['image']['name']==""){
            $image = $result['image'];
        }else{
            $split = explode('.', $files['image']['name']);
            $format = $split[count($split) - 1];
            $image = $result['productline'].'.'.$format;
        }

        $query = "UPDATE productlines SET textDescription = :textdescription, htmlDescription= :htmldescription, image = :image WHERE productLine=:productline";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':productline', $productline);
        $stmt->bindParam(':textdescription', $textdescription);
        $stmt->bindParam(':htmldescription', $htmldescription);
        $stmt->bindParam(':image', $image);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function hapus_data($data){
        $productline = $data['hapus'];
        $querytampil = "SELECT*FROM productlines WHERE productLine = :productline; ";
        $stmt=koneksi_db()->prepare($querytampil);
        $stmt->bindParam(':productline', $productline);
        $stmt->execute();
        $result = $stmt->fetch();

        unlink("../img/". $result['image']);

        $query = "DELETE FROM productlines WHERE productLine = :productline;";
        $stmt=koneksi_db()->prepare($query);
        $stmt->bindParam(':productline', $productline);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
?>
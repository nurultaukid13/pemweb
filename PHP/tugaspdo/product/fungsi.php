<?php
    include '../main/koneksi.php';
    function tambah_data($data){
        $productcode= $data['productcode'];
        $productname= $data['productname'];
        $productline= $data['productline'];
        $productscale= $data['productscale'];
        $productvendor= $data['productvendor'];
        $productdescription= $data['productdescription'];
        $quantityinstock= $data['quantityinstock'];
        $buyprice= $data['buyprice'];
        $msrp= $data['msrp'];
        
        $query = "INSERT INTO products VALUES (:productcode, :productname, :productline, :productscale, :productvendor, :productdescription, :quantityinstock, :buyprice, :msrp)";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':productcode', $productcode);
        $stmt->bindParam(':productname', $productname);
        $stmt->bindParam(':productline', $productline);
        $stmt->bindParam(':productscale', $productscale);
        $stmt->bindParam(':productvendor', $productvendor);
        $stmt->bindParam(':productdescription', $productdescription);
        $stmt->bindParam(':quantityinstock', $quantityinstock);
        $stmt->bindParam(':buyprice', $buyprice);
        $stmt->bindParam(':msrp', $msrp);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function ubah_data ($data){
        $productcode= $data['productcode'];
        $productname= $data['productname'];
        $productline= $data['productline'];
        $productscale= $data['productscale'];
        $productvendor= $data['productvendor'];
        $productdescription= $data['productdescription'];
        $quantityinstock= $data['quantityinstock'];
        $buyprice= $data['buyprice'];
        $msrp= $data['msrp'];

        $query = "UPDATE products SET productName = :productname, productLine = :productline, productScale = :productscale,productVendor = :productvendor ,productDescription = :productdescription, quantityInStock=:quantityinstock, buyPrice= :buyprice, MSRP = :msrp WHERE productCode = :productcode";
        $stmt = koneksi_db()->prepare($query);

        $stmt->bindParam(':productcode',$productcode);
        $stmt->bindParam(':productname',$productname);
        $stmt->bindParam(':productline',$productline);
        $stmt->bindParam(':productscale',$productscale);
        $stmt->bindParam(':productvendor',$productvendor);
        $stmt->bindParam(':productdescription',$productdescription);
        $stmt->bindParam(':quantityinstock',$quantityinstock);
        $stmt->bindParam(':buyprice',$buyprice);
        $stmt->bindParam(':msrp',$msrp);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    function hapus_data($data){
        $productcode = $data['hapus'];
        $querytampil = "SELECT*FROM products WHERE productCode = :productcode; ";
        $stmt=koneksi_db()->prepare($querytampil);
        $stmt->bindParam(':productcode',$productcode);
        $stmt->execute();
        $result = $stmt->fetch();

        $query = "DELETE FROM products WHERE productCode = :productcode";
        $stmt = koneksi_db()->prepare($query);
        $stmt->bindParam(':productcode', $productcode);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
?>
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
        

        $query = "INSERT INTO products VALUES('$productcode','$productname', '$productline', '$productscale', '$productvendor', '$productdescription', '$quantityinstock', '$buyprice', '$msrp')";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
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

        $query = "UPDATE products SET productName = '$productname', productLine = '$productline', productScale = '$productscale', productVendor= '$productvendor', productDescription = '$productdescription',  quantityInStock = '$quantityinstock', buyPrice = '$buyprice',  MSRP = '$msrp' WHERE productCode = '$productcode'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $productcode = $data['hapus'];
        $querytampil = "SELECT*FROM products WHERE productCode = '$productcode'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM products WHERE productCode = '$productcode';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>
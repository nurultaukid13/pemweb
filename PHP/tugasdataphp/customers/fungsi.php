<?php
    include '../main/koneksi.php';
    function tambah_data ($data){
        $customernumber = $data['customernumber'];
        $customername = $data['customername'];
        $contactlastname = $data['contactlastname'];
        $contactfirstname = $data['contactfirstname'];
        $phone = $data['phone'];
        $addresline1 = $data['addresline1'];
        $addresline2 = $data['addresline2'];
        $city = $data['city'];
        $state = $data['state'];
        $postalcode = $data['postalcode'];
        $country = $data['country'];
        $salesrepemployeenumber = $data['salesrepemployeenumber'];
        $creditlimit = $data['creditlimit'];

        $query = "INSERT INTO customers VALUES('$customernumber', '$customername', '$contactlastname', '$contactfirstname', '$phone', '$addresline1', '$addresline2', '$city', '$state', '$postalcode', '$country', '$salesrepemployeenumber', '$creditlimit')";
        $sql = mysqli_query(koneksi_db(), $query);
        
        return true;
    }

    function ubah_data ($data){
        $customernumber = $data['customernumber'];
        $customername = $data['customername'];
        $contactlastname = $data['contactlastname'];
        $contactfirstname = $data['contactfirstname'];
        $phone = $data['phone'];
        $addresline1 = $data['addresline1'];
        $addresline2 = $data['addresline2'];
        $city = $data['city'];
        $state = $data['state'];
        $postalcode = $data['postalcode'];
        $country = $data['country'];
        $salesrepemployeenumber = $data['salesrepemployeenumber'];
        $creditlimit = $data['creditlimit'];

        $query = "UPDATE customers SET customerName = '$customername', contactLastName = '$contactlastname', contactFirstName = '$contactfirstname', phone = '$phone', addressLine1 = '$addresline1', addressLine2 = '$addresline2', city = '$city', state = '$state', postalCode = '$postalcode', country = '$country', SalesRepEmployeeNumber = '$salesrepemployeenumber', creditLimit = '$creditlimit' WHERE customerNumber = '$customernumber'";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }

    function hapus_data($data){
        $customernumber = $data['hapus'];
        $querytampil = "SELECT*FROM customers WHERE customerNumber = '$customernumber'; ";
        $sqltampil = mysqli_query(koneksi_db(), $querytampil);
        $result = mysqli_fetch_assoc($sqltampil);

        $query = "DELETE FROM customers WHERE customerNumber = '$customernumber';";
        $sql = mysqli_query(koneksi_db(), $query);

        return true;
    }
?>
<?php
include '../main/koneksi.php';

$customernumber = '';
$customername = '';
$contactlastname = '';
$xontactfirstname = '';
$phone = '';
$addresline1 = '';
$addresline2 = '';
$city = '';
$state = '';
$postalcode = '';
$country = '';
$salesrepemployeenumber = '';
$creditlimit = '';

if (isset($_GET['ubah'])) {
    $customernumber = $_GET['ubah'];
    $query = "SELECT * FROM customers WHERE customerNumber = '$customernumber';";
    $sql = mysqli_query(koneksi_db(), $query);
    $result = mysqli_fetch_assoc($sql);

    $customernumber = $result['customerNumber'];
    $customername = $result['customerName'];
    $contactlastname = $result['contactLastName'];
    $contactfirstname = $result['contactFirstName'];
    $phone = $result['phone'];
    $addresline1 = $result['addressLine1'];
    $addresline2 = $result['addressLine2'];
    $city = $result['city'];
    $state = $result['state'];
    $postalcode = $result['postalCode'];
    $country = $result['country'];
    $salesrepemployeenumber = $result['salesRepEmployeeNumber'];
    $creditlimit = $result['creditLimit'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Classic Models</title>
</head>

<body>
    <nav>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="../main/employees.php">Employees</a></li>
            <li><a href="../main/productline.php">Productlines</a></li>
            <li><a href="../main/customers.php">Customers</a></li>
            <li><a href="../main/product.php">Product</a></li>
        </ul>
    </nav>

    <div style="height:100px"></div>

    <div class="contentambah">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <label for="customernumber">
                Customer Number
            </label>
            <input required type="text" name="customernumber" id="customernumber" placeholder="Cth: 102(tidak boleh sama)"
                value="<?php echo $customernumber; ?>">
            <label for="customername">
                Customer Name
            </label>
            <input required type="text" name="customername" id="customername" placeholder="Masukkan Customer Name"
                value="<?php echo $customername; ?>">
            <label for="contactlastname">
                Contact Last Name
            </label>
            <input type="text" name="contactlastname" id="contactlastname" placeholder="Masukkan Contact Last Name"
                value="<?php echo $contactlastname; ?>">
            <label for="contactfirstname">
                Contact First Name
            </label>
            <input required type="text" name="contactfirstname" id="contactfirstname" placeholder="Masukkan Contact Last Name"
                value="<?php echo $contactfirstname; ?>">
            <label for="phone">
                phone
            </label>
            <input required type="text" name="phone" id="phone" placeholder="Masukkan phone"
                value="<?php echo $phone; ?>">
            <label for="addresline1">
                Addres Line 1
            </label>
            <input required type="text" name="addresline1" id="addresline1"
                placeholder="Cth: 8489 Strong St" value="<?php echo $addresline1; ?>">
            <label for="addresline2">
                Addres Line 2
            </label>
            <input required type="text" name="addresline2" id="addresline2"
                placeholder="Cth: Suite 400" value="<?php echo $addresline2; ?>">
            <label for="city">
                City
            </label>
            <input required type="text" name="city" id="city" placeholder="Cth: Nantes" value="<?php echo $city; ?>">
            <label for="state">
                State
            </label>
            <input required type="text" name="state" id="state" placeholder="Cth: NV" value="<?php echo $state; ?>">
            <label for="postalcode">
                Postal Code
            </label>
            <input required type="text" name="postalcode" id="postalcode" placeholder="Cth: 44000" value="<?php echo $postalcode; ?>">
            <label for="country">
                Country
            </label>
            <input required type="text" name="country" id="country" placeholder="Cth: USA" value="<?php echo $country; ?>">
            <label for="salesrepemployeenumber">
                Sales Rep Employee Number
            </label>
            <input required type="text" name="salesrepemployeenumber" id="salesrepemployeenumber" placeholder="Cth: 1370(Harus sesuai dengan employee number yang sudah ada)" value="<?php echo $salesrepemployeenumber; ?>">
            <label for="creditlimit">
                Credit Limit
            </label>
            <input required type="text" name="creditlimit" id="creditlimit" placeholder="Cth: 23423.00" value="<?php echo $creditlimit; ?>">
            <?php
            if (isset($_GET['ubah'])) {
                ?>
                <button type="submit" name="aksi" value="edit">
                    <i aria-hidden="true"></i>
                    Simpan Perubahan
                </button>
                <?php
            } else {
                ?>
                <button type="submit" name="aksi" value="add">
                    <i aria-hidden="true"></i>
                    Tambahkan
                </button>
                <?php
            }
            ?>
            <a href="../main/customers.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>
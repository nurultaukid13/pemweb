<?php
include '../main/koneksi.php';

$employeesnumber = '';
$lastname = '';
$firstname = '';
$extension = '';
$email = '';
$officecode = '';
$reportsto = '';
$jobtittle = '';

if (isset($_GET['ubah'])) {
    $employeesnumber = $_GET['ubah'];
    $query = "SELECT * FROM employees WHERE employeeNumber = '$employeesnumber';";
    $sql = mysqli_query(koneksi_db(), $query);
    $result = mysqli_fetch_assoc($sql);

    $employeesnumber = $result['employeeNumber'];
    $lastname = $result['lastName'];
    $firstname = $result['firstName'];
    $extension = $result['extension'];
    $email = $result['email'];
    $officecode = $result['officeCode'];
    $reportsto = $result['reportsTo'];
    $jobtittle = $result['jobTitle'];
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
            <label for="employeesnumber">
                Employee Number
            </label>
            <input required type="text" name="employeesnumber" id="employeesnumber" placeholder="Cth: 1008"
                value="<?php echo $employeesnumber; ?>">
            <label for="lastname">
                Last Name
            </label>
            <input required type="text" name="lastname" id="lastname" placeholder="Masukkan Last Name"
                value="<?php echo $lastname; ?>">
            <label for="firstname">
                First Name
            </label>
            <input type="text" name="firstname" id="firstname" placeholder="Masukkan First Name"
                value="<?php echo $firstname; ?>">
            <label for="extension">
                Extensiom
            </label>
            <input required type="text" name="extension" id="extension" placeholder="Cth: x2133"
                value="<?php echo $extension; ?>">
            <label for="email">
                Email
            </label>
            <input required type="text" name="email" id="email" placeholder="Masukkan Email"
                value="<?php echo $email; ?>">
            <label for="officecode">
                Office Code
            </label>
            <input required type="text" name="officecode" id="officecode" placeholder="Cth: 1(harus sesuai dengan yang ada)"
                value="<?php echo $officecode; ?>">
            <label for="reportsto">
                Reports To
            </label>
            <input required type="text" name="reportsto" id="reportsto" placeholder="Cth: 1102(harus sesuai dengan yang ada)"
                value="<?php echo $reportsto; ?>">
            <label for="jobtittle">
                Job Title
            </label>
            <input required type="text" name="jobtittle" id="jobtittle" placeholder="Cth: President"
                value="<?php echo $jobtittle; ?>">
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
            <a href="../main/employees.php" type="button">
                <i aria-hidden="true"></i>
                Batal
            </a>
        </form>
    </div>
</body>

</html>
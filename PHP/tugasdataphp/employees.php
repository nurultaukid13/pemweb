<?php
include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Classic Model</title>
</head>

<body>
    <nav>
        <h2>Classic Model</h2>
        <ul>
            <li><a href="#">Employees</a></li>
            <li><a href="productline.php">Productlines</a></li>
        </ul>
    </nav>

    <div class="tabel-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Employees Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Extension</th>
                    <th>Email</th>
                    <th>Office Code</th>
                    <th>Reports To</th>
                    <th>Job Tittle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM employees";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row['employeeNumber']; ?>
                            </td>
                            <td>
                                <?php echo $row['lastName']; ?>
                            </td>
                            <td>
                                <?php echo $row['firstName']; ?>
                            </td>
                            <td>
                                <?php echo $row['extension']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['officeCode']; ?>
                            </td>
                            <td>
                                <?php echo $row['reportsTo']; ?>
                            </td>
                            <td>
                                <?php echo $row['jobTitle']; ?>
                            </td>
                            <?php
                    }
                    mysqli_free_result($result);
                } else {
                    echo "Data tidak ada";
                }
                mysqli_close($conn);
                ?>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
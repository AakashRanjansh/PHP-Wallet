<html>
<head>
    <title>Add Money</title>
</head>
<body style="background-color:powderblue;">
<?php
$voucher = $_POST["voucher"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aamir";
$user = "Aakash";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$check = "SELECT code from voucher where code = '$voucher';";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE balance set rembalance = rembalance + (select amount from voucher where code = '$voucher') where user = '$user' and (select code from voucher where code = '$voucher') = '$voucher'";

    mysqli_query($conn, $sql) or die("failed to update");
    $fetch_amount = "SELECT amount from voucher where code = '$voucher';";
    $fetched_amount = mysqli_query($conn, $fetch_amount);

    while ($row = mysqli_fetch_assoc($fetched_amount)) {
        echo "<br><br><center><h2 style='color: green;'>" . $row["amount"] . " Rupees Added to Ur Wallet</h2></center>";
    }

    echo "<center><h4 style='color:rgb(46, 123, 165) ;'>Thank you for Recharging Wallet<h5 style='color: green;'>Please Navigate to <a href='wallet.php'>Homepage</a> to See Latest Balance...</h5></h4></center>";
} else {
    echo "<center><h2 style='color: red;'>Voucher Code Wrong<h3 style='color: green;'><a href='wallet.php'>Please Enter Correct Code...</a></h3> </h2></center>";
}

?>

</body>
</html>
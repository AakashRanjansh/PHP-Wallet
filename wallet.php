<!DOCTYPE html>
<html>
<head>
  <title>Duplicate Wallet</title>
  <style>

    .button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #04AA6D;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);


}

    </style>
</head>
<body style="background-color:powderblue;">
    <center><h1 style="color: blueviolet;">Duplicate Wallet</h1></center>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aamir";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT user, rembalance FROM balance";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<center><h2 style='color: green;'>Welcome back, " . $row["user"] . "</h2></center>";
    echo "<br><br>";
    echo "<center><h2>" , "  Available Balance: " . $row["rembalance"]. "</h2></center><br>";
  }
} 
else 
{
  echo "0 result";
}

mysqli_close($conn);
?>
<center>
<form>
            <table>
                <tr>
            <th>Enter voucher code:</th>
            <td><input type="text" name="bal" id="bal"></td>
        </tr>
        <tr>
            <td>&emsp;</td>
        </tr>
        <tr><th colspan="2">
            <input type="submit" class="button" name="Add" value="Add Money">
        </th>
        </tr>
        </table>
            
        </form>
</center>

</body>
</html>
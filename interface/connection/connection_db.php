<?php
/////////////////////////////////////////////////////////
//                    CONNECTION DB                   //
/////////////////////////////////////////////////////////

$servername = "sql.freedb.tech";
$port = '3306';
$dbname = "freedb_outils";
$username = "";
$password = '';

$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}
?>

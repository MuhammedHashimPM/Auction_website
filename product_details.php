<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "auctionsystem";

$p_name=$_POST["pname"];
$p_dtls=$_POST["details"];
$p_price=$_POST["money"];
$p_image=$_FILES["photo"]["image"];

echo "<br>image  ",$p_image;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


// data insertion
$sql = "INSERT INTO products (productName, productDetails, price, photo) VALUES ('$p_name', '$p_dtls', '$p_price', '$p_image')";


if ($conn->query($sql) === TRUE) 
{
    echo "details inserted successfully";
} else 
{
    echo "details inserted unsuccessfull : " . $conn->error;
}

$conn->close();



?>

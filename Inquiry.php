<?php
$servername = "localhost";
$username = "stefan3_Web3340";
$password = "test";
$dbname = "stefan3_Web3340";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Description = $_POST['Description'];
//into data into table
$sql = "INSERT INTO `Contact` ( `InquiryID`,`Name`, `Email`, `Description`) VALUES ('0', '$Name', '$Email', '$Description')";
$rs = mysqli_query($conn, $sql);

if($rs)
{
	echo "Thank You For Contacting Us ";
}

$mysqli->close();
?>
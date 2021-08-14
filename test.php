<?php 

//phpinfo() 

$servername = 'h2d-db.ccffzdhmppvf.ap-southeast-1.rds.amazonaws.com';
$dbname = 'main';
$username = 'admin';
$password = 'admin123';
$port = 3306;
$url = "mysql:host=$servername;dbname=$dbname;port=$port";

$conn = new PDO($url, $username, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>

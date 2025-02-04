hoi

<?php
  $denaam = $_GET["denaamvandeboot"];
  $delengte = $_GET["lengte"];
  echo $denaam & $delengte;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbvoorbeeldfefriesland";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO boot (naamkapitein, lengte)
VALUES ('$denaam', '$delengte')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
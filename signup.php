<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_voorbeeld_fe";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
$make_account_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Username: " . $row["username"]. " - Password: " . $row["password"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();



?>
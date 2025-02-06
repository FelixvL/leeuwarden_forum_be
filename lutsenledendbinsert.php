hoi

<?php
  $naam = $_GET["naam"];
  $email = $_GET["emailadres"];
  $afbeelding = $_GET["afbeelding"];
  echo $naam & $email & $afbeelding;

  $servername = "forumpjedb.mysql.database.azure.com";
  $username = "felixadmin";
  $password = "uiop7890UIOP&*()";
  $dbname = "forumdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO ledentabel (naam, emailadres, afbeelding)
VALUES ('$naam', '$email', '$afbeelding')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
<?php
// regels van php
 //   echo "dit wil ik zien";
   // $var1 = 3;
   // echo $var1;

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

$sql = "SELECT * FROM boot";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $eindstring = "";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $eindstring .= "{";
    $eindstring .= " \"naamkapitein\" : \"" . $row["naamkapitein"]. "\"";
    $eindstring .= "},";
  }
  $eindstring = substr($eindstring, 0, -1);
  echo $eindstring;
} else {
  echo "0 results";
}
$conn->close();



?>
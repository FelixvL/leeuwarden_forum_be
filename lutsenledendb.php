<?php
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
?>

<?php
// regels van php
 //   echo "dit wil ik zien";
   // $var1 = 3;
   // echo $var1;

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

$sql = "SELECT * FROM ledentabel";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $eindstring = "[";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $eindstring .= "{";
    $eindstring .= " \"naam\" : \"" . $row["naam"]. "\",";
    $eindstring .= " \"emailadres\" : \"" . $row["emailadres"]. "\",";
    $eindstring .= " \"afbeelding\" : \"" . $row["afbeelding"]. "\"";
    $eindstring .= "},";
  }
  $eindstring = substr($eindstring, 0, -1);
  $eindstring .= "]";
  echo $eindstring;
} else {
  echo "0 results";
}
$conn->close();



?>
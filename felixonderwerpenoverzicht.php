<?php
// CORS FILTER
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
// 1. Databaseverbinding maken
$servername = "forumpjedb.mysql.database.azure.com";
$username = "felixadmin";
$password = "uiop7890UIOP&*()";
$dbname = "forumdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check de verbinding
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// 2. SQL-query uitvoeren
$sql = "SELECT * FROM onderwerpf";
$result = $conn->query($sql);

// 3. Data verwerken tot JSON
if ($result->num_rows > 0) {
    $eindstring = "[";
    while($row = $result->fetch_assoc()) {
        $eindstring .= "{";
        $eindstring .= " \"id\" : \"" . $row["id"]. "\", ";
        $eindstring .= " \"naam\" : \"" . $row["naam"]. "\", ";
        $eindstring .= " \"omschrijving\" : \"" . $row["omschrijving"]. "\", ";
        $eindstring .= " \"afbeelding\" : \"" . $row["afbeelding"]. "\", ";
        $eindstring .= " \"startdatum\" : \"" . $row["startdatum"]. "\", ";
        $eindstring .= " \"gesloten\" : \"" . $row["gesloten"]. "\", ";
        $eindstring .= " \"user_gestart\" : \"" . $row["user_gestart"]. "\"";
        $eindstring .= "},";
    }
    // Laatste komma weghalen
    $eindstring = substr($eindstring, 0, -1);
    $eindstring .= "]";
    echo $eindstring;
} else {
  echo "0 results";
}

// 4. Verbinding sluiten
$conn->close();
?>
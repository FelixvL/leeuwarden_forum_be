<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json');

    // Database connection stuff
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_voorbeeld_fe";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // this is literally just a check for the connection
    if ($conn->connect_error) {
        die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
    }

    // and this is the SQL query to fetch FAQ data
    $sql = "SELECT question, answer FROM faqs";
    $result = $conn->query($sql);

    $faqs = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $faqs[] = $row;
        }
    }

    // echo is kinda just like console.log in js or print(data) in python
    echo json_encode($faqs);

    // aaanddd close the connection
    $conn->close();
?>
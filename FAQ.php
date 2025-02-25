<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST');
    header("Access-Control-Allow-Headers: X-Requested-With");
    header('Content-Type: application/json');

    $servername = "forumpjedb.mysql.database.azure.com";
    $username = "felixadmin";
    $password = "uiop7890UIOP&*()";
    $dbname = "forumdb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
    }

    $sql = "SELECT question, answer FROM faq";
    $result = $conn->query($sql);

    $faqs = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $faqs[] = $row;
        }
    }

    echo json_encode($faqs);

    $conn->close();
?>
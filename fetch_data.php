<?php
    require "conn.php";
    header('Content-Type: application/json');
    header("Access-Control-Allow-Origin: *");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); 
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    
    $table_name = "sensor";
    
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query($conn, $query);

    // Store the data in an array
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $data[] = array(
            "sensor1" => $row["sensor1"], 
            "sensor2" => $row["sensor2"], 
            "sensor3" => $row["sensor3"], 
            "timestamp" => $row["timestamp"]
        );
    }

    // Convert the data to JSON format
    $json_data = json_encode($data);
    echo $json_data;
?>


<?php
include_once "conn.php";

$sensor = $_GET['sensor'];

if ($sensor = $_GET['sensor']){

    if ($sensor == 'sensor1'){
        $sample = "sample";
    }else if($sensor == 'sensor2'){
        $sample = "sample1";
    }else if($sensor == 'sensor3'){
        $sample = "sample2";
    }

// Sanitize the input to prevent SQL injection
$sensor = mysqli_real_escape_string($conn, $sensor);
$sample = mysqli_real_escape_string($conn, $sample);

$query = "SELECT $sensor, $sample, timestamp FROM sensor";
$result = mysqli_query($conn, $query);

$filename = $sensor . ".csv";
$file = fopen($filename, "w");

$headers = array($sensor, $sample, "timestamp");
fputcsv($file, $headers);

while ($row = mysqli_fetch_array($result)) {
    $data = array($row[$sensor], $row[$sample], $row['timestamp']);
    fputcsv($file, $data);
}

fclose($file);

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=$filename");

readfile($filename);

unlink($filename);

mysqli_close($conn);
}


else {

include_once "conn.php";
$table_name = "sensor";
    
$query = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $query);

$filename = $table_name . ".csv";
$file = fopen($filename, "w");

$headers = array("sensor1", "sample","sensor2", "sample1","sensor3", "sample2", "timestamp");
fputcsv($file, $headers);

while ($row = mysqli_fetch_array($result)) {
    $data = array($row['sensor1'], $row['sample'],$row['sensor2'], $row['sample1'],$row['sensor3'], $row['sample2'], $row['timestamp']);
    fputcsv($file, $data);
}

fclose($file);

header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=$filename");

readfile($filename);

unlink($filename);
exit;

}
?>

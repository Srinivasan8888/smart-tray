<?php 
require "conn.php";
date_default_timezone_set('Asia/Kolkata'); // set the timezone to Asia/Kolkata
$timestamp = date('Y-m-d H:i:s');
$id = $_GET['id'];
$sensor1 = $_GET['sensor1'];
$sensor2 = $_GET['sensor2'];
$sensor3 = $_GET['sensor3'];
$sample = $_GET['sample'];
$sample1 = $_GET['sample1'];
$sample2 = $_GET['sample2'];
// $percentage = $_GET['percentage'];
// $percentage1 = $_GET['percentage1'];
// $percentage2 = $_GET['percentage2'];

$total_volume = 1000;

$percentage = ($sensor1 / $total_volume) * 100;
$percentage1 = ($sensor2 / $total_volume) * 100;
$percentage2 = ($sensor3 / $total_volume) * 100;

echo $id;
echo " ";
echo $sensor1;
echo " ";
echo $sensor2;
echo " ";
echo $sensor3;
echo " ";
echo $sample;
echo " ";
echo $sample1;
echo " ";
echo $sample2;
echo " ";
echo $percentage;
echo " ";
echo $percentage1;
echo " ";
echo $percentage2;
echo " ";

$sql = "INSERT INTO sensor (id, sensor1, sensor2, sensor3, sample, sample1, sample2, percentage, percentage1, percentage2, timestamp) 
        VALUES('$id', '$sensor1', '$sensor2', '$sensor3' ,'$sample','$sample1','$sample2' ,'$percentage','$percentage1','$percentage2', '$timestamp')";
$sql1 = "SELECT * from sensor ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $sql1);
$num = mysqli_fetch_array($result);

if ($conn->query($sql) === TRUE) {
    echo "STATUS: OK";
 
    $sql1 = "SELECT * FROM sensor ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql1);
    $num = mysqli_fetch_array($result);
    echo $num['level'];
} else {   
    echo "<h6>STATUS: failed</h6>";
}
?>

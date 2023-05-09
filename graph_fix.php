<?php
include_once "conn.php";

$table_name = "sensor";
    
$query = "SELECT * FROM $table_name";
$result = mysqli_query($conn, $query);

// Store the data in an array
$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = array("sensor1" => $row["sensor1"], "sensor2" => $row["sensor2"], "sensor3" => $row["sensor3"], "timestamp" => $row["timestamp"]);
}

// Convert the data to JSON format
$json_data = json_encode($data);
?>


<!DOCTYPE html>
<html>
<head></head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
        // Parse the JSON data
        var data = <?php echo $json_data; ?>;
        
        // Create the graph using Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(item => item.timestamp),
    datasets: [{
        label: '<?php echo "sensor1"; ?>',
        data: data.map(item => item.<?php echo "sensor1" ?>),
        borderWidth: 1
    },
    {
        label: '<?php echo "sensor2"; ?>',
        data: data.map(item => item.<?php echo "sensor2" ?>),
        borderWidth: 1
    },{
        label: '<?php echo "sensor3"; ?>',
        data: data.map(item => item.<?php echo "sensor3" ?>),
        borderWidth: 1
    }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>



<?php
include_once "conn.php";

$table_name = "sensor";

if (isset($_GET['sensor'])) {
    $sensor = $_GET['sensor'];
    $query = "SELECT $sensor, timestamp FROM $table_name";
} else {
    $query = "SELECT * FROM $table_name";
}

$result = mysqli_query($conn, $query);

// Store the data in an array
$data = array();
while ($row = mysqli_fetch_array($result)) {
    if (isset($sensor)) {
        $data[] = array($sensor => $row[$sensor], "timestamp" => $row["timestamp"]);
    } else {
        $data[] = array("sensor1" => $row["sensor1"], "sensor2" => $row["sensor2"], "sensor3" => $row["sensor3"], "timestamp" => $row["timestamp"]);
    }
}

// Convert the data to JSON format
$json_data = json_encode($data);
?>

<!-- Display the graph using Chart.js -->
<!DOCTYPE html>
<html>
<head>
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
                datasets: [
                    <?php if (isset($sensor)) { ?>
                        {
                            label: '<?php echo $sensor; ?>',
                            data: data.map(item => item.<?php echo $sensor; ?>),
                            borderWidth: 1
                        }
                    <?php } else { ?>
                        {
                            label: 'sensor1',
                            data: data.map(item => item.sensor1),
                            borderWidth: 1
                        },
                        {
                            label: 'sensor2',
                            data: data.map(item => item.sensor2),
                            borderWidth: 1
                        },
                        {
                            label: 'sensor3',
                            data: data.map(item => item.sensor3),
                            borderWidth: 1
                        }
                    <?php } ?>
                ]
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

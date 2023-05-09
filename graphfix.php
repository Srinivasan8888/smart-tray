<?php
include_once "conn.php";

$sensor = $_GET['sensor'];

$query = "SELECT $sensor, timestamp FROM sensor";
$result = mysqli_query($conn, $query);

// Store the data in an array
$data = array();
while ($row = mysqli_fetch_array($result)) {
    $data[] = array("$sensor" => $row["$sensor"], "timestamp" => $row["timestamp"]);
}

// Convert the data to JSON format
$json_data = json_encode($data);
?>

<!-- Display the graph using Chart.js -->
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
                    label: '<?php echo $sensor; ?>',
                    data: data.map(item => item.<?php echo $sensor; ?>),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
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

<!DOCTYPE html>
<html>
<head>
    <title>Live Sensor Data Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
        // Parse the JSON data
        var data = <?php echo $json_data; ?>;
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(item => item.timestamp),
                datasets: [{
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

        // Set the polling interval to 5 seconds
        var pollingInterval = 500;

        // Define a function to update the graph
        function updateGraph() {
            // Send an AJAX request to the server to fetch new data
            $.ajax({
                url: 'http://157.245.96.157/smart-tray/fetch_data.php',
                type: 'GET',
                success: function(data) {
                    // Parse the JSON data
                    var newData = JSON.parse(data);
            
                    // Check if new data is available
                    if (newData.length > data.length) {
                        // Update the graph with the new data
                        myChart.data.labels.push(newData[newData.length - 1].timestamp);
                        myChart.data.datasets[0].data.push(newData[newData.length - 1].sensor1);
                        myChart.data.datasets[1].data.push(newData[newData.length - 1].sensor2);
                        myChart.data.datasets[2].data.push(newData[newData.length - 1].sensor3);
                        myChart.update();
                    }
                }
            });
        }

        // Call the updateGraph function at regular intervals
        setInterval(updateGraph, pollingInterval);
    </script>
</body>
</html>

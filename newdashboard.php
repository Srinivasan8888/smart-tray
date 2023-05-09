<?php 
include_once "conn.php";
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['identity'])){
    header('location: login.php');
	  die();
   

}
// $sql1 = "SELECT * FROM fixed ORDER BY id DESC LIMIT 1";
// $query1=mysqli_query($conn, $sql1);
// $row1=mysqli_fetch_array($query1);
// $fix = $row1['val'];


// //second table
// $sql = "SELECT * FROM flowmeter ORDER BY id DESC LIMIT 1";
// $query=mysqli_query($conn, $sql);
// $row=mysqli_fetch_array($query);
// $flow = $row['flow'];

$sql = "SELECT * FROM sensor ORDER BY id DESC LIMIT 1";
$query=mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
$sensor1 = $row['sensor1'];
$sensor2 = $row['sensor2'];
$sensor3 = $row['sensor3'];

$mac_address = exec('getmac');
$sql = "INSERT INTO loginact (mac_address) VALUES ('$mac_address')";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/mm.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.39.0/apexcharts.min.js" integrity="sha512-jZMUAHj0E1ZO8dGoWdvwCQ/bh4sefOi6lwM5XcjnpzyTfOc409SrdZAdbvum112UT1c/SqVSPZAzksUkxVcQ8w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
      @import url("https://fonts.googleapis.com/css?family=DM+Sans:400,500,700&display=swap");



      @font-face {
            font-family: 'myFirstFont';
        }
        body {
            background-color: #F5F7FA;
            font-family: 'myFirstFont';
        }
        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

      /* Sidebar */
      .sidebar {
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 58px 0 0; /* Height of navbar */
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
      width: 240px;
      z-index: 600;
      }

      @media (max-width: 991.98px) {
      .sidebar {
      width: 100%;
      }
      }
      .sidebar .active {
      border-radius: 5px;
      box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
      }

      .sidebar-sticky {
      position: relative;
      top: 0;
      height: calc(100vh - 48px);
      padding-top: 0.5rem;
      overflow-x: hidden;
      overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
      }
      @media (max-width: 1174px) {
        .fnee {
          display: flex;
          justify-content: center;
        }

        /* CSS that should be displayed if width is equal to or less than 800px goes here */
      }

      .line {
        border-top: 1px solid black;
      }

      .float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        right: 40px;
        background-color: #0C9;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        box-shadow: 2px 2px 3px #999;
      }

      .my-float {
        margin-top: 22px;
      }

     

        /* CSS that should be displayed if width is equal to or less than 800px goes here */
      

      .projects-section {
        flex: 2;
        background-color: var(--projects-section);
        border-radius: 32px;
        padding: 32px 32px 0 32px;
        overflow: hidden;
        height: 16%;
        display: flex;
        flex-direction: column;

        &-line {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding-bottom: 32px;
        }

        &-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 24px;
          color: var(--main-color);

          p {
            font-size: 24px;
            line-height: 32px;
            font-weight: 700;
            opacity: .9;
            margin: 0;
            color: var(--main-color);
          }

          .time {
            font-size: 20px;
          }
        }
      }

      .projects-status {
        display: flex;
      }

      .item-status {
        display: flex;
        flex-direction: column;
        margin-right: 16px;

        &:not(:last-child) .status-type:after {
          content: '';
          position: absolute;
          right: 8px;
          top: 50%;
          transform: translatey(-50%);
          width: 6px;
          height: 6px;
          border-radius: 50%;
          border: 1px solid var(--secondary-color);
        }
      }

      .status-number {
        font-size: 24px;
        line-height: 32px;
        font-weight: 700;
        color: var(--main-color);
      }

      .status-type {
        position: relative;
        padding-right: 24px;
        color: var(--secondary-color);
      }

      .view-actions {
        display: flex;
        align-items: center;
      }

      .blink_me {
        animation: blinker 3s linear infinite;
      }

      @keyframes blinker {
        50% {
          opacity: 0;
        }
      }

      .card {
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        transition: all 0.3s ease-in-out;
      }

      .card:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      }

      .card-body {
        padding: 1.25rem;
      }

      .media-body {
        padding-right: 1rem;
      }

      h3 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
      }

      span {
        font-size: 1.2rem;
      }

      i {
        font-size: 2rem;
      }

      @media only screen and (min-width: 768px) and (max-width: 1024px) {
        #chart {
          height: 200px;
        }
      }

      @media only screen and (max-width: 320px) {
        #chart {
          height: 150px;
          width: 50px;
        }
      }

      @media only screen and (min-width: 321px) and (max-width: 480px) {
        #chart {
          height: 150px;
          width: 100px;
        }
      }

      
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body?>
    <header>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark text-white">
        <center>
          <img src="./img/xyma-bg-white.png" class="my-3" width="60%"></img>
          <hr>
        </center>
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4 ">
            <a href="newdashboard.php" class="list-group-item list-group-item-action py-3 px-3 bg-dark text-white ripple zoom">
              <i class="fas fa-tachometer-alt fa-fw me-3" style="width=20%"></i>
              <span>Dashboard</span>
            </a>
            <a href="reports.php" class="list-group-item list-group-item-action py-3 px-3 bg-dark text-white zoom">
              <i class="fas fa-chart-line fa-fw me-3"></i>
              <span>report</span>
            </a>
            <a href="graph.php" class="list-group-item list-group-item-action py-3 px-3 bg-dark text-white zoom">
              <i class="fas fa-chart-pie fa-fw me-3"></i>
              <span>graph</span>
            </a>
            <a href="settings.php" class="list-group-item list-group-item-action py-3 px-3 bg-dark text-white zoom">
              <i class="fas fa-cog fa-fw me-3"></i>
              <span>Settings</span>
            </a>
          </div>
        </div>
        <hr>
        <center>
          <p class="mt-5">©️ All Rights Reserved By</p>
        </center>
        <center>
          <img src="./img/xyma-bg-white.png" width="50%"></img>
        </center>
        <center>
          <p class="mt-4">Powered by Xyma Analytics Inc</p>
        </center>
      </nav>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </header>


    <main style="">
      <div class="pt-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand font-bold">Dashboard</a>
            <div class="d-flex ms-auto" style="position:relative; right:20px;"> <?php echo $_SESSION['email'] ;?> </div>
          </div>
        </nav>
        <br>
        <div class="container-fluid">
          <div class="projects-section">
            <div class="projects-section-header">
              <p class="font-weight-bold">Sensors</p>
            </div>
            <div class="projects-section-line">
              <div class="projects-status">
                <div class="item-status">
                  <span class="status-number text-success blink_me font-weight-bold">1</span>
                  <span class="status-type font-weight-bold">Online Sensors</span>
                </div>
                <div class="item-status">
                  <span class="status-number text-danger blink_me font-weight-bold">2</span>
                  <span class="status-type font-weight-bold">Offline Sensors</span>
                </div>
                <div class="item-status">
                  <span class="status-number text-primary blink_me font-weight-bold">3</span>
                  <span class="status-type font-weight-bold">Total Sensors</span>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="container-fluid">
            <div class="row">
              <!--box 1-->
              <div class="col-xl-4 col-sm-4 col-12 mt-1">
                <div class="card bg-light">
                  <div class="card-content">
                    <div class="card-body bg-dark bg-gradient card">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <!-- <h3 class="danger" style="color:#ffff" id="s1"></h3><span style="color:#ffff">Sensor 1</span> -->
                          <h3 class="danger text-white" id="s1"></h3>
                          <span>
                            <strong class="text-white">Sensor 1</strong>
                          </span>
                        </div>
                        <div class="ms-auto h1 pt-2">
                          <img src="./img/level.png" class="img-fluid float-end" alt="Responsive image" width="40%">
                          <!-- <i class="fa-solid fa-flask-round-potion" style="color:#ffff"></i> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--box 2-->
              <div class="col-xl-4 col-sm-4 col-12 mt-1">
                <div class="card bg-light">
                  <div class="card-content">
                    <div class="card-body bg-dark bg-gradient card">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <!-- <h3 class="danger" style="color:#ffff" id="s2"></h3><span style="color:#ffff">Sensor 2</span> -->
                          <h3 class="danger text-white" id="s2">
                            <span>mL</span>
                          </h3>
                          <span>
                            <strong class="text-white">Sensor 2</strong>
                          </span>
                        </div>
                        <div class="ms-auto h1 pt-2">
                          <img src="./img/level.png" class="img-fluid float-end" alt="Responsive image" width="40%">
                          <!-- <i class="fa-solid fa-flask-round-potion"></i> -->
                          <!-- <i class="fa-solid fa-flask-round-potion" style="color:#ffff"></i> -->
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--box 2-->
              <div class="col-xl-4 col-sm-4 col-12 mt-1">
                <div class="card bg-light">
                  <div class="card-content">
                    <div class="card-body bg-dark bg-gradient card">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <!-- <h3 class="danger" style="color:#ffff" id="s3"></h3><span style="color:#ffff">sensor 3</span> -->
                          <h3 class="danger  text-white" id="s3"></h3>
                          <span>
                            <strong class="text-white">Sensor 3</strong>
                          </span>
                        </div>
                        <div class="ms-auto h1 pt-2">
                          <img src="./img/level.png" class="img-fluid float-end" alt="Responsive image" width="40%">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="card">
              <div class="row">
                <div class="col">
                  <div class="card  h-100">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="card col-xl-12 col-sm-12 col-12">
                            <div id="chart1"></div>
                          </div>
                          <br>
                          <br>
                          <div class="col ">
                            <div class="card col-xl-12 col-sm-12 col-12 bg-dark">
                              <div class="card-top text-white text-bold pt-1">Sample Placed Is</div>
                              <div class="card-body">
                                <h5 class="card-title text-center text-white" id="sample"></h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card col-xl-12 col-sm-12 col-12">
                            <div id="chart2"></div>
                          </div>
                          <br>
                          <br>
                          <div class="col ">
                            <div class="card col-xl-12 col-sm-12 col-12 bg-dark">
                              <div class="card-top  text-white text-bold pt-1">Sample Placed Is</div>
                              <div class="card-body">
                                <h5 class="card-title text-center text-white" id="sample1"></h5>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="card col-xl-12 col-sm-12 col-12">
                            <div id="chart3"></div>
                          </div>
                          <br>
                          <br>
                          <div class="col ">
                            <div class="card col-xl-12 col-sm-12 col-12 bg-dark">
                              <div class="card-top text-white text-bold pt-1">Sample Placed Is</div>
                              <div class="card-body">
                                <h5 class="card-title text-center text-white" id="sample2"></h5>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a href="logout.php" class="float">
        <img src="./img/logout.png" style="color:#ffff" class="img-fluid" alt="logout">
      </a>
    </main>
    <script>
      function logout(pagea) {
        var pagea = pagea;
        setTimeout(function() {
          swal("", "This will result in Logout", "warning", {
            buttons: {
              cancel: "Cancel",
              Home: "Submit",
            },
          }).then((value) => {
            switch (value) {
              case "Home":
                window.location.href = pagea;
                break;
              default:
            }
          });
        }, 300);
      }
      var options1 = {
        series: [],
        chart: {
          height: 300,
          type: 'radialBar',
          offsetY: -10
        },
        plotOptions: {
          radialBar: {
            startAngle: -135,
            endAngle: 135,
            hollow: {
              margin: 0,
              size: '70%',
              background: '#fff',
              image: undefined,
            },
            dataLabels: {
              name: {
                fontSize: '16px',
                offsetY: 120
              },
              value: {
                offsetY: 76,
                fontSize: '22px',
                formatter: function(val) {
                  return val + " %";
                }
              }
            }
          }
        },
        stroke: {
          dashArray: 4
        },
        labels: ['Level 1']
      };
      var chart1 = new ApexCharts(document.querySelector("#chart1"), options1);
      chart1.render();
      var options2 = {
        series: [],
        chart: {
          height: 300,
          type: 'radialBar',
          offsetY: -10
        },
        plotOptions: {
          radialBar: {
            startAngle: -135,
            endAngle: 135,
            hollow: {
              margin: 0,
              size: '70%',
              background: '#fff',
              image: undefined,
            },
            dataLabels: {
              name: {
                fontSize: '16px',
                offsetY: 120
              },
              value: {
                offsetY: 76,
                fontSize: '22px',
                formatter: function(val) {
                  return val + " %";
                }
              }
            }
          }
        },
        stroke: {
          dashArray: 4
        },
        labels: ['Level 2']
      };
      var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
      chart2.render();
      var options3 = {
        series: [],
        chart: {
          height: 300,
          type: 'radialBar',
          offsetY: -10
        },
        plotOptions: {
          radialBar: {
            startAngle: -135,
            endAngle: 135,
            hollow: {
              margin: 0,
              size: '70%',
              background: '#fff',
              image: undefined,
            },
            dataLabels: {
              name: {
                fontSize: '16px',
                offsetY: 120
              },
              value: {
                offsetY: 76,
                fontSize: '22px',
                formatter: function(val) {
                  return val + " %";
                }
              }
            }
          }
        },
        stroke: {
          dashArray: 4
        },
        labels: ['Level 3']
      };
      var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
      chart3.render();

      function updateChart() {
        fetch('http://157.245.96.157/smart-tray/sensorfix.php').then(response => response.json()).then(data => {
          const percentage = parseInt(data.percentage);
          const percentage1 = parseInt(data.percentage1);
          const percentage2 = parseInt(data.percentage2);
          chart1.updateOptions({
            series: [percentage]
          });
          chart2.updateOptions({
            series: [percentage1]
          });
          chart3.updateOptions({
            series: [percentage2]
          });
        }).catch(error => console.error(error));
      }
      updateChart();
      setInterval(updateChart, 1000);

      function updateValue() {
        const url = "http://157.245.96.157/smart-tray/sensorfix.php";
        fetch(url).then(response => response.json()).then(data => {
          const value = data['sensor1'];
          const value1 = data['sensor2'];
          const value2 = data['sensor3'];
          const value3 = data['sample'];
          const value4 = data['sample1'];
          const value5 = data['sample2'];
          // Update the value inside the h3 tag
          document.getElementById("s1").innerHTML = value + " mL";
          document.getElementById("s2").innerHTML = value1 + " mL";
          document.getElementById("s3").innerHTML = value2 + " mL"; // add this line
          document.getElementById("sample").innerHTML = value3;
          document.getElementById("sample1").innerHTML = value4;
          document.getElementById("sample2").innerHTML = value5;
        }).catch(error => console.error(error));
      }
      updateValue(); // call immediately
      setInterval(updateValue, 1000);
    </script>
    </body>
</html>
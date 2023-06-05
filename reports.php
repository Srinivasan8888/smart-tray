<?php 
session_start();
if(!isset($_SESSION['identity']) && !isset($_SESSION['email'])){
    header('location:index');
	  die();
}	
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
    <link rel="stylesheet" href="./lity/lity/dist/lity.css">
    <script src="./lity/lity/vendor/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <style>
      .zoom {
  /* padding: 50px; */
  transition: transform .2s; /* Animation */
  /* width: 200px;
  height: 200px; */
  /* margin: 0 auto; */
}

.zoom:hover {
  transform: scale(1.1);
  background-color: #152238 ;
  color: white;
 /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

.tr {
  /* padding: 50px; */
  transition: transform .2s;
  color : black; /* Animation */
  /* width: 200px;
  height: 200px; */
  /* margin: 0 auto; */
}

.tr:hover {
    transform: scale(1.05);
    background-color:  #152238;
    color: white;
 /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}

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
    .fnee{
        display: flex;
        justify-content: center;
    }
  /* CSS that should be displayed if width is equal to or less than 800px goes here */
}
.fixed-logout {
  position: fixed;
  bottom: 20px;
  right: 25px;
  opacity: 0.6;
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

    </style>

</head>
<body>
    <!--Main Navigation-->
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

<!--Main layout-->
<main style="">
  <div class="container-fluid pt-2">
            <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Reports</a>
                            <div class="d-flex ms-auto">
                            <?php echo $_SESSION['email'] ;?> 
                            </div>
                    </div>
            </nav>
                        <div class="col-md-12 mt-5">
                                <div class="col-xl-12 col-sm-12 col-12 mt-5"><!----first half col 1-->                               
                                        <div class="card" style=""><!-- wave guide 1 card-->
                                        <div class="card-content "><!-- wg1 card content--->
                                            <div class="card-body "><!--- wg1 card body--->
                                                    <div class="media d-flex ">
                                                        <div class="media-body text-left ">
                                                                <h6 class="danger text-dark">ST 1</h6>
                                                        </div>
                                                        <div class="ms-auto h1">
                                                            <h6 class="text-dark" id="text">Details</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <div class="card" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="csv.php" class="text-dark" style=""><i class="fa-solid fa-file-csv" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>CSV</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card tr" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="tcpdf.php" class="text-dark" style=""><i class="fa-solid fa-file-pdf" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>Reports</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card tr" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="graphs.php" class="text-dark" data-lity data-lity-target=""><i class="fas fa-chart-line fa-fw" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>Graph</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>
                                </div> <!--div-->
                                <div class="col-xl-12 col-sm-12 col-12 mt-3"><!----first half col 1-->                               
                                        <div class="card" style=""><!-- wave guide 1 card-->
                                        <div class="card-content"><!-- wg1 card content--->
                                            <div class="card-body"><!--- wg1 card body--->
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                                <h6 class="danger text-dark">ST 2</h6>
                                                        </div>
                                                        <div class="ms-auto h1">
                                                            <h6 class="text-dark" id="text">Details</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <div class="card" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                    <center><a href="" class="text-dark" style=""><i class="fa-solid fa-file-csv" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>CSV</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card tr" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="tcpdf.php?sensor=sensor2" class="text-dark" style=""><i class="fa-solid fa-file-pdf" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>Reports</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card tr" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="" class="text-dark" data-lity data-lity-target=""><i class="fas fa-chart-line fa-fw" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>Graph</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        </div>
                                </div>     
                                <div class="col-xl-12 col-sm-12 col-12 mt-3"><!----first half col 1-->                               
                                        <div class="card" style=""><!-- wave guide 1 card-->
                                        <div class="card-content"><!-- wg1 card content--->
                                            <div class="card-body"><!--- wg1 card body--->
                                                    <div class="media d-flex">
                                                        <div class="media-body text-left">
                                                                <h6 class="danger text-dark">ST 3</h6>
                                                        </div>
                                                        <div class="ms-auto h1">
                                                            <h6 class="text-dark" id="text">Details</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <div class="card" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                    <center><a href="" class="text-dark" style=""><i class="fa-solid fa-file-csv" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>CSV</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card tr" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="pdf.php" class="text-dark" style=""><i class="fa-solid fa-file-pdf" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>Reports</h6></center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="card tr" style=""><!-- wave guide 1 card-->
                                                                <div class="card-content"><!-- wg1 card content--->
                                                                    <div class="card-body mt-4">
                                                                        <center><a href="" class="text-dark" data-lity data-lity-target=""><i class="fas fa-chart-line fa-fw" style="font-size:40px"></i></a><br><br></center>
                                                                        <center><h6>Graph</h6></center>
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
  </div>   
</main>
        <script src="./lity/lity/dist/lity.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script>
            
         </script>
</body>
</html>
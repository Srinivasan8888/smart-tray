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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./lity/lity/dist/lity.css">
    <script src="./lity/lity/vendor/jquery.js"></script>
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
  transition: transform .2s; /* Animation */
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
.line {
  border-top: 1px solid black;
}
.fixed-logout {
  position: fixed;
  bottom: 20px;
  right: 20px;
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
<?php 
    include_once './layout/sidebar.php'
  ?>
<!--Main layout-->
<main style="">
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:relative; bottom:40px;">
          <div class="container-fluid">
            <a class="navbar-brand font-weight-bold">Graph</a>

            <div class="btn-group">
              <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
              <div class="d-flex align-items-center">
                              <i class="fa-solid fa-circle-user mr-2" ></i>
                              <span><?php echo $_SESSION['email']; ?> <i class="fa-solid fa-circle-chevron-down"></i></span>
                             </i>
                            </div>
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="settings.php">Profile <i class="fa-solid fa-user"></i></a>
                <a class="dropdown-item" href="logout.php">logout <i class="fa-solid fa-right-from-bracket"></i></a>
              </div>
            </div>
          </div>
        </nav>
  <div class="container-fluid pt-2">
           
            <div class="row mt-5">
                <div class="col-md-4 mt-3">
                    <div class="card" style="background-color: #152238;">
                        <div class="card-content">
                            <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white">Sensor 1</h6>
                                        <div class="row">
                                        <div class="col-md-4">
                                                    <span class="" style="color:white;"><a href="pdf.php?sensor=sensor1" data-lity class="text-white"><i class="fa-solid fa-file-pdf" style="font-size:25px"></i></a></span>
                                            </div>
                                            <div class="col-md-4">
                                                    <span class="" style="color:white;"><a href="csv.php?sensor=sensor1" data-lity class="text-white"><i class="fa-solid fa-file-csv" style="font-size:25px"></i></a></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="" style="color:white;"><a href="graphs.php?sensor=sensor1" data-lity class="text-white"><i class="fas fa-chart-line fa-fw" style="font-size:25px"></i></a></span>
                                            </div>
                                        </div>
                                </div>
                                <div class="ms-auto h1 pt-1 text-white">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card " style="background-color: #152238;">
                        <div class="card-content">
                            <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white">Sensor 2</h6>
                                        <div class="row">
                                        <div class="col-md-4">
                                                    <span class="" style="color:white;"><a href="pdf.php?sensor=sensor2" data-lity class="text-white"><i class="fa-solid fa-file-pdf" style="font-size:25px"></i></a></span>
                                            </div>
                                            <div class="col-md-4">
                                                    <span class="" style="color:white;"><a href="csv.php?sensor=sensor2" data-lity class="text-white"><i class="fa-solid fa-file-csv" style="font-size:25px"></i></a></span>
                                            </div>
                                            <div class="col-md-4">
                                                <span class="" style="color:white;"><a href="graphs.php?sensor=sensor2" data-lity class="text-white"><i class="fas fa-chart-line fa-fw" style="font-size:25px"></i></a></span>
                                            </div>
                                        </div>
                                </div>
                                <div class="ms-auto h1 pt-1 text-white">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="card" style="background-color: #152238;">
                        <div class="card-content">
                            <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                        <h6 class="danger text-white">Sensor 3</h6>
                                        <div class="row">
                                        <div class="col-md-4">
                                                    <span class="" style="color:white;"><a href="pdf.php?sensor=sensor3" data-lity class="text-white"><i class="fa-solid fa-file-pdf" style="font-size:25px"></i></a></span>
                                            </div>
                                            <div class="col-md-4">
                                                    <span class="" style="color:white;"><a href="csv.php?sensor=sensor3" data-lity class="text-white"><i class="fa-solid fa-file-csv" style="font-size:25px"></i></a></span>
                                            </div>
                                            <div class="col-md-4">
                                            <span class="" style="color:white;"><a href="graphs.php?sensor=sensor3" data-lity class="text-white"><i class="fas fa-chart-line fa-fw" style="font-size:25px"></i></a></span>
                                            </div>
                                        </div>   
                                </div>
                                <div class="ms-auto h1 pt-1 text-white">
                                        <i class="fas fa-temperature-high"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
 
     
  </div>   
  
</main> 
        <script src="./lity/lity/dist/lity.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
</body>
</html>d
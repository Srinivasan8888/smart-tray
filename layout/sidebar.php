
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;1,300;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />


    <title>Dashboard</title>
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script>
</head>
<body>
<header>
      
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark text-white">
        <center>
          <img src="./img/xyma-bg-white.png" class="my-3" width="60%"></img>
          <hr>
        </center>
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4 ">
            <a href="dashboard.php" class="list-group-item list-group-item-action py-3 px-3 bg-dark text-white ripple zoom">
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
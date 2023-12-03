<?php 

    session_start();

    require_once("function/helper.php");
    require_once("function/koneksi.php");


    $page  = isset($_GET['page']) ? ($_GET['page']) : false;
    
    if ( !isset($_SESSION["login"]) ) {
        header("location: " . BASE_URL);
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>

    <!-- css bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- css bootstrap -->

    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- icon bootstrap -->

    <!-- my css -->
    <link rel="stylesheet" href="assets/css/styleDashboard.css">
    <!-- my css -->

    <style>
        .card-body-icon {
            position: absolute;
            z-index: 0;
            opacity: .4;
            top: 15px;
            right: 10px;
            font-size: 100px;
        }
    </style>
</head>
<body>
    <a href="logout.php">Logout</a>

    <!--  navbar start -->
    <nav class="navbar navbar-expand-lg bg-warning fixed-top ">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | <b>UKM IT VERSE</b> </a>

            <div class="d-flex">
                <h4 class=""data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Massage"><i class="bi bi-envelope-fill"></i></h4>
                <h4 class="mx-3" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Notifikasi"><i class="bi bi-bell-fill"></i></h4>
                <h4 class="" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Log out"><a href="logout.php"><i class="bi bi-box-arrow-right"></i></a></h4>
            </div>
        </div>
    </nav>
    <!--  navbar end -->

    
    <div class="row g-0 mt-4 position-relative">
        <!-- side navbar start -->
        <div class="col-md-2 bg-dark top-side-bar position-fixed z-1">
            <ul class="nav flex-column ml-3 mb-5 px-3">
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" aria-current="page" href="dashboardAdmin.php?page=admin"><i class="bi bi-speedometer2 me-3"></i>DASHBOARD</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=webadvanced"><i class="bi bi-backpack4-fill me-3"></i>WEB ADVANCED</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=webbeginer"><i class="bi bi-backpack3-fill me-3"></i>WEB BEGINER</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=cybersecurity"><i class="bi bi-incognito me-3"></i>CYBER SECURITY</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=multimedia"><i class="bi bi-pen-fill me-3"></i>MULTIMEDIA</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=uidesign"><i class="bi bi-pencil-square me-3"></i>UI/UX DESIGN</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=datascience"><i class="bi bi-pencil-square me-3"></i>DATA SCIENCE</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardAdmin.php?page=manager"><i class="bi bi-award-fill me-3"></i>PRODUCT MANAGER</a>
                </li>
            </ul>
        </div>
        <!-- side navbar end -->

        <div class=" mt-2 py-5 px-1">
            <div class="container-side-right">
                <?php 
                    $filename = "page/$page.php";

                    if (file_exists($filename)) {
                        include_once($filename);
                    } else {
                        echo "404";
                    }
                ?>
            </div>
        </div>
    </div>


    <!-- footer start -->
        <footer>
            
        </footer>
    <!-- footer end -->


    <!-- script bootsrap -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- script bootsrap -->

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="assets/js/script.js"></script>
    
</body>
</html>
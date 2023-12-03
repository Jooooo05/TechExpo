<?php 
    session_start();

    require_once("function/helper.php");
    require_once("function/koneksi.php");

    $dataUser = $_SESSION["user_data"];

    $page  = isset($_GET['page']) ? ($_GET['page']) : false;

    // if ( !isset($_SESSION["login"]) ) {
    //     header("location: " . BASE_URL);
    //     exit();
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>

    <!-- css bootsrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- css bootsrap -->

    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- icon bootstrap -->

    <!-- my css -->
    <link rel="stylesheet" href="assets/css/styleDashboard.css">
    <!-- my css -->

    <style>
        .upper {
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    
        <!--  navbar start -->
        <nav class="navbar navbar-expand-lg bg-warning fixed-top ">
        <div class="container-fluid px-5">
            <a class="navbar-brand upper" href="#">SELAMAT DATANG <?php echo $dataUser['username']; ?> | <b>UKM IT VERSE</b> </a>

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
                    <a class="nav-link text-white" aria-current="page" href="dashboardUser.php?page=user"><i class="bi bi-speedometer2 me-3"></i>PROFILE USER</a>
                </li>
                <li class="nav-item border-bottom border-secondary mb-3 pb-3">
                    <a class="nav-link text-white" href="dashboardUser.php?page=datauser"><i class="bi bi-backpack4-fill me-3"></i>DATA USER</a>
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
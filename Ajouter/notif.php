<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 1;
        overflow-y: auto;
        padding-top: 56px;
        transition: all 0.5s ease;">

            <!-- Sidebar - Brand -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <span><img src="img/logo.png" alt="" style="height: 100px;
width: 98px;
padding: 8px;
margin-top: -106px;
margin-bottom: -41px;"></span></a>
            </li>

            <!-- Divider -->
         <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-home"></i>
                    <span style="font-size: 1rem;">Home</span></a>
            </li>
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item"  href="#tableau">
                <a class="nav-link" href="admin.php#tableau">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-size: 1rem;">Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
             <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php#don">
                    <i class="fas fa-hand-holding-heart"></i>
                    <span style="font-size: 1rem;">Donation management</span></a>
            </li>
             <hr class="sidebar-divider">
             <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php#user">
                    <i class="fas fa-users"></i>
                    <span style="font-size: 1rem;">User management</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="admin.php#stat">
                    <i class="fas fa-chart-line"></i>
                    <span style="font-size: 1rem;">Advanced statistics</span></a>
            </li>

    



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
 

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <?php

// Connexion à la base de données MySQL
include('connexion.php');

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupérer les alertes de la base de données
$sql = "SELECT * FROM alerts ORDER BY date DESC LIMIT 3";
$result = mysqli_query($conn, $sql);

// Afficher les alertes dans le menu déroulant
echo '<li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>';

// Afficher le nombre d'alertes non lues
if (mysqli_num_rows($result) > 0) {
    echo '<span class="badge badge-danger badge-counter">' . mysqli_num_rows($result) . '</span>';
} else {
    echo '<span class="badge badge-danger badge-counter">0</span>';
}

echo '</a>
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Alerts Center
        </h6>';

// Afficher les alertes individuelles
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["type"] == "primary") {
            $icon = "fas fa-file-alt text-white";
            $bg_color = "bg-primary";
        } elseif ($row["type"] == "success") {
            $icon = "fas fa-donate text-white";
            $bg_color = "bg-success";
        } elseif ($row["type"] == "warning") {
            $icon = "fas fa-exclamation-triangle text-white";
            $bg_color = "bg-warning";
        }
        echo '<a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle ' . $bg_color . '">
                        <i class="' . $icon . '"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">' . $row["date"] . '</div>
                    <span class="font-weight-bold">' . $row["message"] . '</span>
                </div>
            </a>';
    }
} else {
    echo '<a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <span class="font-weight-bold">No new alerts</span>
            </div>
        </a>';
}

// Afficher le lien pour afficher toutes les alertes
echo '<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
    </div>
</li>';

// Fermer la connexion à la base de données
mysqli_close($conn);

?>


                        <!-- Nav Item - Messages -->
                        <?php
// Connexion à la base de données MySQL
include('connexion.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Requête pour récupérer les messages de la base de données
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);

// Affichage des messages dans un élément de la barre de navigation
echo '<li class="nav-item dropdown no-arrow mx-1">';
echo '<a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<i class="fas fa-envelope fa-fw"></i>';
echo '<span class="badge badge-danger badge-counter">'.mysqli_num_rows($result).'</span>';
echo '</a>';
echo '<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">';
echo '<h6 class="dropdown-header">Message Center</h6>';
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<a class="dropdown-item d-flex align-items-center" href="#">';
        echo '<div class="dropdown-list-image mr-3">';
        echo '<img class="rounded-circle" src="img/undraw_profile.svg" alt="...">';
        echo '<div class="status-indicator bg-success"></div>';
        echo '</div>';
        echo '<div class="font-weight-bold">';
        echo '<div class="text-truncate">'.$row["message"].'</div>';
        echo '<div class="small text-gray-500">'.$row["sender"].' · '.$row["time_sent"].'</div>';
        echo '</div>';
        echo '</a>';
    }
} else {
    echo '<a class="dropdown-item text-center small text-gray-500" href="#">No messages</a>';
}
echo '<a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>';
echo '</div>';
echo '</li>';

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <?php
// Connexion à la base de données MySQL
include('connexion.php');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupération des informations de l'utilisateur depuis la base de données
$sql = "SELECT * FROM users WHERE id = 1"; // Remplacez "1" par l'ID de l'utilisateur souhaité
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Affichage des informations de l'utilisateur dans la barre de navigation
echo '<li class="nav-item dropdown no-arrow">';
echo '<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
echo '<span class="mr-2 d-none d-lg-inline text-gray-600 small">'.$user["name"].'</span>';
echo '<img class="img-profile rounded-circle" src="img/undraw_profile.svg">';
echo '</a>';
echo '<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">';
echo '<a class="dropdown-item" href="profile.php">';
echo '<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>';
echo 'Profile';
echo '</a>';
echo '<div class="dropdown-divider"></div>';
echo '<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">';
echo '<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>';
echo 'Logout';
echo '</a>';
echo '</div>';
echo '</li>';

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>


                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div>
                <h2  style="margin-left: 220px; text-align: center;">
    Alerts Center
</h2>
                <?php
// Connexion à la base de données MySQL
include('connexion.php');

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Récupérer les alertes de la base de données
$sql = "SELECT * FROM alerts ORDER BY date DESC LIMIT 3";
$result = mysqli_query($conn, $sql);

// Afficher les alertes dans le menu déroulant

// Afficher le nombre d'alertes non lues
if (mysqli_num_rows($result) > 0) {
    echo '<span class="badge badge-danger badge-counter">' . mysqli_num_rows($result) . '</span>';
} else {
    echo '<span class="badge badge-danger badge-counter">0</span>';
}


// Afficher les alertes individuelles
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["type"] == "primary") {
            $icon = "fas fa-file-alt text-white";
            $bg_color = "bg-primary";
        } elseif ($row["type"] == "success") {
            $icon = "fas fa-donate text-white";
            $bg_color = "bg-success";
        } elseif ($row["type"] == "warning") {
            $icon = "fas fa-exclamation-triangle text-white";
            $bg_color = "bg-warning";
        }
        echo '<a class="dropdown-item d-flex align-items-center" href="#" style="margin-left: 216px;">
                <div class="mr-3">
                    <div class="icon-circle ' . $bg_color . '">
                        <i class="' . $icon . '"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">' . $row["date"] . '</div>
                    <span class="font-weight-bold">' . $row["message"] . '</span>
                </div>
            </a>';
    }
} else {
    echo '<a class="dropdown-item d-flex align-items-center" href="#" style="margin-left: 216px;">
            <div class="mr-3">
                <div class="icon-circle bg-primary">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <span class="font-weight-bold">No new alerts</span>
            </div>
        </a>';
}


// Fermer la connexion à la base de données
mysqli_close($conn);

?>
                </div>
            
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>@All Right reserved 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
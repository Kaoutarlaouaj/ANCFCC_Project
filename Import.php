<?php
    session_start(); 
    if(!isset($_SESSION['monlogin'])) header('location: logout.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Téléchargement des fichiers</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <!-- Inclure les fichiers CSS et JavaScript de Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


</head>

<body>
   <header>
      
       <nav id="menu-jk">
           <div class="container">
               <div class="row">
                   <div class="col-md-3 logo col-sm-12">
                     <a href="index.php"><img src="assets/images/logo.jpg" alt="" style="margin-left: -83px;"></a> 
                        <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                   </div>
                   <div id="menu" class="col-md-9 d-none d-md-block">
                       <ul>
                            <!--<li><a class="js-scroll-trigger" href="#">Accueil</a></li> -->
                            <li><a class="js-scroll-trigger" href="index.php#distraction">Distraction</a></li>
                            <li><a class="js-scroll-trigger" href="index.php#echange">Echange</a></li>
                            <li><a class="js-scroll-trigger" href="index.php#acquisition">Acquisition</a></li>
                            <li><a class="js-scroll-trigger" href="logout.php">Deconnexion</a></li>
                        </ul>
                   </div>
               </div>
           </div>
       </nav>
   </header>
         
  <!-- ################# Slider Starts Here#######################--->
   <!--
    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/slider/slide-02.jpg" alt="First slide">
<!--
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class=" bounceInDown">Best Free Hospital Template</h5>
                        <p class=" bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class=" vbh">

                            <div class="btn btn-success  bounceInUp"> Book Appointment </div>
                            <div class="btn btn-success  bounceInUp"> Contact US </div>
                        </div>
                    </div>
-->
<!--
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="assets/images/slider/slide-03.jpg" alt="Third slide">
<!--
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class=" bounceInDown">Best Free Hospital Template</h5>
                        <p class=" bounceInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam justo neque, <br>
                            aliquet sit amet elementum vel, vehicula eget eros. Vivamus arcu metus, mattis <br>
                            sed sagittis at, sagittis quis neque. Praesent.</p>

                        <div class=" vbh">

                            <div class="btn btn-success  bounceInUp"> Book Appointment </div>
                            <div class="btn btn-success  bounceInUp"> Contact US </div>
                        </div>
                    </div>
-->
<!--
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
     -->    
     <br>
         <br>
         <br>
         <br>
         <br>
     <section>
     <?php
// Connexion à la base de données (remplacez les informations par celles de votre configuration)
include('connexion.php');
// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des fichiers importés à partir de la base de données
$sql = "SELECT * FROM fichiers_importes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les fichiers importés
    echo "<h2 style=\"text-align: center;\">Fichiers importés :</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li style=\"text-align: center;margin-bottom: 10px;\"><a href='uploads/" . $row["nom_fichier"] . "' download>" . $row["nom_fichier"] . "</a></li>";
    }
    echo "</ul>";
} else {
    echo "Aucun fichier importé.";
}

$conn->close();
?>
     </section>
 
   
         
  <!-- ################# Distraction Starts Here #######################--->
         
 
  <footer style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 about">
                <h2>About Us</h2>
                <p>Phasellus scelerisque ornare nisl sit amet pulvinar. Nunc non scelerisque augue. Proin et sollicitudin velit. </p>
                
                <div class="foot-address">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="addet">
                        BlueDart
                        Marthandam (K.K District)
                        Tamil Nadu, IND 
                    </div>
                </div>
                <div class="foot-address">
                    <div class="icon">
                        <i class="far fa-envelope-open"></i>
                    </div>
                    <div class="addet">
                        info@smarteyeapps.com <br>
                        sales@smarteyeapps.com
                    </div>
                </div>
                <div class="foot-address">
                    <div class="icon">
                         <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div class="addet">
                        +23 323 43434 <br>
                        +1 3232 434 55
                    </div>
                </div>
            </div>
            <div class="col-md-3 fotblog">
                <h2>From latest Blog</h2>
                <div class="blohjb">
                    <p>dignissim. Integer tempor facilisis malesuada. Proin ac varius velit, tincidunt condimentum</p>
                    <span>22-1-2019</span>
                </div>
                <div class="blohjb">
                    <p>dignissim. Integer tempor facilisis malesuada. Proin ac varius velit, tincidunt condimentum</p>
                    <span>22-1-2019</span>
                </div>
                <div class="blohjb">
                    <p>dignissim. Integer tempor facilisis malesuada. Proin ac varius velit, tincidunt condimentum</p>
                    <span>22-1-2019</span>
                </div>
            </div>
            <div class="col-md-3 glink">
                <ul>
                    <li><a href="index.html"><i class="fas fa-angle-double-right"></i>Home</a></li>
                    <li><a href="about_us.html"><i class="fas fa-angle-double-right"></i>About Us</a></li>
                    <li><a href="services.html"><i class="fas fa-angle-double-right"></i>Services</a></li>
                    <li><a href="blog.html"><i class="fas fa-angle-double-right"></i>Blog</a></li>
                    <li><a href="pricing.html"><i class="fas fa-angle-double-right"></i>Gallery</a></li>
                    <li><a href="contact_us.html"><i class="fas fa-angle-double-right"></i>Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-3 tags">
                <h2>Easy Tags</h2>
                <ul>
                    <li>Finance</li>
                    <li>Web Design</li>
                    <li>Internet Pro</li>
                    <li>Node Js</li>
                    <li>Java Swing</li>
                    <li>Angular Js</li>
                    <li>Vue Js</li>
                </ul>
            </div>
        </div>
    </div>
</footer>     
 
         
               
      
    





</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/slider/js/owl.carousel.min.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>

<script src="assets/js/script.js"></script>



</html>
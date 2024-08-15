<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/assets2/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/assets2/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/assets2/css/style.css" rel="stylesheet">

    <title>Page Login</title>
  </head>
  <body>
    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="assets/images/logo.jpg" style="border-radius: 10px;">
                </div>
                <form method="post">
                <div class="form-group">
                  <input type="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
                </div>



                <div class="form-group">
                 <button type="submit" class="btn _btn_04" style="background:#2F584A;" name="login">Login</button>
                 </div>
                 </form>

                <div class="form-group pt-0">
                  <div class="_social_04">
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
           // include("connexion.php");
           // $sql = "SELECT * FROM users WHERE email = '$email'";
            //$result = mysqli_query($conn, $sql);
            //$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            //if ($user) {
                if ($password=='admin123') {
                    if($email=='admin@gmail.com')
                    {
                        session_start();
                        $_SESSION['monlogin'] = $email;
                        header("Location: Ajouter/ajouter_formulaire.php");
                        die();
                    }
                    else{
                      echo "<div class='alert alert-danger'>Adresse email non trouvée</div>";
                  }
                    
                }
                else{
                    echo "<div class='alert alert-danger'>Mot de passe incorrect</div>";
                }
            }
        //}
        ?>

  </body>
</html>
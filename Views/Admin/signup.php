<?php

require_once 'function.php';
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(valideArray($_POST,['email','username','password'])){
        extract($_POST);
        $email = strip_tags($email);
         $emailverify = $bd->query("SELECT * FROM users WHERE email = '$email'")->rowCount();
         if($emailverify === 0 ){
            $password = strip_tags($password);
            $password = password_hash($password,PASSWORD_BCRYPT);
            $req = $bd->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
            $insert = $req->execute([$username,$email,$password]);
            if($insert){
                session_start();
                $_SESSION['message']='inscription réussi';
              header('location:login.php');
            }
         }else{
            $err = "email existe déja";

         }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Admin PortoDelice</title>

   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>
    <link rel="icon" href="../Home/img/logo1.png" >
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img src="./assets/images/logo0.png" alt="">
                    </div>
                    <?php if(isset($err)):?>
                    <p class="alert alert-danger"><?=$err?></p>
                    <?php endif; ?>

                    <h3 class="mb-4">Admin Sign up</h3>
                    <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                           
                        </div>
                    </div>
                    <button class="btn btn-primary shadow-2 mb-4">Sign up</button>
                    <p class="mb-0 text-muted">Allready have an account? <a href="login.php"> Log in</a></p>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>


<?php
session_start();
//var_dump($_SESSION);
if (isset($_SESSION['panier']['id'])) {
   $panier = explode(' |',$_SESSION['panier']['id']);
   $totalArticle = count($panier) - 1;
  // var_dump($panier);
}else{
    $totalArticle = 0;
}
?>

<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <title>PortoDelice</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="icon" href="./img/logo1.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/templatemo_style.css">
        <link rel="stylesheet" href="css/templatemo_misc.css">
        <link rel="stylesheet" href="css/flexslider.css">
        <link rel="stylesheet" href="css/testimonails-slider.css">
        <script src="https://cdn.kkiapay.me/k.js"></script>
        <script src="js/vendor/modernizr-2.6.1-respond-1.1.0.min.js"></script>
    </head>
    <body>
     

            <header>
                <div id="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="home-account">
                                    <a href="#">Home</a>
                                    <a href="#">My account</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cart-info">
                                    <i class="fa fa-shopping-cart"></i>
                                    (<a href="listepanier.php"> <?=$totalArticle?> repas</a>) dans votre panier 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="main-header">
                    <div class="container">
                        <div class="row" style="display: flex;justify-content: space-between;">
                            <div class="col-md-3">
                                <div class="logo">
                                    <a href="#" style="width: 40px;height: 40px;"><img src="img/logo1.png"  ></a>
                                </div>
                            </div>
                            <div class="col-md-6d">
                                <div class="main-menu">
                                    <ul>
                                        <li><a href="index.php">Acceuil</a></li>
                                        <li><a href="about-us.php">A Propos de nous</a></li>
                                        <li><a href="products.php">Nos repas</a></li>
                                        <li><a href="contact-us.php">Nous contactez</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- <div class="col-md-3" style="display: none;">
                                <div class="search-box">  
                                    <form name="search_form" method="get" class="search_form">
                                        <input id="search" type="text" />
                                        <input type="submit" id="search-button" />
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </header>
            

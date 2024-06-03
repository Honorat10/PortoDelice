<?php
// session_start();
// var_dump($_SESSION);
require_once 'header.php';
require_once 'config.php';
 $compte = ceil(($bd->query("SELECT * FROM plat")->rowCount())/8);
if (!isset($_GET['page']) || $_GET['page'] == 1 ) {

  $data = $bd->query("SELECT * FROM plat limit 8")->fetchAll();
}elseif ($_GET['page'] == 2 ){
    extract($_GET);
  $offset = ($page * 8)-8;
  $data = $bd->query("SELECT * FROM plat limit 8 offset $offset ")->fetchAll();
}

$categorie =  $bd->query("SELECT * FROM categorie")->fetchAll();
?>
    <body>
 


            <div id="heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-content">
                                <h2>Nos repas</h2>
                                <span>Acceuil / <a href="about-us.html">Nos repas</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            <div id="products-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="product-heading">
                                <h2>Notre Catalogue</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="filters col-md-12 col-xs-12">
                            <ul id="filters" class="clearfix">
                                <li><span class="filter" data-filter="all">Tout</span></li>
                                <?php foreach($categorie as $cat): ?>
                                <li><span class="filter" data-filter=".<?=$cat->id?>"><?=$cat->nom?></span></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row" id="Container">
                    <?php foreach($data as $plat): ?>
                      <div class="col-md-3 col-sm-6 mix portfolio-item <?=$plat->categorie_id?>">       
                            <div class="portfolio-wrapper">                
                                <div class="portfolio-thumb">
                                    <img style="width: 100%;height: 200px;" src="<?=$plat->miniature?>" alt=""/>
                                    <div class="hover">
                                        <div class="hover-iner">
                                            
                                            <a class="fancybox" href="./panier.php?id=<?=$plat->id?>"><img src="img/open-icon.png" alt="" /></a>
                                          
                                            <span>Ajouter au panier</span>
                                        </div>
                                    </div>
                                </div>  
                                <div class="label-text">
                                    <h3><a href="single-post.html"><?=$plat->nom?></a></h3>
                                    <span class="text-category">XOF  <?=$plat->prix?></span>
                                </div>
                            </div> 
                        </div>
                      <?php endforeach ?>

      
                    
                    </div>
                    <div class="pagination">
                        <div class="row">   
                            <div class="col-md-12">
                                <ul>
                                	<?php for ($i=1; $i <= $compte; $i++): 
                                    ?>
                                    <li ><a style="background-color: <?php if($page == $i)
                                     echo 'orange'  ?>;" href="products.php?page=<?=$i?>"><?=$i?></a></li>
                                    <?php endfor 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>

             <center> <a style="background-color: orange; color: white; border: 1px solid;padding:10px 15px; text-decoration: none; " href="./listepanier.php">Voire mes commandes</a></center>

			

            <?php
require_once 'footer.php';
?>

    </body>
</html>
<?php
require './config.php';
require './function.php';
require 'header.php';
$prix = 0;
$platcommander = null;
if(isset($_SESSION['panier']['id'])){

    $all = explode('|',$_SESSION['panier']['id']);
    
}

?>
          

            <div id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                           
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                       
                    <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Nom</th>
                                                            <th>Quantité</th>
                                                            <th>Prix</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <form action="" method="post">
                                                        <button type="submit" style="padding: 10px 15px; background: orange; color: white ; border:none; border-radius: 6px; ">Valider Mon Panier</button>
                                                    <tbody>
                                                    <?php if (isset($all)) {
                                                      
                                                   
                                                    foreach($all as $key => $value):?>        
                                                    <?php $id = str_replace(" ","",$all[$key]);
                                                   $data = $bd->query("SELECT * FROM plat where id = '$id'")->fetchAll();
                                                   foreach($data as $commmande):
                                                    ?>        
                                                <tr><th><?=$commmande->nom?></th>
                                                <th><input type="number" name="q<?=$id?>" id="" placeholder="1"  style="width: 100px;"></th>

                                                            <th><?=$commmande->prix?></th>
                                                            <td style="display: flex; justify-content:space-between">
                                                                <!-- <a href="./process.php?val=<?=$id?>"  style="display:<?php if(isset($_GET['display']) && ($_GET['display'] == $id))  echo 'none' ?>;color: white; background-color: green; padding: 5px 10px;border-radius: 5px">Valider</a> -->
                                                              
                                                                <a href="./process.php?id=<?=$id?>"  style="color: white; background-color: red; padding: 5px 10px;border-radius: 5px">Annuler</a>
                                                        <?php  $prix += $commmande->prix ?>
                                                        <?php $platcommander .= '|'.$commmande->nom ?>
                                                            </td> </tr>
                                                                              
                                                    <?php endforeach?> 
                                                          
                                                    <?php endforeach;  }?>   
                                                   
                                                    </tbody>
                                                </table>
                                                </form>
                                                <?php
                                                    if($_SERVER['REQUEST_METHOD']  === 'POST')
                                                  
                                                    {    echo  '
                                                                <button style ="color:white" class="btn btn-primary"  > <kkiapay-widget  amount="' . $prix  .' " sandbox="true" key="fb096b50d0c411ee92ac1b45c4da752c"
                                                                callback="http://localhost/PortoDelice/Views/Home/index.php" /> </button>
                                                            ';}
                                                 ?>
                                                <?php
                                                $_SESSION['panier']['prix'] = $prix;
                                                $_SESSION['panier']['plat'] = $platcommander;
                                                ?>
                                             
                    </div>
                </div>
            </div>





           
                        
                      


          

			
            <?php
require_once 'footer.php';
?>
    </body>
</html>
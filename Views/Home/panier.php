<?php
require 'header.php';
require 'config.php';
if (isset($_GET['id']) && !empty($_GET['id'])) {
    extract($_GET);
  $data = $bd->query("SELECT * FROM plat WHERE id = $id")->fetch();
}
if ($_SERVER['REQUEST_METHOD'] === "POST") {
     if (isset($_SESSION['panier']['id'])) {
        $all = explode('|',$_SESSION['panier']['id']);
        if(!in_array($id,$all)){

            $_SESSION['panier']['id'] .= '|'.$id.' ';
            header('location:products.php');
        }else{
            header('location:products.php');

        }
    }else{
       $_SESSION['panier']['id'] = '|'.$id.' ';
        //header('location:form.php');
   }
}
?>
    <body>
      



         


            <div id="product-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Ajouter au panier</h2>
                                <img src="images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div id="contact-us">
                        <div class="container">
                            <div class="row">
                                <div class="row">
                                                 <form action="" method="post">
                                                 <div class="col-md-12">
                                                    <center>   <img style="display: grid; place-content: center; width: 75%;height: 500px;" src="<?=$data->image?>" alt="">
                                                    <p><?=$data->description?></p>
                                                    </center>
                                                    </div>
                                                </div>
                                                   <div class="row">
                                                     <div class="send  col-md-12">
                                                         <button type="submit" style="width:100%" >AJOUTER AU PANIER</button>
                                                     </div>
                                                   </div>
                                               </div>
                                                 </form>
                                                   
                                                                           
                                             
                                            
                                        </div>
                                          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                      
                </div>
            </div>


           

    
     

            <?php
require_once 'footer.php';
?>
    
     
    </body>
</html>
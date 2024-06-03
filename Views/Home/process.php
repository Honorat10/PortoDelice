<?php
require './config.php';
require './function.php';
session_start();
if(isset($_GET['id'])){
        extract($_GET);
        $_SESSION['panier'] = str_replace('|'.$id,'',$_SESSION['panier']);
        header('location:./listepanier.php');
}
// $nom =  $_SESSION['client'];
// $addresse =  $_SESSION['addresse'];
// $num =  $_SESSION['numero'];
// $prix = $_SESSION['panier']['prix'];
// $plat = $_SESSION['panier']['plat'];
//         $commande = $bd->prepare("INSERT INTO commande (plat,prix,nom,adresse,numero) VALUES(?,?,?,?,?)");
//         $commande->execute([$plat,$prix,$nom,$addresse,$num]);
//         $_SESSION['panier']['id'] = "";
//         //swowAlert('commande enrégistrer','success','listepanier.php');
//         header('location:listepanier.php');

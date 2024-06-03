<?php

function createclient(){
  
require_once 'header.php';
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['numero']) && !empty($_POST['numero']) && isset($_POST['addresse']) && !empty($_POST['addresse']))
    extract($_POST);
    $_SESSION['client'] = $name;
    $_SESSION['numero'] = $numero;
    $_SESSION['addresse'] = $addresse;
    header('location:./listepanier.php');
}

}
function showBasket(){
    session_start();
if(isset($_SESSION['panier']['id'])){

    $all = explode(' |',$_SESSION['panier']['id']);
    
}
}

<?php
namespace PortoDelice\Controllers;
class HomeController extends Controller{
    public function index(){
        header('location:Views/Home/index.php');
    }
}
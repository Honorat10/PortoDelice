<?php
namespace PortoDelice\Main;
use PortoDelice\Autoloader;
use  PortoDelice\Controllers\HomeController;
class Main{
    public function start(){
        $url = $_SERVER['REQUEST_URI'];
        if(!empty($url) && $url !='/PortoDelice/' && $url[-1] === "/"){
           $url = substr($url,0,-1);
           http_response_code(301);
           header('location: '.$url); 
        }
        if (isset($_GET['p'])) {
           $params = explode('/',$_GET['p']);
        }
        if ($params[0] != '') {
          $controller = '\\PortoDelice\\Controllers\\'.ucfirst(array_shift($params)).'Controller';
          if(!class_exists($controller,Autoloader::autoload($controller))){
              http_response_code(404);
              require_once 'Views/404.html';
            }else {
            $controller = new $controller;
          }
          $action = (isset($params[0])) ? array_shift($params) : 'index' ;
          if (!method_exists($controller,$action)) {
            http_response_code(404);
              require_once 'Views/404.html';
          }
        }else {
            $controller = new HomeController;
            $controller->index();
        }
    }
}
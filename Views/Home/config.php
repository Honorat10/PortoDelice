<?php
namespace PortoDelice\Views\Home;
use PDO;
$bd = new PDO('mysql:dbname=restaurant;host=localhost','root','');
$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$bd->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
$bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>
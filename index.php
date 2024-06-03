<?php
namespace PortoDelice;
use PortoDelice\Models\Model;
use PortoDelice\Main\Main;
define ('ROOT',__DIR__);
require_once ROOT.'/Autoloader.php';
Autoloader::register();
$main = new Main;
$main->start();

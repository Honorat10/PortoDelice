<?php
$bd = new PDO('mysql:dbname=restaurant;host=127.0.0.1','root','');
$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
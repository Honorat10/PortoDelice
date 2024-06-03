<?php
namespace PortoDelice\Main;
use PDO;
use PDOException;
class Database extends PDO{
   private static $instance;

   private const HOST ='127.0.0.1';
   private const USER ='root';
   private const DBNAME ='restaurant';
   private const PASS ='';

   public function __construct(){
    $dns='mysql:dbname='.self::DBNAME.';host='.self::HOST;
    try {
        parent::__construct($dns,self::USER,self::PASS);
        $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $this->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
   }
   public static function getInstance(){
    if (self::$instance === null) {
        self::$instance = new self();
    }
    return self::$instance;
   }
}
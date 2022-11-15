<?php


ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();

//unset($_SESSION['products'][9]);
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
//die();


define('ROOT', dirname(__FILE__));// я использую полный  путь из файл на диске(подключение ROOt)
require_once (ROOT. '/application/components/Autoload.php');
//require_once (ROOT. '/application/components/Router.php');
//require_once (ROOT. '/application/components/Db.php');




$router = new Router(); // 'Class Router
$router->run(); // method run'





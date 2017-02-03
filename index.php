<?php

//FRONT CONTROLLER
//Общие настройки

session_start();

//Подключение файлов к системе
define('ROOT', dirname(__FILE__));
require_once ROOT . '/components/Autoload.php';

//Вызов Router
$router = new Router();
$router->run();

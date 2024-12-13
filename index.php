<?php

require_once("config.php");
require_once("vendor/autoload.php");

$controller = new Controller\LoginController();
if (isset($_SESSION['usuario'])) {
    $controller->fazerLogin();
} else {
    $controller->login();
}

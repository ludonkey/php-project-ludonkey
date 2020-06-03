<?php

use Entity\Code;
use Entity\User;
use Entity\Language;
use ludk\Persistence\ORM;
use Controller\AuthController;
use Controller\HomeController;
use Controller\ContentController;

require __DIR__ . '/../vendor/autoload.php';

session_start();

$orm = new ORM(__DIR__ . '/../Resources');
$manager = $orm->getManager();
$userRepo = $orm->getRepository(User::class);
$codeRepo = $orm->getRepository(Code::class);
$languageRepo = $orm->getRepository(Language::class);

$action = $_GET["action"] ?? "display";
switch ($action) {
    case 'register':
        $controller = new AuthController();
        $controller->register();
        break;

    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;

    case 'login':
        $controller = new AuthController();
        $controller->login();
        break;

    case 'new':
        $controller = new ContentController();
        $controller->create();
        break;

    case 'display':
    default:
        $controller = new HomeController();
        $controller->display();
        break;
}

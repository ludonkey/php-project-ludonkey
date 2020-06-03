<?php

use ludk\Persistence\ORM;
use Entity\Code;
use Entity\Language;
use Entity\User;

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
        break;
    case 'logout':
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location:/?action=display');
        break;

    case 'login':
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $users = $userRepo->findBy(array("nickname" => $_POST['username'], "password" => $_POST['password']));
            if (count($users) == 1) {
                $_SESSION['user'] = $users[0];
                header('Location:/?action=display');
            } else {
                $errorMsg = "Wrong login and/or password.";
                include "../templates/login.php";
            }
        } else {
            include "../templates/login.php";
        }
        break;
    case 'new':
        break;
    case 'display':
    default:
        $items = array();
        if (isset($_GET['search'])) {
            $strToSearch = $_GET['search'];
            if (strpos($strToSearch, "#") === 0) {
                $languageName = substr($strToSearch, 1);
                $languages = $languageRepo->findBy(array("name" => $languageName));
                if (count($languages) == 1) {
                    $items = $codeRepo->findBy(array("language" => $languages[0]->id));
                }
            } else if (strpos($strToSearch, "@") === 0) {
                $userName = substr($strToSearch, 1);
                $users = $userRepo->findBy(array("nickname" => $userName));
                if (count($users) == 1) {
                    $items = $codeRepo->findBy(array("user" => $users[0]->id));
                }
            } else {
                $items = $codeRepo->findBy(array("content" => $strToSearch));
            }
        } else {
            $items = $codeRepo->findAll();
        }
        include "../templates/display.php";
        break;
}

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
        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetype'])) {
            $errorMsg = NULL;
            $users = $userRepo->findBy(array("nickname" => $_POST['username']));
            if (count($users) > 0) {
                $errorMsg = "Nickname already used.";
            } else if ($_POST['password'] != $_POST['passwordRetype']) {
                $errorMsg = "Passwords are not the same.";
            } else if (strlen(trim($_POST['password'])) < 8) {
                $errorMsg = "Your password should have at least 8 characters.";
            } else if (strlen(trim($_POST['username'])) < 4) {
                $errorMsg = "Your nickame should have at least 4 characters.";
            }
            if ($errorMsg) {
                include "../templates/register.php";
            } else {
                $newUser = new User();
                $newUser->nickname = $_POST['username'];
                $newUser->password = $_POST['password'];
                $manager->persist($newUser);
                $manager->flush();
                $_SESSION['user'] = $newUser;
                header('Location:/?action=display');
            }
        } else {
            include "../templates/register.php";
        }
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
        if (!isset($_SESSION['user'])) {
            header('Location:/?action=display');
        } else {
            $languages = $languageRepo->findAll();
            if (
                isset($_POST['language']) && isset($_POST['title'])
                && isset($_POST['description']) && isset($_POST['content'])
            ) {
                $errorMsg = NULL;
                if ($_POST['language'] == "0") {
                    $errorMsg = "Choose a language.";
                } else if (empty($_POST['title'])) {
                    $errorMsg = "Put a title.";
                } else if (empty($_POST['description'])) {
                    $errorMsg = "Put a description.";
                } else if (empty($_POST['content'])) {
                    $errorMsg = "Put a content.";
                }
                if ($errorMsg) {
                    include "../templates/new.php";
                } else {
                    $lang = $languageRepo->find($_POST['language']);
                    $newCode = new Code();
                    $newCode->title = $_POST['title'];
                    $newCode->description = $_POST['description'];
                    $newCode->content = $_POST['content'];
                    $newCode->creationDate = time();
                    $newCode->language = $lang;
                    $newCode->user = $_SESSION['user'];
                    $manager->persist($newCode);
                    $manager->flush();
                    header('Location:/?action=display');
                }
            } else {
                include "../templates/new.php";
            }
        }
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

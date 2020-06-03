<?php

namespace Controller;

use Entity\User;

class AuthController
{
    public function login()
    {
        global $userRepo;
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
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        header('Location:/?action=display');
    }

    public function register()
    {
        global $userRepo;
        global $manager;
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
    }
}

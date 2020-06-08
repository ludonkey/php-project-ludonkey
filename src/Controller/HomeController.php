<?php

namespace Controller;

class HomeController
{
    public function display()
    {
        global $languageRepo;
        global $codeRepo;
        global $userRepo;
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
                $items = $codeRepo->findBy(array("content" => "%$strToSearch%"));
            }
        } else {
            $items = $codeRepo->findAll();
        }
        include "../templates/display.php";
    }
}

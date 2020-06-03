<?php

namespace Controller;

use Entity\Code;

class ContentController
{
    public function create()
    {
        global $languageRepo;
        global $manager;

        if (!isset($_SESSION['user'])) {
            header('Location:/display');
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
                    header('Location:/display');
                }
            } else {
                include "../templates/new.php";
            }
        }
    }
}

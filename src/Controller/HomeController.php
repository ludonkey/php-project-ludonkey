<?php

namespace Controller;

use Entity\Code;
use Entity\User;
use Entity\Language;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function display(Request $request): Response
    {
        $languageRepo = $this->getOrm()->getRepository(Language::class);
        $codeRepo = $this->getOrm()->getRepository(Code::class);
        $userRepo = $this->getOrm()->getRepository(User::class);

        $items = array();
        if ($request->query->has('search')) {
            $strToSearch = $request->query->get('search');
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
        $data = array(
            "isLogged" => $request->getSession()->has('user'),
            "items" => $items
        );
        return $this->render('display.php', $data);
    }
}

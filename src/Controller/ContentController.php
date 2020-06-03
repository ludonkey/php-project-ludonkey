<?php

namespace Controller;

use Entity\Code;
use Entity\Language;
use ludk\Http\Request;
use ludk\Http\Response;
use ludk\Controller\AbstractController;

class ContentController extends AbstractController
{
    public function create(Request $request): Response
    {
        $languageRepo = $this->getOrm()->getRepository(Language::class);
        $manager = $this->getOrm()->getManager();

        if (!$request->getSession()->has('user')) {
            return $this->redirectToRoute('display');
        } else {
            $languages = $languageRepo->findAll();
            if (
                $request->request->has('language') &&
                $request->request->has('title') &&
                $request->request->has('description') &&
                $request->request->has('content')
            ) {
                $errorMsg = NULL;
                if ($request->request->get('language') == "0") {
                    $errorMsg = "Choose a language.";
                } else if (empty($request->request->get('title'))) {
                    $errorMsg = "Put a title.";
                } else if (empty($request->request->get('description'))) {
                    $errorMsg = "Put a description.";
                } else if (empty($request->request->get('content'))) {
                    $errorMsg = "Put a content.";
                }
                if ($errorMsg) {
                    $data = array(
                        "errorMsg" => $errorMsg,
                        "languages" => $languages,
                        "language" => $request->request->get('language', ''),
                        "title" => $request->request->get('title', ''),
                        "description" => $request->request->get('description', ''),
                        "content" => $request->request->get('content', ''),
                        "isLogged" => $request->getSession()->has('user')
                    );
                    return $this->render('new.php', $data);
                } else {
                    $lang = $languageRepo->find($request->request->get('language'));
                    $newCode = new Code();
                    $newCode->title = $request->request->get('title');
                    $newCode->description = $request->request->get('description');
                    $newCode->content = $request->request->get('content');
                    $newCode->creationDate = time();
                    $newCode->language = $lang;
                    $newCode->user = $request->getSession()->get('user');
                    $manager->persist($newCode);
                    $manager->flush();
                    return $this->redirectToRoute('display');
                }
            } else {
                $data = array(
                    "languages" => $languages,
                    "language" => $request->request->get('language', ''),
                    "title" => $request->request->get('title', ''),
                    "description" => $request->request->get('description', ''),
                    "content" => $request->request->get('content', ''),
                    "isLogged" => $request->getSession()->has('user')
                );
                return $this->render('new.php', $data);
            }
        }
    }
}

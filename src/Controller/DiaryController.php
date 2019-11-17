<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * Trening diary controller
     * @Route("/login", name="")
     */
    class DiaryController extends AbstractController
    {
        /**
         * @Route("/{$slug}", name="app_homepage")
         */
        public function index() {

            

            return $this->render('diary/index.html.twig');
        }
    }
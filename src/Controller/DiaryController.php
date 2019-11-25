<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;

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

        /**
         * @Rest\Post("/{$slug}/new", name="app_new")
         */
        public function new() {
            
            return $this->render('diary/new.html.twig');
        }
    }
<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;

    /**
     * Trening menu controller
     * @Route("/login/{}/option", name="")
     */
    class MenuController extends AbstractController
    {

        /**
         * @Rest\Get("/", name="app_menu");
         */
        public function menu() {

            return new Response("hello");
        }
    }
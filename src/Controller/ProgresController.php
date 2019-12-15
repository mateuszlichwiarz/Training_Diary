<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;


     /**
     * Progres controller
     * @Route("/login/{}", name="")
     */
    class ProgresController extends AbstractController
    {
        /**
         * @Route("/progres/")
         */
        public function index()
        {
            return $this->render("progres/progres.html.twig");
        }
    }
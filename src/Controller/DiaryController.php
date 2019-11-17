<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    /**
     * Trening diary controller
     * @Route("/login", name="diary")
     */
    class DairyController extends AbstractController
    {
        /**
         * @Route("/{$slug}", name="_index")
         */
        public function index() {

        }
    }
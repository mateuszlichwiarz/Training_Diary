<?php

    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;

    /**
     * About webiste controller
     * @Route("/about", name="")
     */
    class AboutController extends AbstractController
    {
        /**
         * @Route("", name="app_about")
         */
        public function about()
        {
            return $this->render('about/about.html.twig');
        }
    }
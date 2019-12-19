<?php

    namespace App\Controller;

    use App\Entity\Progres;

    use App\Service\Time;

    use App\Service\ShowWorkouts;

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
         * @Route("/progres/{id}")
         */
        public function progres(ShowWorkouts $ShowWorkouts, $id)
        {   
            $user =$this->getUser();
            $userId = $user->getId();

            $time = new Time();
            $today = $time->getDay();
            $date = $time->getDate();
            $week = $time->getWeekArray();
            

            $workouts = $ShowWorkouts->getProgres($today, $date, $userId, $week, $id);

    
            return $this->render("progres/progres.html.twig", [
                'workouts' => $workouts,
            ]);
        }
    }
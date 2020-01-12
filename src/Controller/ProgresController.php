<?php

    namespace App\Controller;

    use App\Entity\Progres;
    use App\Entity\GeneralSettings;
    
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


            $settings = new GeneralSettings();
            $settings = $this->getDoctrine()->getRepository(GeneralSettings::class)->find($userId);

            print_r($settings);

            $workouts = $ShowWorkouts->getProgres($today, $date, $userId, $week, $id);

            $previousWeek = $id + 1;
            $forward = $id - 1;

            if($forward == -1){
                $forward = 0;
            }
            
            return $this->render("progres/progres.html.twig", [
                'workouts' => $workouts,
                'previous' => $previousWeek,
                'forward'  => $forward,
            ]);
        }
    }
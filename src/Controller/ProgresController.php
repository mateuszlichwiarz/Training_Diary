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
         * @Route("/progres/")
         */
        public function progres(ShowWorkouts $ShowWorkouts)
        {   

            $user =$this->getUser();
            $id = $user->getId();

            $time = new Time();
            $today = $time->getDay();
            $date = $time->getDate();
            $week = $time->getWeekArray();
            
            $titleDay = [];

            if($today == 'Monday'){

                foreach($week as $day)
                {
                    $workouts[$day] = $ShowWorkouts->getWorkoutsAll('1', $day, $id, $date);
                }
                
            }elseif($today == 'Thuesday'){

                foreach($week as $day)
                {
                    $workouts[] = $ShowWorkouts->getWorkoutsAll('2', $day, $id, $date);
                }
                
            }elseif($today == 'Wednesday'){

                foreach($week as $day)
                {
                    $titleDay[$day] = $day;
                    $workouts[$day] = $ShowWorkouts->getWorkoutsAll('3', $day, $id, $date);
                }

            }elseif($today == 'Thursday'){

                foreach($week as $day)
                {
                    $titleDay[$day] = $day;
                    $workouts[$day] = $ShowWorkouts->getWorkoutsAll('4', $day, $id, $date);
                }

            }elseif($today == 'Friday'){
               
                foreach($week as $day)
                {
                    $titleDay[$day] = $day;
                    $workouts[$day] = $ShowWorkouts->getWorkoutsAll('5', $day, $id, $date);
                }
                
            }elseif($today == 'Saturday'){
                
                foreach($week as $day)
                {
                    $titleDay[$day] = $day;
                    $workouts[$day] = $ShowWorkouts->getWorkoutsAll('6', $day, $id, $date);
                }

            }elseif($today == 'Sunday'){
                
                foreach($week as $day)
                {
                    $titleDay[$day] = $day;
                    $workouts[$day] = $ShowWorkouts->getWorkoutsAll('7', $day, $id, $date);
                }

            }
            
            

    
            return $this->render("progres/progres.html.twig", [
                'workouts' => $workouts,
            ]);
        }
    }
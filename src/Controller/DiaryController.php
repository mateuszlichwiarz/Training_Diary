<?php

    namespace App\Controller;

    use App\Entity\ProgramTraining;
    use App\Entity\User;
    use App\Entity\Progres;

    use App\Form\Type\NewType;

    use App\Service\Time;
    use App\Service\ShowWorkouts;

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
         * @Route("/{}", name="app_homepage")
         */
        public function index(Request $request, ShowWorkouts $ShowWorkouts) {

            $user = $this->getUser();
            $id = $user->getId();

            $homepageSettings = $user->getHomepagesettings();
            $daysEarlier = $homepageSettings->getDaysEarlier();

            $plan = $this->getDoctrine()->getRepository(ProgramTraining::class)->findOneBy(['user' => $id]);
            

            if($plan == true){

                $exercises = $plan->getExercises();

                $time = new Time();
                $day = $time->getDay();
                $date = $time->getDate();

                $workouts = $ShowWorkouts->getWorkouts($daysEarlier, $id, $date);
                

                $property = [];

                $something = [];

                $i = 0;

                $progres = $this->getDoctrine()->getRepository(Progres::class)->findBy(['user' => $id, 'day' => $day, 'date' => $date]);

                foreach($progres as $item3){

                    $something[$i] = $progres[$i]->getExercise();

                    $i++;
                }


                $property = (array_diff($exercises,$something));

                $property2 = [];

                while(current($property)){
                    array_push($property2, current($property));
                    next($property);
                }


                if(isset($_POST['exercise']) && isset($_POST['weight']) && isset($_POST['sets']) && isset($_POST['reps'])) {
                    
                        $weight =   $_POST['weight'];
                        $sets =     $_POST['sets'];
                        $reps =     $_POST['reps'];
                        $exercise = $_POST['exercise'];
                    
                    if($weight == true && $sets == true && $reps == true) {

                        $datetime = new Time();
                        $date = $datetime->getDate();
                        
                        $add = new Progres();
                        $add->setUser($id);
                        $add->setDay($day);
                        $add->setExercise($exercise);
                        $add->setWeight($weight);
                        $add->setSets($sets);
                        $add->setReps($reps);
                        $add->setDate($date);
                        $add->setTime($date);

                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($add);
                        $entityManager->flush();
                        
                        $message['correct'] = "You add exercise today progres, Excellent!";

                        $property = [];

                        $something = [];
            
                        $i = 0;
                        
                        $progres = $this->getDoctrine()->getRepository(Progres::class)->findBy(['user' => $id, 'day' => $day, 'date' => $date]);
            
                        foreach($progres as $item3){
            
                            $something[$i] = $progres[$i]->getExercise();
            
                            $i++;
                        }
            
            
                        $property = (array_diff($exercises,$something));
            
                        $property2 = [];
            
                        while(current($property)){
                            array_push($property2, current($property));
                            next($property);
                        }

                        $time = new Time();
                        $day = $time->getDay();
                        $date = $time->getDate();

                        $workouts = $ShowWorkouts->getWorkouts($daysEarlier, $id, $date);


                        return $this->render('diary/index.html.twig', [
                            'plan' => $plan,
                            'message' => $message,
                            'exercises' => $property2,
                            'progres' => $progres,
                            'workouts' => $workouts,
                            'homepageSettings' => $homepageSettings,
                            'day' => $day
                        ]);
                        

                    } else {

                        $message['error'] = "Please fill fields!";

                        return $this->render('diary/index.html.twig', [
                            'plan' => $plan,
                            'message' => $message,
                            'exercises' => $property2,
                            'progres' => $progres,
                            'workouts' => $workouts,
                            'homepageSettings' => $homepageSettings,
                            'day' => $day
                        ]);
                        

                    }

                    
                }

                return $this->render('diary/index.html.twig', [
                    'plan' => $plan,
                    'exercises' => $property2,
                    'somethings' => $something,
                    'day' => $day,
                    'progres' => $progres,
                    'workouts' => $workouts,
                    'homepageSettings' => $homepageSettings,
                ]);


            }else{
        
                
                $message['info'] = "Create your new workout, click here!";

                return $this->render('diary/index.html.twig', [
                    'plan' => $plan,
                    'message' => $message
                ]);
            
            }
        
        }

        /**
         * @Rest\Delete("/{}/{id}", name="app_delete_workout")
         */
        public function delete(Request $request, $id) {

            $time = new Time();
            $day = $time->getDay();

            $exercise = $this->getDoctrine()->getRepository(Progres::class)->findOneBy(['id' => $id,'day' => $day]);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($exercise);
            $entityManager->flush();

            $response = new Response();
            $response->send();

            return $this->redirect('/login/{}');
            
        }


        /**
         * @Rest\Post("/{}/new", name="app_new")
         */
        public function new(Request $request) {

            $user = $this->getUser();
            $id = $user->getId();

            $datetime = new Time();
            $date = $datetime->getDate();

            $plan = new ProgramTraining();
            $plan->setUser($id);
            $plan->setDate($date);
            $plan->setTime($date);

            $form = $this->createForm(NewType::class, $plan, [
                'method' => 'POST'
            ]);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $plan = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($plan);
                $entityManager->flush();

                return $this->Redirect('/login/{}');
            }

            return $this->render('diary/new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }
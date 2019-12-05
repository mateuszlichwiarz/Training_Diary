<?php

    namespace App\Controller;

    use App\Entity\ProgramTrening;
    use App\Entity\User;
    use App\Entity\Progres;

    use App\Form\Type\NewType;

    use App\Service\Time;

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
        public function index(Request $request) {

            $user = $this->getUser();
            $id = $user->getId();

            $plan = $this->getDoctrine()->getRepository(ProgramTrening::class)->findOneBy(['user' => $id]);
            $exercises = $plan->getExercises();

            $time = new Time();
            $day = $time->getDay();

            $property = [];

            $something = [];

            $i = 0;

            $progres = $this->getDoctrine()->getRepository(Progres::class)->findBy(['user' => $id, 'day' => $day]);

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
                    
                    $add = new Progres();
                    $add->setUser($id);
                    $add->setDay('thursday');
                    $add->setExercise($exercise);
                    $add->setWeight($weight);
                    $add->setSets($sets);
                    $add->setReps($reps);

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($add);
                    $entityManager->flush();
                    
                    $message['correct'] = "You add exercise today progres, Excellent!";

                    $property = [];

                    $something = [];
        
                    $i = 0;
                    
                    $progres = $this->getDoctrine()->getRepository(Progres::class)->findBy(['user' => $id, 'day' => $day]);
        
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



                    return $this->render('diary/index.html.twig', [
                        'plan' => $plan,
                        'message' => $message,
                        'exercises' => $property2,
                        'progres' => $progres
                    ]);
                    

                } else {

                    $message['error'] = "Please fill fields!";

                    return $this->render('diary/index.html.twig', [
                        'plan' => $plan,
                        'message' => $message,
                        'exercises' => $property2,
                        'progres' => $progres
                    ]);
                    

                }
                
            }

            return $this->render('diary/index.html.twig', [
                'plan' => $plan,
                'exercises' => $property2,
                'somethings' => $something,
                'day' => $day,
                'progres' => $progres
            ]);
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

            $plan = new ProgramTrening();
            $plan->setUser($id);

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
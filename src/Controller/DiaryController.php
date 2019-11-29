<?php

    namespace App\Controller;

    use App\Entity\ProgramTrening;
    use App\Entity\User;
    use App\Entity\Progres;

    use App\Form\Type\NewType;

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

            $currentPlan = $this->getDoctrine()->getRepository(ProgramTrening::class)->findOneBy(['user' => $id]);

            if(isset($POST['weight']) && isset($POST['sets']) && isset($POST['reps'])){

                $weight = $POST['weight'];
                $sets = $POST['sets'];
                $reps = $POST['reps'];

                $add = new Progres();
                $add->setUser($id);
                $add->setDay('friday');
                $add->setWeight($weight);
                $add->setSets($sets);
                $add->setReps($reps);

                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid()) {
                    $plan = $form->getData();

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($plan);
                    $entityManager->flush();

                    return $this->Redirect('/login/{$slug}');
                }
                
            }

            return $this->render('diary/index.html.twig', [
                'plan' => $currentPlan
            ]);
        }

        /**
         * @Rest\Post("/{$slug}/new", name="app_new")
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

                return $this->Redirect('/login/{$slug}');
            }

            return $this->render('diary/new.html.twig', array(
                'form' => $form->createView()
            ));
        }
    }
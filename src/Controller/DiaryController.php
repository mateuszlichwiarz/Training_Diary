<?php

    namespace App\Controller;

    use App\Entity\ProgramTrening;
    use App\Entity\User;

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
         * @Route("/{$slug}", name="app_homepage")
         */
        public function index() {

            $user = $this->getUser();
            $id = $user->getId();

            $currentPlan = $this->getDoctrine()->getRepository(ProgramTrening::class)->findOneBy(['user' => $id]);

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
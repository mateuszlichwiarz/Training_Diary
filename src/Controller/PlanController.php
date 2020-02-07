<?php

    namespace App\Controller;

    use App\Entity\ProgramTraining;
    use App\Entity\User;

    use App\Form\Type\NewType;

    use App\Service\Time;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;

    /**
     * Training plan controller
     * @Route("/new", name="")
     */
    class PlanController extends AbstractController
    {
        /**
         * @Rest\Post("", name="app_new")
         */
        public function new(Request $request)
        {
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

            if($form->isSubmitted() && $form->isValid())
            {
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
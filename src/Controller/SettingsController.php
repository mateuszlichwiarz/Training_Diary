<?php

    namespace App\Controller;

    use App\Entity\User;
    use App\Entity\AllSettings;
    use App\Entity\HomepageSettings;
    use App\Entity\GeneralSettings;


    use App\Form\Type\EditSettingsType;

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use FOS\RestBundle\Controller\FosRestController;
    use FOS\RestBundle\Controller\Annotations as Rest;

    use Symfony\Component\Routing\Annotation\Route;

    /**
     * Trening settings controller
     * @Route("/login/{}/settings", name="")
     */
    class SettingsController extends AbstractController
    {

        /**
         * @Rest\Get("/", name="app_settings");
         */
        public function settings(Request $request) {

            $allSettings = $this->getDoctrine()->getRepository(AllSettings::class)->findAll();
            //$idSettings = $allSettings->getId();
            //$nameSettings = $allSettings->getName();
            
            return $this->render('menu/settings.html.twig', [
                'allSettings' => $allSettings
            ]);
        }

        /**
         * @Rest\Get("/{id}/subsettings/", name="app_section_seting");
         */
        public function sectionSettings(Request $request, $id) {

            $allSetings = $this->getDoctrine()->getRepository(AllSettings::class)->findOneBy(['id' => $id]);

            $subSettings = $allSetings->getSubSettings();
            
            print_r($subSettings);
            
            return $this->render('menu/sectionSettings.html.twig', [
                'subSettings' => $subSettings,
                'idSeting' => $id,
            ]);
        }

        /**
         * @Rest\Put("/{id}/subsettings/{subid}", name="app_edit_seting")
         */
        public function editSeting(Request $request, $id, $subid) {

            $user = $this->getUser();

            $idSettings = $user->getHomepagesettings();

            $userSettings = new HomepageSettings();
            $userSettings = $this->getDoctrine()->getRepository(HomepageSettings::class)->find($idSettings);

            $form = $this->createForm(EditSettingsType::class, $userSettings, [
                'method' => 'PUT'
            ]);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {

                $userSettings= $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($userSettings);
                $entityManager->flush();

                
                $message['correct'] = 'You left changes!';

                return $this->render('menu/editSetting.html.twig', [
                    'form'     => $form->createView(),
                    'idSeting' => $id,
                    'subid'    => $subid,
                    'message'  => $message,
                ]);

            }

            return $this->render('menu/editSetting.html.twig', [
                'form'     => $form->createView(),
                'idSeting' => $id,
                'subid'    => $subid
            ]);
        }
    }
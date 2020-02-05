<?php

    namespace App\Controller;

    use App\Entity\User;
    use App\Entity\AllSettings;
    use App\Entity\HomepageSettings;
    use App\Entity\GeneralSettings;


    use App\Form\Type\EditSettingsType;
    use App\Form\Type\EditUnitType;

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
        public function settings(Request $request)
        {
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
        public function sectionSettings(Request $request, $id)
        {
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
        public function editSeting(Request $request, $id, $subid)
        {
            $user = $this->getUser();

            $idSettings = $user->getHomepagesettings();
            
            if($id == '3')
            {
                echo $id;
                $homepageSettings = new HomepageSettings();
                $homepageSettings = $this->getDoctrine()->getRepository(HomepageSettings::class)->find($idSettings);

                $form = $this->createForm(EditSettingsType::class, $homepageSettings, [
                    'method' => 'PUT'
                ]);

                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid())
                {
    
                    $homepageSettings= $form->getData();
    
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($homepageSettings);
                    $entityManager->flush();
    
                    
                    $message['correct'] = 'You left changes!';
    
                    return $this->render('menu/editSetting.html.twig', [
                        'form'     => $form->createView(),
                        'idSeting' => $id,
                        'subid'    => $subid,
                        'message'  => $message,
                        'homepageSettings' => $homepageSettings
                    ]);
    
                }
    
                return $this->render('menu/editSetting.html.twig', [
                    'form'     => $form->createView(),
                    'idSeting' => $id,
                    'subid'    => $subid,
                    'homepageSettings' => $homepageSettings
    
                ]);

            }elseif($id == '4')
            {
                echo $id;
                $generalSettings = new GeneralSettings();
                $generalSettings = $this->getDoctrine()->getRepository(GeneralSettings::class)->find($idSettings);

                $form = $this->createForm(EditUnitType::class, $generalSettings, [
                    'method' => 'PUT'
                ]);

                $form->handleRequest($request);

                if($form->isSubmitted() && $form->isValid())
                {
                    $generalSettings= $form->getData();
    
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($generalSettings);
                    $entityManager->flush();
    
                    
                    $message['correct'] = 'You left changes!';
    
                    return $this->render('menu/editSetting.html.twig', [
                        'form'     => $form->createView(),
                        'idSeting' => $id,
                        'subid'    => $subid,
                        'message'  => $message,
                        'generalSettings' => $generalSettings
                    ]);
    
                }
    
                return $this->render('menu/editSetting.html.twig', [
                    'form'     => $form->createView(),
                    'idSeting' => $id,
                    'subid'    => $subid,
                    'generalSettings' => $generalSettings
    
                ]);
            }
        }
    }
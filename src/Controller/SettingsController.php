<?php

    namespace App\Controller;

    use App\Entity\User;
    use App\Entity\AllSettings;
    use App\Entity\HomepageSettings;

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
         * @Rest\Get("/{id}", name="app_section_seting");
         */
        public function sectionSettings(Request $request) {
            
            return $this->render('menu/sectionSettings.html.twig');
        }

        /**
         * @Rest\Put("/{id}", name="app_edit_seting")
         */
        public function editSeting(Request $request) {

            return $this->render('menu/editSetting.html.twig');
        }
    }
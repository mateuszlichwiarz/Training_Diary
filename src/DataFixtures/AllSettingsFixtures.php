<?php

    namespace App\DataFixtures;

    use app\Entity\AllSettings;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;

    class AllSettingsFixtures extends Fixture
    {
        public function load(ObjectManager $manager)
        {
            // $product = new Product();
            // $manager->persist($product);
            
            $homepageSettings = new AllSettings();
            $homepageSettings->setName('Homepage');

            $subSettings = [];
            $subSettings[0] = 'daysealier';
            $homepageSettings->setSubSettings($subSettings);

            $manager->persist($homepageSettings);

            $generalSettings = new AllSettings();
            $generalSettings->setName('General');

            $subSettings = [];
            $subSettings[0] = 'changeweightunit';
            $generalSettings->setSubSettings($subSettings);
            
            $manager->persist($generalSettings);

            $manager->flush();
        }
    }
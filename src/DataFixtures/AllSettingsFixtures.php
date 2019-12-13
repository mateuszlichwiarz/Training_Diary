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
            
            $allSettings = new AllSettings();
            $allSettings->setName('homepage');

            $subSettings = [];
            $subSettings[0] = 'daysealier';
            $allSettings->setSubSettings($subSettings);

            $manager->persist($allSettings);
            

            $manager->flush();
        }
    }
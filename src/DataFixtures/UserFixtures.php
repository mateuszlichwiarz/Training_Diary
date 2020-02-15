<?php

namespace App\DataFixtures;

use app\Entity\User;
use app\Entity\HomepageSettings;
use app\Entity\GeneralSettings;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
            $homepageSettings = new HomepageSettings();
            $homepageSettings->setDaysEarlier(7);

            $generalSettings = new GeneralSettings();
            $generalSettings->setWeightUnit('kg');

            $user = new User();
            $user->setEmail('user0@gmail.com');
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'password0'
            ));
            $user->setHomepagesettings($homepageSettings);
            $user->setGeneralsettings($generalSettings);

            $manager->persist($homepageSettings);
            $manager->persist($generalSettings);
            $manager->persist($user);

        $manager->flush();

    }
}

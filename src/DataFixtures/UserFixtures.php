<?php

namespace App\DataFixtures;

use app\Entity\User;
use app\Entity\HomepageSettings;

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
        for($i = 0; $i < 20; $i++) {

            $homepageSettings = new HomepageSettings();
            $homepageSettings->setDaysEarlier(7);

            $user = new User();
            $user->setEmail('user'.$i.'@gmail.com');
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'password'.$i
            ));
            $user->setHomepagesettings($homepageSettings);

            $manager->persist($homepageSettings);
            $manager->persist($user);
        }

        $manager->flush();

    }
}

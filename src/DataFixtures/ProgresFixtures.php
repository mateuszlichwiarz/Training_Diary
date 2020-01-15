<?php

    namespace App\DataFixtures;

    use app\Entity\Progres;
    use app\Entity\HomepageSettings;

    use App\Service\Time;

    use Doctrine\Bundle\FixturesBundle\Fixture;
    use Doctrine\Common\Persistence\ObjectManager;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class ProgresFixtures extends Fixture
    {
        public function load(ObjectManager $manager)
        {

            $userId = '1';

            $time = new Time;
            $dateTime = $time->getDate();

            $datesAgo = [];

            for($i = 0; $i < 2; $i++)
            {
                $dates = new Time;
                $datesAgo[$i] = $dates->dateFromAgo($i);
            }


            $days = array(

                'Monday'     => $datesAgo[1],
                'Thuesday'   => $datesAgo[0],
                'Friday'     => $datesAgo[0],
            );


            $exercises = array(

                'Squat'      => '100',
                'Deadlift'   => '120',
                'Benchpress' => '80',
                'OHP'        => '50',
                'Front'      => '70',

            );

            foreach($days as $day => $date){

                foreach($exercises as $exercise => $weight){

                    $workouts = new Progres();
                    $workouts->setUser($userId);
                    $workouts->setDay($day);
                    $workouts->setExercise($exercise);
                    $workouts->setWeight($weight);
                    $workouts->setReps(5);
                    $workouts->setSets(5);
                    $workouts->setDate($date);
                    $workouts->setTime($dateTime);

                    $manager->persist($workouts);
                }

            }

            $manager->flush();


        }
    }
<?php

    namespace App\Service;

    use App\Entity\Progres;
    use Doctrine\ORM\EntityManagerInterface;

    use App\Service\Time;


    class ShowWorkouts
    {
        /**
         * @var EntityManagerInterface
         */
        private $em;

        public function __construct(EntityManagerInterface $em)
        {
            $this->em = $em;
        }

        public function getWorkouts($howLong, $user, $currentdate)
        {

            $date = new Time();
            $interestedDate = $date->dateFromAgo($howLong);


            $properties = $this->getPropertiesWorkouts($user, $interestedDate, $currentdate);

            return $properties;
            
        }

        private function getPropertiesWorkouts($user, $interestedDate, $currentdate)
        {

            $i = 0;
            $workouts = array();

            $todaydate = $currentdate->format('Y-m-d');

            $workouts = $this->em
                ->getRepository(Progres::class)
                ->findAllWorkoutsWithoutToday($interestedDate, $user, $todaydate);

            if($workouts == true){    
                foreach($workouts as $workout) {

                    $workoutsProperties[$i]['date']     = $workouts[$i]->getDate();
                    $workoutsProperties[$i]['time']     = $workouts[$i]->getTime();
                    $workoutsProperties[$i]['day']      = $workouts[$i]->getDay();
                    $workoutsProperties[$i]['exercise'] = $workouts[$i]->getExercise();
                    $workoutsProperties[$i]['sets']     = $workouts[$i]->getSets();
                    $workoutsProperties[$i]['reps']     = $workouts[$i]->getReps();
                    $workoutsProperties[$i]['weight']   = $workouts[$i]->getWeight();

                    $i++;
                }


                return $workoutsProperties;

            }else {

                return 0;
            }
        }
    }
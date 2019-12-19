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

        public function getWorkoutsAll($howLong, $day, $user, $currentdate)
        {
            $date = new Time();
            $interestedDate = $date->dateFromAgo($howLong);

            $properties = $this->getPropertiesWorkoutsAll($user,$day, $interestedDate, $currentdate);

            return $properties;
        }

        public function getProgres($today, $date, $userId, $week)
        {
            if($today == 'Monday'){

                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('1', $day, $userId, $date);
                }
                
            }elseif($today == 'Thuesday'){

                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('2', $day, $userId, $date);
                }
                
            }elseif($today == 'Wednesday'){

                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('3', $day, $userId, $date);
                }

            }elseif($today == 'Thursday'){

                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('4', $day, $userId, $date);
                }

            }elseif($today == 'Friday'){
               
                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('5', $day, $userId, $date);
                }
                
            }elseif($today == 'Saturday'){
                
                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('6', $day, $userId, $date);
                }

            }elseif($today == 'Sunday'){
                
                foreach($week as $day)
                {
                    $workouts[] = $this->getWorkoutsAll('7', $day, $userId, $date);
                }

            }


            return $workouts;
        }
        

        private function getPropertiesWorkoutsAll($user, $day, $interestedDate, $currentdate)
        {
            $i = 0;
            $workouts = array();

            $workouts = $this->em
                ->getRepository(Progres::class)
                ->findWorkoutsByDay($interestedDate, $day, $user, $currentdate);

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

                return false;
            }
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

                return false;
            }
        }
    }
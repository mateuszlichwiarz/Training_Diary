<?php

    namespace App\Service;

    use App\Entity\Progres;
    use App\Entity\GeneralSettings;

    use Doctrine\ORM\EntityManagerInterface;

    use App\Service\ConvertUnit;
    use App\Service\Time;
    use App\Service\WorkoutVolume;


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

        public function getWorkouts($user, $howLong, $userId, $currentdate)
        {

            $date = new Time();
            $interestedDate = $date->dateFromAgo($howLong);


            $properties = $this->getPropertiesWorkouts($user, $userId, $interestedDate, $currentdate);
            

            return $properties;
            
        }

        public function getWorkoutsAll($user, $howLong, $day, $userId, $currentdate)
        {
            
            $date = new Time();
            $interestedDate = $date->dateFromAgo($howLong);

            $properties = $this->getPropertiesWorkoutsAll($user, $userId, $day, $interestedDate, $currentdate);


            return $properties;
        }

        public function getProgres($user, $today, $date, $userId, $week, $whichWeek)
        {
            $addDays = 7;
            $result = $whichWeek * $addDays;
            $user;

            if($result !== 0){

                $cutDate = $date->modify("-".$result." day");

                $howLong[0] = 1 + $result;
                $howLong[1] = 2 + $result;
                $howLong[2] = 3 + $result;
                $howLong[3] = 4 + $result;
                $howLong[4] = 5 + $result;
                $howLong[5] = 6 + $result;
                $howLong[6] = 7 + $result;

                if($today == 'Monday'){

                    $endDay = $cutDate->modify("+6 day");
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[0], $day, $userId, $endDay);
                    }
                    
                }elseif($today == 'Thuesday'){
    
                    $endDay = $cutDate->modify("+5 day");
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[1], $day, $userId, $endDay);
                    }
                    
                }elseif($today == 'Wednesday'){
    
                    $endDay = $cutDate->modify("+4 day");
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[2], $day, $userId, $endDay);
                    }
    
                }elseif($today == 'Thursday'){
    
                    $endDay = $cutDate->modify("+3 day");
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[3], $day, $userId, $endDay);
                    }
    
                }elseif($today == 'Friday'){
    
                    $endDay = $cutDate->modify("+2 day");
                   
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[4], $day, $userId, $endDay);
                    }
                    
                }elseif($today == 'Saturday'){
                    
                    $endDay = $cutDate->modify("+1 day");
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[5], $day, $userId, $endDay);
                    }
    
                }elseif($today == 'Sunday'){
                    
                    $endDay = $cutDate->modify("+0 day");
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, $howLong[6], $day, $userId, $cutDate);
                    }
    
                }
    
    
                return $workouts;


            }else{

                if($today == 'Monday'){
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '1', $day, $userId, $date);
                    }
                    
                }elseif($today == 'Thuesday'){
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '2', $day, $userId, $date);
                    }
                    
                }elseif($today == 'Wednesday'){
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '3', $day, $userId, $date);
                    }
    
                }elseif($today == 'Thursday'){
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '4', $day, $userId, $date);
                    }
    
                }elseif($today == 'Friday'){
                   
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '5', $day, $userId, $date);
                    }
                    
                }elseif($today == 'Saturday'){
    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '6', $day, $userId, $date);
                    }
    
                }elseif($today == 'Sunday'){
                    
                    foreach($week as $day)
                    {
                        $workouts[] = $this->getWorkoutsAll($user, '7', $day, $userId, $date);
                    }
    
                }
    
    
                return $workouts;
            
            }

        }            

        private function getPropertiesWorkoutsAll($user, $userId, $day, $interestedDate, $currentdate)
        {
            $i = 0;
            $workouts = array();

            $workouts = $this->em
                ->getRepository(Progres::class)
                ->findWorkoutsByDay($interestedDate, $day, $userId, $currentdate);

            if($workouts == true){    
                foreach($workouts as $workout) {

                    $workoutsProperties[$i]['date']     = $workouts[$i]->getDate();
                    $workoutsProperties[$i]['time']     = $workouts[$i]->getTime();
                    $workoutsProperties[$i]['day']      = $workouts[$i]->getDay();
                    $workoutsProperties[$i]['exercise'] = $workouts[$i]->getExercise();
                    $workoutsProperties[$i]['sets']     = $workouts[$i]->getSets();
                    $workoutsProperties[$i]['reps']     = $workouts[$i]->getReps();

                    $weight = $workouts[$i]->getWeight();
                    $sets   = $workoutsProperties[$i]['sets'];
                    $reps   = $workoutsProperties[$i]['reps'];


                    $generalSettings = $user->getGeneralSettings();
                    $weightUnit = $generalSettings->getWeightUnit();

                    if($weightUnit == 'lbs')
                    {
                        $convert = new ConvertUnit();
                        $weightConverted = $convert->execute($weightUnit, $weight);
                    }

                    $wv = new WorkoutVolume();
                    if($weightUnit == 'lbs')
                    {
                        $workoutsProperties[$i]['weight'] = $weightConverted;
                        $workoutsProperties[$i]['volume'] = $wv->getVolume($weightConverted, $sets, $reps);
                    }else 
                    {
                        $workoutsProperties[$i]['weight'] = $weight;
                        $workoutsProperties[$i]['volume'] = $wv->getVolume($weight, $sets, $reps);
                    }
                    

                    $i++;
                }

                
                return $workoutsProperties;

            }else {

                return false;
            }
        }

        private function getPropertiesWorkouts($user, $userId, $interestedDate, $currentdate)
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

                    $weight = $workoutsProperties[$i]['weight'];
                    $sets   = $workoutsProperties[$i]['sets'];
                    $reps   = $workoutsProperties[$i]['reps'];

                    $generalSettings = $user->getGeneralSettings();
                    $weightUnit = $generalSettings->getWeightUnit();

                    if($weightUnit == 'lbs')
                    {
                        $convert = new ConvertUnit();
                        $weightConverted = $convert->execute($weightUnit, $weight);
                    }

                    $wv = new WorkoutVolume();
                    if($weightUnit == 'lbs')
                    {
                        $workoutsProperties[$i]['weight']   = $weightConverted;
                        $workoutsProperties[$i]['volume'] = $wv->getVolume($weightConverted, $sets, $reps);
                    }else 
                    {
                        $workoutsProperties[$i]['weight'] = $weight;
                        $workoutsProperties[$i]['volume'] = $wv->getVolume($weight, $sets, $reps);
                    }

                    $i++;
                }


                return $workoutsProperties;

            }else {

                return false;
            }
        }
    }
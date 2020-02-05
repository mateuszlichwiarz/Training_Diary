<?php

    namespace App\Service;

    class WorkoutVolume
    {
        public function getVolume($weight, $sets, $reps)
        {
            $volume = $weight * $sets * $reps;

            return $volume;
        }
    }

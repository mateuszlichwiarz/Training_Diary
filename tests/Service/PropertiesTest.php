<?php

    namespace App\tests\Service;

    use App\Service\ShowWorkouts;
    use PHPUnit\Framework\TestCase;

    class ShowWorkoutsTest extends TestCase
    {

        public function testPropertiesWorkouts()
        {

            $workouts = new ShowWorkouts();
            $result = $workouts->PropertiesWorkouts();
        }
    }
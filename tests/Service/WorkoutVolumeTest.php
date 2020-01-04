<?php

    namespace App\tests\Service;

    use App\Service\WorkoutVolume;
    use PHPUnit\Framework\TestCase;

    class WorkoutVolumeTest extends TestCase
    {
        public function testGetVolume()
        {
            $vw = new WorkoutVolume();

            $result = $vw->getVolume(70, 5, 5);

            $this->assertEquals($result, 1750);
        }

    }
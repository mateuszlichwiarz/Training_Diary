<?php

    namespace App\tests\Service;

    use App\Service\Time;
    use PHPUnit\Framework\TestCase;

    class TimeTest extends TestCase
    {

        public function testDateFromAgo()
        {

            $time = new Time();
            $today = $time->getDate();
            $result = $time->DateFromAgo(0);

            //$today = new \DateTime('2019-12-17');

            $this->assertEquals($today, $result);

        }
    }
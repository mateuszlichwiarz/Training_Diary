<?php

    namespace App\tests\Service;

    use App\Service\ConvertUnit;
    use PHPUnit\Framework\TestCase;

    class ConvertUnitTest extends TestCase
    {

        public function testConvertionToLbs()
        {

            $convert = new ConvertUnit(
                'kg',
                100,
            );
            $result = $convert->Execute();

            $correct = 220;
            $this->assertEquals($correct, $result);

        }

        public function testConvertionToKg()
        {

            $convert = new ConvertUnit(
                'lbs',
                220,
            );
            $result = $convert->Execute();

            $correct = 100;
            $this->assertEquals($correct, $result);

        }
    }
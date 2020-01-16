<?php

    namespace App\Service;

    class ConvertUnit
    {
        private $unit;
        private $weight;

        public function __construct(
            $unit,
            $weight
            ){
            $this->unit = $unit;
            $this->weight = $weight;
        }

        public function execute()
        {

            switch($this->unit){
                case 'lbs':
                    return $this->convertToKg();
                break;
                case 'kg':
                    return $this->convertToLbs();
                break;
            }
        }

        private function convertToLbs()
        {

            $result = $this->weight * 2.2;

            return $result;

        }

        private function convertToKg()
        {
            $result = $this->weight/2.2;

            return $result;
        }

    }
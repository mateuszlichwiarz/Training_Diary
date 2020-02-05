<?php

    namespace App\Service;

    class ConvertUnit
    {
        public function execute($unit, $weight)
        {
            switch($unit)
            {
                case 'lbs':
                    return $this->convertToLbs($weight);
                break;
                case 'kg':
                    return $this->convertToKg($weight);
                break;
            }
        }

        private function convertToLbs($weight)
        {
            $result = $weight * 2.2;

            return $result;
        }

        private function convertToKg($weight)
        {
            $result = $weight/2.2;

            return $result;
        }

    }
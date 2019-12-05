<?php

    namespace App\Service;

    
    class Time
    {

        public function getDay()
        {
            $date = date("D");

            
            $day = $this->explificationEnd($date);

            return $day;
            
        }


        private function explificationEnd($day)
        {
            switch($day){
                case "Mon":
                    $day = 'Monday';
                break;
                case "Tue":
                    $day = 'Thuesday';
                break;
                case "Wed":
                    $day = 'Wednesday';
                break;
                case "Thu":
                    $day = 'Thursday';
                break;
                case "Fri":
                    $day = 'Friday';
                break;
                case "Sat":
                    $day = 'Saturday';
                break;
                case "Sun":
                    $day = 'Sunday';
                break;
            }

            return $day;
        }
    }
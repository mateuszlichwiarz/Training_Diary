<?php

    namespace App\Service;

    class Time
    {
        public function dateFromAgo($howLong)
        {
            $currentDate = $this->getDate();

            if($howLong == 0)
            {
                $interestedDate = $this->getDate();
            }else
            {
                $interestedDate = $currentDate->modify("-".$howLong." day");
            }
            
            return $interestedDate;
        }

        public function getWeekArray()
        {
            $week[] = 'Monday';
            $week[] = 'Thuesday';
            $week[] = 'Wednesday';
            $week[] = 'Thursday';
            $week[] = 'Friday';
            $week[] = 'Saturday';
            $week[] = 'Sunday';

            return $week;
        }

        public function getDay()
        {
            $date = date("D");
            $day = $this->explificationEnd($date);

            return $day;
            
        }

        public function getDate()
        {
            $date = new \DateTime('@'.strtotime('now'));

            return $date;
        }

        public function getTime()
        {
            $time = date("H:i:s");

            return $time;
        }


        private function explificationEnd($day)
        {
            switch($day)
            {
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
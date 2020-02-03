<?php

    namespace App\Service;


    class SimilarExercises
    {
        private $nameOfBaseExercise;
        private $exercisesName;

        public function __construct(
            string $nameOfBaseExercise,
            array $exercisesName
            ){
                $this->nameOfBaseExercise = $nameOfBaseExc;
                $this->exercisesName = $excName;
            }

        public function getNameOfBaseExc()
        {
            return $this->nameOfBaseExc;
        }

        public function getExcName()
        {
            return $this->getExcName;
        }

        public function main()
        {
            foreach($this->something as $item)
            {
                if($name == $item)
                {
                    $letters = $this->getSplitWordToLetters($item);
                    $countOfLetters = $this->getCountOfLetters($letters);

                    $wanted = array();
                    $wantedStart = array();
                    
                    $char = '#';
                    $position = $this->getCharacterPosition($letters, $char);

                    $m = 0;
                    if(isset($position))
                    {
                        for($l = 0; $l < $position; $l++)
                        {
                            $wantedStart[$m] = $letters[$l];

                            $m++;
                        }

                            $k = 0;

                            for($j = $number; $j <= $countLetters; $j++)
                            {
                                $wanted[$k] = $letters[$j];

                                $end = $k;
                                $k++;
                            }
                                
                            $numberEnd = $wanted[$end]+1;

                            $numberForName = implode("", $wanted);

                            $exerciseName = implode("", $wantedStart);

                            $name = $exerciseName.'#'.$numberEnd;
                    }
                }
            }
        }

        private function getSplitWordToLetters($word)
        {
            $letters = str_split($word);
            return $letters;
        }

        private function getCountOfLetters($letters)
        {
            $countLetters = count($letters)-1;
            return $countLetters;
        }

        private function getCharacterPosition($letters, $char)
        {
            $i = 0;
            foreach($letters as $letter)
            {
                if($letter == $char)
                {
                    $number = $i;

                    return $number;
                }else
                {
                    return false;
                }
                $i++;
            }
        }

    }
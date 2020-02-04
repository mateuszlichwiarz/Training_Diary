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
                $this->exercisesName = $excsName;
            }

        public function getNameOfBaseExc()
        {
            return $this->nameOfBaseExc;
        }

        public function getExcsName()
        {
            return $this->ExcsName;
        }

        public function main()
        {
            $name     = $this->getNameOfBaseExc();
            $excsName = $this->getExcsName();

            foreach($excsName as $item)
            {
                if($name == $item)
                {
                    $letters = $this->getSplitWordToLetters($item);
                    $countOfLetters = $this->getCountOfLetters($letters);
                    
                    $char = '#';
                    $position = $this->getCharacterPosition($letters, $char);

                    if($position !== false)
                    {
                        return $name = $this->newName($position, $countOfLetters, $letters);
                    }else
                    {
                        $name = $this->name.'#2';
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
                    $position = $i;

                    return $position;
                }else
                {
                    return false;
                }
                $i++;
            }
        }

        private function getPureExerciseName($position, $letters)
        {
            $frontLetters = array();
            $j = 0;

            for($i = 0; $i < $position; $i++)
            {
                $frontLetters[$j] = $letters[$i];

                $j++;
            }

            $exerciseName = implode("", $frontLetters);

            return $exerciseName;
        }

        private function getLastOneFromEnding($position,$countOfLetters, $letters)
        {
            $ending = array();
            $j = 0;
            for($i = $position; $i <= $countOfLetters; $i++)
            {
                $ending[$j] = $letters[$i];

                $positionOfLast = $j;
                $j++;
            }
                                
            $lastOne = $ending[$end]+1;

            return $lastOne;

        }

        private function newName($position, $countOfLetters, $letters)
        {                       
            $lastOne = $this->getLastOneFromEnding($position, $countOfLetters, $letters);
            $pureExerciseName = $this->getPureExerciseName($position);

            $name = $pureExerciseName.'#'.$lastOne;

            return $name;
        }

    }
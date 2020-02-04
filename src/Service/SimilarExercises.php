<?php

    namespace App\Service;


    class SimilarExercises
    {
        private $nameOfBaseExercise;
        private $exercisesName;
        private $char;

        public function __construct(
            string $nameOfBaseExercise,
            array $exercisesName,
            string $char
            ){
                $this->nameOfBaseExercise = $nameOfBaseExercise;
                $this->exercisesName      = $exercisesName;
                $this->char               = $char;
            }

        public function getNameOfBaseExercise()
        {
            return $this->nameOfBaseExercise;
        }

        public function getExercisesName()
        {
            return $this->exercisesName;
        }

        public function getChar()
        {
            return $this->char;
        }

        public function main()
        {
            $name     = $this->getNameOfBaseExercise();
            $excsName = $this->getExercisesName();
            $char     = $this->getChar();

            foreach($excsName as $item)
            {
                if($name == $item)
                {
                    $letters = $this->getSplitWordToLetters($item);
                    $countOfLetters = $this->getCountOfLetters($letters);
                    
                    $position = $this->getCharacterPosition($letters, $char);

                    if($position)
                    {
                        $name = $this->newName($position, $countOfLetters, $letters);

                        return $name;
                    }else
                    {
                        $name = $name.'#2';

                        return $name;
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
                echo $letter.'<br>';
                if($letter == $char)
                {
                    $position = $i;
                    
                    return $position;
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
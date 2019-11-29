<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProgresRepository")
 */
class Progres
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $day;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $exercise;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Sets;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $reps;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getExercise(): ?string
    {
        return $this->exercise;
    }

    public function setExercise(string $exercise): self
    {
        $this->exercise = $exercise;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSets(): ?int
    {
        return $this->Sets;
    }

    public function setSets(?int $Sets): self
    {
        $this->Sets = $Sets;

        return $this;
    }

    public function getReps(): ?int
    {
        return $this->reps;
    }

    public function setReps(?int $reps): self
    {
        $this->reps = $reps;

        return $this;
    }
}

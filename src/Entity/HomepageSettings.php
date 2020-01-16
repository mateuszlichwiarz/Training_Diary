<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HomepageSettingsRepository")
 */
class HomepageSettings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $daysEarlier;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="homepagesettings")
     */
    private $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDaysEarlier(): ?int
    {
        return $this->daysEarlier;
    }

    public function setDaysEarlier(int $daysEarlier): self
    {
        $this->daysEarlier = $daysEarlier;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setHomepagesettings($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getHomepagesettings() === $this) {
                $user->setHomepagesettings(null);
            }
        }

        return $this;
    }
}

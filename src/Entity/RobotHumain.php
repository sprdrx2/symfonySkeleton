<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RobotHumainRepository")
 */
class RobotHumain
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
    private $SerialNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Surname;

    /**
     * @ORM\OneToMany(targetEntity="UselessEntity", mappedBy="robotHumain")
     */
    private $uselessEntities;

    public function __construct() {
    	$this->$uselessEntities = new ArrayCollection();
     $this->uselessEntities = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerialNumber(): ?int
    {
        return $this->SerialNumber;
    }

    public function setSerialNumber(int $SerialNumber): self
    {
        $this->SerialNumber = $SerialNumber;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->Surname;
    }

    public function setSurname(string $Surname): self
    {
        $this->Surname = $Surname;

        return $this;
    }

    /**
     * @return Collection|UselessEntity[]
     */
    public function getUselessEntities(): Collection
    {
        return $this->uselessEntities;
    }

    public function addUselessEntity(UselessEntity $uselessEntity): self
    {
        if (!$this->uselessEntities->contains($uselessEntity)) {
            $this->uselessEntities[] = $uselessEntity;
            $uselessEntity->setRobotHumain($this);
        }

        return $this;
    }

    public function removeUselessEntity(UselessEntity $uselessEntity): self
    {
        if ($this->uselessEntities->contains($uselessEntity)) {
            $this->uselessEntities->removeElement($uselessEntity);
            // set the owning side to null (unless already changed)
            if ($uselessEntity->getRobotHumain() === $this) {
                $uselessEntity->setRobotHumain(null);
            }
        }

        return $this;
    }
}

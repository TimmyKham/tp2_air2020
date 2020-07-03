<?php

namespace App\Entity;

use App\Repository\AircraftRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AircraftRepository::class)
 */
class Aircraft
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $basicType;

    /**
    * @ORM\OneToMany(targetEntity="App\Entity\Flight", mappedBy="Aircraft")
    */
    private $description;
    

    public function __construct()
    {
        $this->description = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getBasicType(): ?string
    {
        return $this->basicType;
    }

    public function setBasicType(string $basicType): self
    {
        $this->basicType = $basicType;

        return $this;
    }

    /**
     * @return Collection|Aircraft[]
     */
    public function getDescription(): Collection
    {
        return $this->description;
    }

    public function addDescription(Aircraft $description): self
    {
        if (!$this->description->contains($description)) {
            $this->description[] = $description;
            $description->setFlight($this);
        }

        return $this;
    }

    public function removeDescription(Aircraft $description): self
    {
        if ($this->description->contains($description)) {
            $this->description->removeElement($description);
            // set the owning side to null (unless already changed)
            if ($description->getFlight() === $this) {
                $description->setFlight(null);
            }
        }

        return $this;
    }
}

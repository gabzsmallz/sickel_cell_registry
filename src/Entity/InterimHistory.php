<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterimHistoryRepository")
 */
class InterimHistory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="interimHistories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $last_hematology_vist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hematologist;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $complications_since_last_vist;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPatientId(): ?Patient
    {
        return $this->patient_id;
    }

    public function setPatientId(?Patient $patient_id): self
    {
        $this->patient_id = $patient_id;

        return $this;
    }

    public function getLastHematologyVist(): ?\DateTimeInterface
    {
        return $this->last_hematology_vist;
    }

    public function setLastHematologyVist(\DateTimeInterface $last_hematology_vist): self
    {
        $this->last_hematology_vist = $last_hematology_vist;

        return $this;
    }

    public function getHematologist(): ?string
    {
        return $this->hematologist;
    }

    public function setHematologist(string $hematologist): self
    {
        $this->hematologist = $hematologist;

        return $this;
    }

    public function getComplicationsSinceLastVist(): ?string
    {
        return $this->complications_since_last_vist;
    }

    public function setComplicationsSinceLastVist(string $complications_since_last_vist): self
    {
        $this->complications_since_last_vist = $complications_since_last_vist;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HealthMaintenanceRepository")
 */
class HealthMaintenance
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="healthMaintenances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient_id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $tcd_screening_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tcd_screening_result;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $recommendations;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $next_tcd_screening_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $specialist;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $specialist_visit_date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $immunization;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $immunization_date;

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

    public function getTcdScreeningDate(): ?\DateTimeInterface
    {
        return $this->tcd_screening_date;
    }

    public function setTcdScreeningDate(?\DateTimeInterface $tcd_screening_date): self
    {
        $this->tcd_screening_date = $tcd_screening_date;

        return $this;
    }

    public function getTcdScreeningResult(): ?string
    {
        return $this->tcd_screening_result;
    }

    public function setTcdScreeningResult(?string $tcd_screening_result): self
    {
        $this->tcd_screening_result = $tcd_screening_result;

        return $this;
    }

    public function getRecommendations(): ?string
    {
        return $this->recommendations;
    }

    public function setRecommendations(?string $recommendations): self
    {
        $this->recommendations = $recommendations;

        return $this;
    }

    public function getNextTcdScreeningDate(): ?\DateTimeInterface
    {
        return $this->next_tcd_screening_date;
    }

    public function setNextTcdScreeningDate(?\DateTimeInterface $next_tcd_screening_date): self
    {
        $this->next_tcd_screening_date = $next_tcd_screening_date;

        return $this;
    }

    public function getSpecialist(): ?string
    {
        return $this->specialist;
    }

    public function setSpecialist(?string $specialist): self
    {
        $this->specialist = $specialist;

        return $this;
    }

    public function getSpecialistVisitDate(): ?\DateTimeInterface
    {
        return $this->specialist_visit_date;
    }

    public function setSpecialistVisitDate(?\DateTimeInterface $specialist_visit_date): self
    {
        $this->specialist_visit_date = $specialist_visit_date;

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

    public function getImmunization(): ?string
    {
        return $this->immunization;
    }

    public function setImmunization(?string $immunization): self
    {
        $this->immunization = $immunization;

        return $this;
    }

    public function getImmunizationDate(): ?\DateTimeInterface
    {
        return $this->immunization_date;
    }

    public function setImmunizationDate(?\DateTimeInterface $immunization_date): self
    {
        $this->immunization_date = $immunization_date;

        return $this;
    }
}

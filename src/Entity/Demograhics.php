<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemograhicsRepository")
 */
class Demograhics
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
    private $diagnosis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $doctor;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_of_last_visit;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="demographics")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $method_of_contact;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $purpose_of_visit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiagnosis(): ?string
    {
        return $this->diagnosis;
    }

    public function setDiagnosis(string $diagnosis): self
    {
        $this->diagnosis = $diagnosis;

        return $this;
    }

    public function getDoctor(): ?string
    {
        return $this->doctor;
    }

    public function setDoctor(string $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    public function getDateOfLastVisit(): ?\DateTimeInterface
    {
        return $this->date_of_last_visit;
    }

    public function setDateOfLastVisit(?\DateTimeInterface $date_of_last_visit): self
    {
        $this->date_of_last_visit = $date_of_last_visit;

        return $this;
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


    public function getMethodOfContact(): ?string
    {
        return $this->method_of_contact;
    }

    public function setMethodOfContact(string $method_of_contact): self
    {
        $this->method_of_contact = $method_of_contact;

        return $this;
    }

    public function getPurposeOfVisit(): ?string
    {
        return $this->purpose_of_visit;
    }

    public function setPurposeOfVisit(?string $purpose_of_visit): self
    {
        $this->purpose_of_visit = $purpose_of_visit;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SickleCellHistoryRepository")
 */
class SickleCellHistory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="sickleCellHistories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hospitalization;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $hospitalization_no_time;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $aplastic_crisis;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $dactylitis;

    /**
     * @ORM\Column(type="boolean")
     */
    private $retinopathy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $splenic_sequestration;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $acute_chest_syndrome;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $acute_chest_syndrome_date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $avascular_necrosis;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $icu_admission;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $icu_admission_date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cholecystectomy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $splenectomy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tonsillectomy;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $tonsillectomy_adenoidectomy;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $others;

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

    public function getHospitalization(): ?bool
    {
        return $this->hospitalization;
    }

    public function setHospitalization(bool $hospitalization): self
    {
        $this->hospitalization = $hospitalization;

        return $this;
    }

    public function getHospitalizationNoTime(): ?int
    {
        return $this->hospitalization_no_time;
    }

    public function setHospitalizationNoTime(?int $hospitalization_no_time): self
    {
        $this->hospitalization_no_time = $hospitalization_no_time;

        return $this;
    }

    public function getAplasticCrisis(): ?bool
    {
        return $this->aplastic_crisis;
    }

    public function setAplasticCrisis(?bool $aplastic_crisis): self
    {
        $this->aplastic_crisis = $aplastic_crisis;

        return $this;
    }

    public function getDactylitis(): ?bool
    {
        return $this->dactylitis;
    }

    public function setDactylitis(?bool $dactylitis): self
    {
        $this->dactylitis = $dactylitis;

        return $this;
    }

    public function getRetinopathy(): ?bool
    {
        return $this->retinopathy;
    }

    public function setRetinopathy(bool $retinopathy): self
    {
        $this->retinopathy = $retinopathy;

        return $this;
    }

    public function getSplenicSequestration(): ?bool
    {
        return $this->splenic_sequestration;
    }

    public function setSplenicSequestration(?bool $splenic_sequestration): self
    {
        $this->splenic_sequestration = $splenic_sequestration;

        return $this;
    }

    public function getAcuteChestSyndrome(): ?bool
    {
        return $this->acute_chest_syndrome;
    }

    public function setAcuteChestSyndrome(?bool $acute_chest_syndrome): self
    {
        $this->acute_chest_syndrome = $acute_chest_syndrome;

        return $this;
    }

    public function getAcuteChestSyndromeDate(): ?\DateTimeInterface
    {
        return $this->acute_chest_syndrome_date;
    }

    public function setAcuteChestSyndromeDate(?\DateTimeInterface $acute_chest_syndrome_date): self
    {
        $this->acute_chest_syndrome_date = $acute_chest_syndrome_date;

        return $this;
    }

    public function getAvascularNecrosis(): ?bool
    {
        return $this->avascular_necrosis;
    }

    public function setAvascularNecrosis(?bool $avascular_necrosis): self
    {
        $this->avascular_necrosis = $avascular_necrosis;

        return $this;
    }

    public function getIcuAdmission(): ?bool
    {
        return $this->icu_admission;
    }

    public function setIcuAdmission(?bool $icu_admission): self
    {
        $this->icu_admission = $icu_admission;

        return $this;
    }

    public function getIcuAdmissionDate(): ?\DateTimeInterface
    {
        return $this->icu_admission_date;
    }

    public function setIcuAdmissionDate(?\DateTimeInterface $icu_admission_date): self
    {
        $this->icu_admission_date = $icu_admission_date;

        return $this;
    }

    public function getCholecystectomy(): ?bool
    {
        return $this->cholecystectomy;
    }

    public function setCholecystectomy(?bool $cholecystectomy): self
    {
        $this->cholecystectomy = $cholecystectomy;

        return $this;
    }

    public function getSplenectomy(): ?bool
    {
        return $this->splenectomy;
    }

    public function setSplenectomy(?bool $splenectomy): self
    {
        $this->splenectomy = $splenectomy;

        return $this;
    }

    public function getTonsillectomy(): ?bool
    {
        return $this->tonsillectomy;
    }

    public function setTonsillectomy(?bool $tonsillectomy): self
    {
        $this->tonsillectomy = $tonsillectomy;

        return $this;
    }

    public function getTonsillectomyAdenoidectomy(): ?bool
    {
        return $this->tonsillectomy_adenoidectomy;
    }

    public function setTonsillectomyAdenoidectomy(?bool $tonsillectomy_adenoidectomy): self
    {
        $this->tonsillectomy_adenoidectomy = $tonsillectomy_adenoidectomy;

        return $this;
    }

    public function getOthers(): ?string
    {
        return $this->others;
    }

    public function setOthers(?string $others): self
    {
        $this->others = $others;

        return $this;
    }
}

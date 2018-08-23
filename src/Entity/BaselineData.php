<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BaselineDataRepository")
 */
class BaselineData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="baselineData")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient_id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $o2_sat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $white_blood_cell_count;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $hemoglobin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $platelet;

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

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getO2Sat(): ?float
    {
        return $this->o2_sat;
    }

    public function setO2Sat(?float $o2_sat): self
    {
        $this->o2_sat = $o2_sat;

        return $this;
    }

    public function getWhiteBloodCellCount(): ?float
    {
        return $this->white_blood_cell_count;
    }

    public function setWhiteBloodCellCount(?float $white_blood_cell_count): self
    {
        $this->white_blood_cell_count = $white_blood_cell_count;

        return $this;
    }

    public function getHemoglobin(): ?float
    {
        return $this->hemoglobin;
    }

    public function setHemoglobin(?float $hemoglobin): self
    {
        $this->hemoglobin = $hemoglobin;

        return $this;
    }

    public function getPlatelet(): ?float
    {
        return $this->platelet;
    }

    public function setPlatelet(?float $platelet): self
    {
        $this->platelet = $platelet;

        return $this;
    }
}

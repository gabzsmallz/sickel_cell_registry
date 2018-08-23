<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DailyMedicationsRepository")
 */
class DailyMedications
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient", inversedBy="dailyMedications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $patient_id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $prophylactic_antibiotics;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $prophylactic_antibiotics_date_subscribed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prophylactic_antibiotics_dose;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $folic_acid;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $folic_acid_date_subscribed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dose_folic_acid;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hydroxyurea;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $hydroxyurea_date_subscribed;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hydroxyurea_dose;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $compliance;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $side_effect;

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

    public function getProphylacticAntibiotics(): ?bool
    {
        return $this->prophylactic_antibiotics;
    }

    public function setProphylacticAntibiotics(?bool $prophylactic_antibiotics): self
    {
        $this->prophylactic_antibiotics = $prophylactic_antibiotics;

        return $this;
    }

    public function getProphylacticAntibioticsDateSubscribed(): ?\DateTimeInterface
    {
        return $this->prophylactic_antibiotics_date_subscribed;
    }

    public function setProphylacticAntibioticsDateSubscribed(?\DateTimeInterface $prophylactic_antibiotics_date_subscribed): self
    {
        $this->prophylactic_antibiotics_date_subscribed = $prophylactic_antibiotics_date_subscribed;

        return $this;
    }

    public function getProphylacticAntibioticsDose(): ?string
    {
        return $this->prophylactic_antibiotics_dose;
    }

    public function setProphylacticAntibioticsDose(?string $prophylactic_antibiotics_dose): self
    {
        $this->prophylactic_antibiotics_dose = $prophylactic_antibiotics_dose;

        return $this;
    }

    public function getFolicAcid(): ?bool
    {
        return $this->folic_acid;
    }

    public function setFolicAcid(?bool $folic_acid): self
    {
        $this->folic_acid = $folic_acid;

        return $this;
    }

    public function getFolicAcidDateSubscribed(): ?\DateTimeInterface
    {
        return $this->folic_acid_date_subscribed;
    }

    public function setFolicAcidDateSubscribed(?\DateTimeInterface $folic_acid_date_subscribed): self
    {
        $this->folic_acid_date_subscribed = $folic_acid_date_subscribed;

        return $this;
    }

    public function getDoseFolicAcid(): ?string
    {
        return $this->dose_folic_acid;
    }

    public function setDoseFolicAcid(?string $dose_folic_acid): self
    {
        $this->dose_folic_acid = $dose_folic_acid;

        return $this;
    }

    public function getHydroxyurea(): ?bool
    {
        return $this->hydroxyurea;
    }

    public function setHydroxyurea(?bool $hydroxyurea): self
    {
        $this->hydroxyurea = $hydroxyurea;

        return $this;
    }

    public function getHydroxyureaDateSubscribed(): ?\DateTimeInterface
    {
        return $this->hydroxyurea_date_subscribed;
    }

    public function setHydroxyureaDateSubscribed(?\DateTimeInterface $hydroxyurea_date_subscribed): self
    {
        $this->hydroxyurea_date_subscribed = $hydroxyurea_date_subscribed;

        return $this;
    }

    public function getHydroxyureaDose(): ?string
    {
        return $this->hydroxyurea_dose;
    }

    public function setHydroxyureaDose(?string $hydroxyurea_dose): self
    {
        $this->hydroxyurea_dose = $hydroxyurea_dose;

        return $this;
    }

    public function getCompliance(): ?string
    {
        return $this->compliance;
    }

    public function setCompliance(?string $compliance): self
    {
        $this->compliance = $compliance;

        return $this;
    }

    public function getSideEffect(): ?string
    {
        return $this->side_effect;
    }

    public function setSideEffect(?string $side_effect): self
    {
        $this->side_effect = $side_effect;

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

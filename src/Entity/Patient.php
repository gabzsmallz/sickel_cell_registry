<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PatientRepository")
 */
class Patient
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
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $patient_no;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sex;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $allergies;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Demograhics", mappedBy="patient_id")
     */
    private $demographics;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\InterimHistory", mappedBy="patient_id")
     */
    private $interimHistories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SickleCellHistory", mappedBy="patient_id")
     */
    private $sickleCellHistories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BaselineData", mappedBy="patient_id")
     */
    private $baselineData;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HealthMaintenance", mappedBy="patient_id")
     */
    private $healthMaintenances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DailyMedications", mappedBy="patient_id")
     */
    private $dailyMedications;

    public function __construct()
    {
        $this->demographics = new ArrayCollection();
        $this->interimHistories = new ArrayCollection();
        $this->sickleCellHistories = new ArrayCollection();
        $this->baselineData = new ArrayCollection();
        $this->healthMaintenances = new ArrayCollection();
        $this->dailyMedications = new ArrayCollection();
    }
	
	public function __toString()
	{
		return $this->getFirstName().' '.$this->getLastName();
	}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPatientNo(): ?string
    {
        return $this->patient_no;
    }

    public function setPatientNo(string $patient_no): self
    {
        $this->patient_no = $patient_no;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAllergies(): ?string
    {
        return $this->allergies;
    }

    public function setAllergies(?string $allergies): self
    {
        $this->allergies = $allergies;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection|Demograhics[]
     */
    public function getDemographics(): Collection
    {
        return $this->demographics;
    }

    public function addDemographic(Demograhics $demographic): self
    {
        if (!$this->demographics->contains($demographic)) {
            $this->demographics[] = $demographic;
            $demographic->setPatientId($this);
        }

        return $this;
    }

    public function removeDemographic(Demograhics $demographic): self
    {
        if ($this->demographics->contains($demographic)) {
            $this->demographics->removeElement($demographic);
            // set the owning side to null (unless already changed)
            if ($demographic->getPatientId() === $this) {
                $demographic->setPatientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InterimHistory[]
     */
    public function getInterimHistories(): Collection
    {
        return $this->interimHistories;
    }

    public function addInterimHistory(InterimHistory $interimHistory): self
    {
        if (!$this->interimHistories->contains($interimHistory)) {
            $this->interimHistories[] = $interimHistory;
            $interimHistory->setPatientId($this);
        }

        return $this;
    }

    public function removeInterimHistory(InterimHistory $interimHistory): self
    {
        if ($this->interimHistories->contains($interimHistory)) {
            $this->interimHistories->removeElement($interimHistory);
            // set the owning side to null (unless already changed)
            if ($interimHistory->getPatientId() === $this) {
                $interimHistory->setPatientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SickleCellHistory[]
     */
    public function getSickleCellHistories(): Collection
    {
        return $this->sickleCellHistories;
    }

    public function addSickleCellHistory(SickleCellHistory $sickleCellHistory): self
    {
        if (!$this->sickleCellHistories->contains($sickleCellHistory)) {
            $this->sickleCellHistories[] = $sickleCellHistory;
            $sickleCellHistory->setPatientId($this);
        }

        return $this;
    }

    public function removeSickleCellHistory(SickleCellHistory $sickleCellHistory): self
    {
        if ($this->sickleCellHistories->contains($sickleCellHistory)) {
            $this->sickleCellHistories->removeElement($sickleCellHistory);
            // set the owning side to null (unless already changed)
            if ($sickleCellHistory->getPatientId() === $this) {
                $sickleCellHistory->setPatientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BaselineData[]
     */
    public function getBaselineData(): Collection
    {
        return $this->baselineData;
    }

    public function addBaselineData(BaselineData $baselineData): self
    {
        if (!$this->baselineData->contains($baselineData)) {
            $this->baselineData[] = $baselineData;
            $baselineData->setPatientId($this);
        }

        return $this;
    }

    public function removeBaselineData(BaselineData $baselineData): self
    {
        if ($this->baselineData->contains($baselineData)) {
            $this->baselineData->removeElement($baselineData);
            // set the owning side to null (unless already changed)
            if ($baselineData->getPatientId() === $this) {
                $baselineData->setPatientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|HealthMaintenance[]
     */
    public function getHealthMaintenances(): Collection
    {
        return $this->healthMaintenances;
    }

    public function addHealthMaintenance(HealthMaintenance $healthMaintenance): self
    {
        if (!$this->healthMaintenances->contains($healthMaintenance)) {
            $this->healthMaintenances[] = $healthMaintenance;
            $healthMaintenance->setPatientId($this);
        }

        return $this;
    }

    public function removeHealthMaintenance(HealthMaintenance $healthMaintenance): self
    {
        if ($this->healthMaintenances->contains($healthMaintenance)) {
            $this->healthMaintenances->removeElement($healthMaintenance);
            // set the owning side to null (unless already changed)
            if ($healthMaintenance->getPatientId() === $this) {
                $healthMaintenance->setPatientId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DailyMedications[]
     */
    public function getDailyMedications(): Collection
    {
        return $this->dailyMedications;
    }

    public function addDailyMedication(DailyMedications $dailyMedication): self
    {
        if (!$this->dailyMedications->contains($dailyMedication)) {
            $this->dailyMedications[] = $dailyMedication;
            $dailyMedication->setPatientId($this);
        }

        return $this;
    }

    public function removeDailyMedication(DailyMedications $dailyMedication): self
    {
        if ($this->dailyMedications->contains($dailyMedication)) {
            $this->dailyMedications->removeElement($dailyMedication);
            // set the owning side to null (unless already changed)
            if ($dailyMedication->getPatientId() === $this) {
                $dailyMedication->setPatientId(null);
            }
        }

        return $this;
    }
}

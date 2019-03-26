<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RatesRepository")
 */
class Rates
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
    private $credit_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $usd;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $uah;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eur;

    /**
     * @ORM\OneToMany(targetEntity="Auto", mappedBy="rates")
     */
    private $auto;

    /**
     * @return mixed
     */
    public function getCreditId()
    {
        return $this->credit_id;
    }

    /**
     * @param mixed $credit_id
     */
    public function setCreditId($credit_id): void
    {
        $this->credit_id = $credit_id;
    }

    /**
     * @return mixed
     */
    public function getUsd()
    {
        return $this->usd;
    }

    /**
     * @param mixed $usd
     */
    public function setUsd($usd): void
    {
        $this->usd = $usd;
    }

    /**
     * @return mixed
     */
    public function getUah()
    {
        return $this->uah;
    }

    /**
     * @param mixed $uah
     */
    public function setUah($uah): void
    {
        $this->uah = $uah;
    }

    /**
     * @return mixed
     */
    public function getEur()
    {
        return $this->eur;
    }

    /**
     * @param mixed $eur
     */
    public function setEur($eur): void
    {
        $this->eur = $eur;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     */
    public function setPeriod($period): void
    {
        $this->period = $period;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $period;

    public function getId(): ?int
    {
        return $this->id;
    }
}

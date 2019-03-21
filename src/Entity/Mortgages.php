<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MortgagesRepository")
 */
class Mortgages
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
    private $uri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="float")
     */
    private $commission;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $payment;

    /**
     * @ORM\Column(type="integer")
     */
    private $sumFrom;

    /**
     * @ORM\Column(type="integer")
     */
    private $sumTo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $earlyRepayment;

    /**
     * @ORM\Column(type="float")
     */
    private $monthly_commission;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $remote_offer_link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    private $bank;

    public function getId(): ?int
    {
        return $this->id;
    }

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



    public function getUri(): ?string
    {
        return $this->uri;
    }

    public function setUri(?string $uri): self
    {
        $this->uri = $uri;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCommission(): ?float
    {
        return $this->commission;
    }

    public function setCommission(float $commission): self
    {
        $this->commission = $commission;

        return $this;
    }

    public function getPayment(): ?int
    {
        return $this->payment;
    }

    public function setPayment(?int $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getSumFrom(): ?int
    {
        return $this->sumFrom;
    }

    public function setSumFrom(int $sumFrom): self
    {
        $this->sumFrom = $sumFrom;

        return $this;
    }

    public function getSumTo(): ?int
    {
        return $this->sumTo;
    }

    public function setSumTo(int $sumTo): self
    {
        $this->sumTo = $sumTo;

        return $this;
    }

    public function getEarlyRepayment(): ?string
    {
        return $this->earlyRepayment;
    }

    public function setEarlyRepayment(string $earlyRepayment): self
    {
        $this->earlyRepayment = $earlyRepayment;

        return $this;
    }

    public function getMonthlyCommission(): ?float
    {
        return $this->monthly_commission;
    }

    public function setMonthlyCommission(float $monthly_commission): self
    {
        $this->monthly_commission = $monthly_commission;

        return $this;
    }

    public function getRemoteOfferLink(): ?string
    {
        return $this->remote_offer_link;
    }

    public function setRemoteOfferLink(?string $remote_offer_link): self
    {
        $this->remote_offer_link = $remote_offer_link;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getBank(): ?int
    {
        return $this->bank;
    }

    public function setBank(int $bank): self
    {
        $this->bank = $bank;

        return $this;
    }
}

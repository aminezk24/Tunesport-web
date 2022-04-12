<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_idp", columns={"idP"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idc;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseC", type="string", length=60, nullable=false)
     */
    private $adressec;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateC", type="date", nullable=false)
     */
    private $datec;

    /**
     * @var string
     *
     * @ORM\Column(name="statusC", type="string", length=60, nullable=false)
     */
    private $statusc;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idP", referencedColumnName="idP")
     * })
     */
    private $idp;

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function getAdressec(): ?string
    {
        return $this->adressec;
    }

    public function setAdressec(string $adressec): self
    {
        $this->adressec = $adressec;

        return $this;
    }

    public function getDatec(): ?\DateTimeInterface
    {
        return $this->datec;
    }

    public function setDatec(\DateTimeInterface $datec): self
    {
        $this->datec = $datec;

        return $this;
    }

    public function getStatusc(): ?string
    {
        return $this->statusc;
    }

    public function setStatusc(string $statusc): self
    {
        $this->statusc = $statusc;

        return $this;
    }

    public function getIdp(): ?Produit
    {
        return $this->idp;
    }

    public function setIdp(?Produit $idp): self
    {
        $this->idp = $idp;

        return $this;
    }


}

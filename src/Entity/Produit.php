<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="idP", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idp;

    /**
     * @var string
     *
     * @ORM\Column(name="nomP", type="string", length=255, nullable=false)
     */
    private $nomp;

    /**
     * @var int
     *
     * @ORM\Column(name="prixP", type="integer", nullable=false)
     */
    private $prixp;

    /**
     * @var string
     *
     * @ORM\Column(name="descP", type="string", length=255, nullable=false)
     */
    private $descp;

    /**
     * @var string
     *
     * @ORM\Column(name="dispoP", type="string", length=255, nullable=false)
     */
    private $dispop;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurP", type="string", length=255, nullable=false)
     */
    private $couleurp;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteP", type="integer", nullable=false)
     */
    private $quantitep;

    /**
     * @var string
     *
     * @ORM\Column(name="tailleP", type="string", length=255, nullable=false)
     */
    private $taillep;

    public function getIdp(): ?int
    {
        return $this->idp;
    }

    public function getNomp(): ?string
    {
        return $this->nomp;
    }

    public function setNomp(string $nomp): self
    {
        $this->nomp = $nomp;

        return $this;
    }

    public function getPrixp(): ?int
    {
        return $this->prixp;
    }

    public function setPrixp(int $prixp): self
    {
        $this->prixp = $prixp;

        return $this;
    }

    public function getDescp(): ?string
    {
        return $this->descp;
    }

    public function setDescp(string $descp): self
    {
        $this->descp = $descp;

        return $this;
    }

    public function getDispop(): ?string
    {
        return $this->dispop;
    }

    public function setDispop(string $dispop): self
    {
        $this->dispop = $dispop;

        return $this;
    }

    public function getCouleurp(): ?string
    {
        return $this->couleurp;
    }

    public function setCouleurp(string $couleurp): self
    {
        $this->couleurp = $couleurp;

        return $this;
    }

    public function getQuantitep(): ?int
    {
        return $this->quantitep;
    }

    public function setQuantitep(int $quantitep): self
    {
        $this->quantitep = $quantitep;

        return $this;
    }

    public function getTaillep(): ?string
    {
        return $this->taillep;
    }

    public function setTaillep(string $taillep): self
    {
        $this->taillep = $taillep;

        return $this;
    }


}

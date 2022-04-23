<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="fk_foreign_key_idC", columns={"idC"})})
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="idliv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idliv;

    /**
     * @var int
     *
     * @ORM\Column(name="idC", type="integer", nullable=false)
     */
    private $idc;

    /**
     * @var string
     *
     * @ORM\Column(name="nomliv", type="string", length=60, nullable=false)
     */
    private $nomliv;

    /**
     * @var int
     *
     * @ORM\Column(name="telliv", type="integer", nullable=false)
     */
    private $telliv;

    /**
     * @var int
     *
     * @ORM\Column(name="fraisliv", type="integer", nullable=false)
     */
    private $fraisliv;

    /**
     * @var int
     *
     * @ORM\Column(name="prixltot", type="integer", nullable=false)
     */
    private $prixltot;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuxliv", type="string", length=255, nullable=false)
     */
    private $lieuxliv;

    public function getIdliv(): ?int
    {
        return $this->idliv;
    }

    public function getIdc(): ?int
    {
        return $this->idc;
    }

    public function setIdc(int $idc): self
    {
        $this->idc = $idc;

        return $this;
    }

    public function getNomliv(): ?string
    {
        return $this->nomliv;
    }

    public function setNomliv(string $nomliv): self
    {
        $this->nomliv = $nomliv;

        return $this;
    }

    public function getTelliv(): ?int
    {
        return $this->telliv;
    }

    public function setTelliv(int $telliv): self
    {
        $this->telliv = $telliv;

        return $this;
    }

    public function getFraisliv(): ?int
    {
        return $this->fraisliv;
    }

    public function setFraisliv(int $fraisliv): self
    {
        $this->fraisliv = $fraisliv;

        return $this;
    }

    public function getPrixltot(): ?int
    {
        return $this->prixltot;
    }

    public function setPrixltot(int $prixltot): self
    {
        $this->prixltot = $prixltot;

        return $this;
    }

    public function getLieuxliv(): ?string
    {
        return $this->lieuxliv;
    }

    public function setLieuxliv(string $lieuxliv): self
    {
        $this->lieuxliv = $lieuxliv;

        return $this;
    }


}

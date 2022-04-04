<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMen", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmen;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMen", type="string", length=255, nullable=false)
     */
    private $nommen;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomMen", type="string", length=255, nullable=false)
     */
    private $prenommen;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailMen", type="string", length=255, nullable=false)
     */
    private $emailmen;

    /**
     * @var int
     *
     * @ORM\Column(name="mdpMen", type="integer", nullable=false)
     */
    private $mdpmen;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaissMen", type="string", length=255, nullable=false)
     */
    private $datenaissmen;

    /**
     * @var string
     *
     * @ORM\Column(name="sexeMen", type="string", length=255, nullable=false)
     */
    private $sexemen;

    /**
     * @var int
     *
     * @ORM\Column(name="telMen", type="integer", nullable=false)
     */
    private $telmen;

    public function getIdmen(): ?int
    {
        return $this->idmen;
    }

    public function getNommen(): ?string
    {
        return $this->nommen;
    }

    public function setNommen(string $nommen): self
    {
        $this->nommen = $nommen;

        return $this;
    }

    public function getPrenommen(): ?string
    {
        return $this->prenommen;
    }

    public function setPrenommen(string $prenommen): self
    {
        $this->prenommen = $prenommen;

        return $this;
    }

    public function getEmailmen(): ?string
    {
        return $this->emailmen;
    }

    public function setEmailmen(string $emailmen): self
    {
        $this->emailmen = $emailmen;

        return $this;
    }

    public function getMdpmen(): ?int
    {
        return $this->mdpmen;
    }

    public function setMdpmen(int $mdpmen): self
    {
        $this->mdpmen = $mdpmen;

        return $this;
    }

    public function getDatenaissmen(): ?string
    {
        return $this->datenaissmen;
    }

    public function setDatenaissmen(string $datenaissmen): self
    {
        $this->datenaissmen = $datenaissmen;

        return $this;
    }

    public function getSexemen(): ?string
    {
        return $this->sexemen;
    }

    public function setSexemen(string $sexemen): self
    {
        $this->sexemen = $sexemen;

        return $this;
    }

    public function getTelmen(): ?int
    {
        return $this->telmen;
    }

    public function setTelmen(int $telmen): self
    {
        $this->telmen = $telmen;

        return $this;
    }


}

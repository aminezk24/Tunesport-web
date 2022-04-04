<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi")
 * @ORM\Entity
 */
class Tournoi
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtour;

    /**
     * @var string
     *
     * @ORM\Column(name="nomtour", type="string", length=30, nullable=false)
     */
    private $nomtour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebtour", type="date", nullable=false)
     */
    private $datedebtour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefintour", type="date", nullable=false)
     */
    private $datefintour;

    /**
     * @var string
     *
     * @ORM\Column(name="desctour", type="string", length=255, nullable=false)
     */
    private $desctour;

    /**
     * @var string
     *
     * @ORM\Column(name="recomptour", type="string", length=255, nullable=false)
     */
    private $recomptour;

    public function getIdtour(): ?int
    {
        return $this->idtour;
    }

    public function getNomtour(): ?string
    {
        return $this->nomtour;
    }

    public function setNomtour(string $nomtour): self
    {
        $this->nomtour = $nomtour;

        return $this;
    }

    public function getDatedebtour(): ?\DateTimeInterface
    {
        return $this->datedebtour;
    }

    public function setDatedebtour(\DateTimeInterface $datedebtour): self
    {
        $this->datedebtour = $datedebtour;

        return $this;
    }

    public function getDatefintour(): ?\DateTimeInterface
    {
        return $this->datefintour;
    }

    public function setDatefintour(\DateTimeInterface $datefintour): self
    {
        $this->datefintour = $datefintour;

        return $this;
    }

    public function getDesctour(): ?string
    {
        return $this->desctour;
    }

    public function setDesctour(string $desctour): self
    {
        $this->desctour = $desctour;

        return $this;
    }

    public function getRecomptour(): ?string
    {
        return $this->recomptour;
    }

    public function setRecomptour(string $recomptour): self
    {
        $this->recomptour = $recomptour;

        return $this;
    }


}

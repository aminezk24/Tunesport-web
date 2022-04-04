<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jeux
 *
 * @ORM\Table(name="jeux")
 * @ORM\Entity
 */
class Jeux
{
    /**
     * @var int
     *
     * @ORM\Column(name="idjeux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idjeux;

    /**
     * @var string
     *
     * @ORM\Column(name="nomjeux", type="string", length=50, nullable=false)
     */
    private $nomjeux;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datesortjeux", type="date", nullable=false)
     */
    private $datesortjeux;

    /**
     * @var int
     *
     * @ORM\Column(name="taillejeux", type="integer", nullable=false)
     */
    private $taillejeux;

    /**
     * @var string
     *
     * @ORM\Column(name="descjeux", type="string", length=300, nullable=false)
     */
    private $descjeux;

    /**
     * @var string
     *
     * @ORM\Column(name="platdispojeux", type="string", length=60, nullable=false)
     */
    private $platdispojeux;

    /**
     * @var string
     *
     * @ORM\Column(name="conreqjeux", type="string", length=300, nullable=false)
     */
    private $conreqjeux;

    public function getIdjeux(): ?int
    {
        return $this->idjeux;
    }

    public function getNomjeux(): ?string
    {
        return $this->nomjeux;
    }

    public function setNomjeux(string $nomjeux): self
    {
        $this->nomjeux = $nomjeux;

        return $this;
    }

    public function getDatesortjeux(): ?\DateTimeInterface
    {
        return $this->datesortjeux;
    }

    public function setDatesortjeux(\DateTimeInterface $datesortjeux): self
    {
        $this->datesortjeux = $datesortjeux;

        return $this;
    }

    public function getTaillejeux(): ?int
    {
        return $this->taillejeux;
    }

    public function setTaillejeux(int $taillejeux): self
    {
        $this->taillejeux = $taillejeux;

        return $this;
    }

    public function getDescjeux(): ?string
    {
        return $this->descjeux;
    }

    public function setDescjeux(string $descjeux): self
    {
        $this->descjeux = $descjeux;

        return $this;
    }

    public function getPlatdispojeux(): ?string
    {
        return $this->platdispojeux;
    }

    public function setPlatdispojeux(string $platdispojeux): self
    {
        $this->platdispojeux = $platdispojeux;

        return $this;
    }

    public function getConreqjeux(): ?string
    {
        return $this->conreqjeux;
    }

    public function setConreqjeux(string $conreqjeux): self
    {
        $this->conreqjeux = $conreqjeux;

        return $this;
    }


}

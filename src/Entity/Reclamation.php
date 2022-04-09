<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_r", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idR;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_r", type="string", length=255, nullable=false)
     */
    private $descR;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_r", type="date", nullable=false)
     */
    private $dateR;

    /**
     * @var string
     *
     * @ORM\Column(name="statu_r", type="string", length=255, nullable=false)
     */
    private $statuR;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heur_r", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $heurR = 'CURRENT_TIMESTAMP';

    public function getIdR(): ?int
    {
        return $this->idR;
    }

    public function getDescR(): ?string
    {
        return $this->descR;
    }

    public function setDescR(string $descR): self
    {
        $this->descR = $descR;

        return $this;
    }

    public function getDateR(): ?\DateTimeInterface
    {
        return $this->dateR;
    }

    public function setDateR(\DateTimeInterface $dateR): self
    {
        $this->dateR = $dateR;

        return $this;
    }

    public function getStatuR(): ?string
    {
        return $this->statuR;
    }

    public function setStatuR(string $statuR): self
    {
        $this->statuR = $statuR;

        return $this;
    }

    public function getHeurR(): ?\DateTimeInterface
    {
        return $this->heurR;
    }

    public function setHeurR(\DateTimeInterface $heurR): self
    {
        $this->heurR = $heurR;

        return $this;
    }


}

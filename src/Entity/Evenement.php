<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="nomevent", type="string", length=30, nullable=false)
     */
    private $nomevent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebevent", type="date", nullable=false)
     */
    private $datedebevent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefinevent", type="date", nullable=false)
     */
    private $datefinevent;

    /**
     * @var string
     *
     * @ORM\Column(name="descevent", type="string", length=255, nullable=false)
     */
    private $descevent;

    public function getIdEvent(): ?int
    {
        return $this->idEvent;
    }

    public function getNomevent(): ?string
    {
        return $this->nomevent;
    }

    public function setNomevent(string $nomevent): self
    {
        $this->nomevent = $nomevent;

        return $this;
    }

    public function getDatedebevent(): ?\DateTimeInterface
    {
        return $this->datedebevent;
    }

    public function setDatedebevent(\DateTimeInterface $datedebevent): self
    {
        $this->datedebevent = $datedebevent;

        return $this;
    }

    public function getDatefinevent(): ?\DateTimeInterface
    {
        return $this->datefinevent;
    }

    public function setDatefinevent(\DateTimeInterface $datefinevent): self
    {
        $this->datefinevent = $datefinevent;

        return $this;
    }

    public function getDescevent(): ?string
    {
        return $this->descevent;
    }

    public function setDescevent(string $descevent): self
    {
        $this->descevent = $descevent;

        return $this;
    }


}

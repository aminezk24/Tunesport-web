<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrat;

    /**
     * @var string
     *
     * @ORM\Column(name="titleRat", type="string", length=20, nullable=false)
     */
    private $titlerat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRat", type="date", nullable=false)
     */
    private $daterat;

    /**
     * @var int
     *
     * @ORM\Column(name="valueRat", type="integer", nullable=false)
     */
    private $valuerat;

    /**
     * @var int
     *
     * @ORM\Column(name="idCli", type="integer", nullable=false)
     */
    private $idcli;

    /**
     * @var int
     *
     * @ORM\Column(name="idCoa", type="integer", nullable=false)
     */
    private $idcoa;

    public function getIdrat(): ?int
    {
        return $this->idrat;
    }

    public function getTitlerat(): ?string
    {
        return $this->titlerat;
    }

    public function setTitlerat(string $titlerat): self
    {
        $this->titlerat = $titlerat;

        return $this;
    }

    public function getDaterat(): ?\DateTimeInterface
    {
        return $this->daterat;
    }

    public function setDaterat(\DateTimeInterface $daterat): self
    {
        $this->daterat = $daterat;

        return $this;
    }

    public function getValuerat(): ?int
    {
        return $this->valuerat;
    }

    public function setValuerat(int $valuerat): self
    {
        $this->valuerat = $valuerat;

        return $this;
    }

    public function getIdcli(): ?int
    {
        return $this->idcli;
    }

    public function setIdcli(int $idcli): self
    {
        $this->idcli = $idcli;

        return $this;
    }

    public function getIdcoa(): ?int
    {
        return $this->idcoa;
    }

    public function setIdcoa(int $idcoa): self
    {
        $this->idcoa = $idcoa;

        return $this;
    }


}

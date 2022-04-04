<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRes", type="date", nullable=false)
     */
    private $dateres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureRes", type="time", nullable=false)
     */
    private $heureres;

    /**
     * @var string
     *
     * @ORM\Column(name="dispoRes", type="string", length=10, nullable=false)
     */
    private $dispores;

    /**
     * @var float
     *
     * @ORM\Column(name="prixRes", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixres;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idCli", type="integer", nullable=true, options={"default"="NULL"})
     */
    private $idcli = NULL;

    /**
     * @var int
     *
     * @ORM\Column(name="idCoa", type="integer", nullable=false)
     */
    private $idcoa;

    public function getIdres(): ?int
    {
        return $this->idres;
    }

    public function getDateres(): ?\DateTimeInterface
    {
        return $this->dateres;
    }

    public function setDateres(\DateTimeInterface $dateres): self
    {
        $this->dateres = $dateres;

        return $this;
    }

    public function getHeureres(): ?\DateTimeInterface
    {
        return $this->heureres;
    }

    public function setHeureres(\DateTimeInterface $heureres): self
    {
        $this->heureres = $heureres;

        return $this;
    }

    public function getDispores(): ?string
    {
        return $this->dispores;
    }

    public function setDispores(string $dispores): self
    {
        $this->dispores = $dispores;

        return $this;
    }

    public function getPrixres(): ?float
    {
        return $this->prixres;
    }

    public function setPrixres(float $prixres): self
    {
        $this->prixres = $prixres;

        return $this;
    }

    public function getIdcli(): ?int
    {
        return $this->idcli;
    }

    public function setIdcli(?int $idcli): self
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

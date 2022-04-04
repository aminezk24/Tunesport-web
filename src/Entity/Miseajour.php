<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Miseajour
 *
 * @ORM\Table(name="miseajour", indexes={@ORM\Index(name="fk_jeux", columns={"idjeux"})})
 * @ORM\Entity
 */
class Miseajour
{
    /**
     * @var int
     *
     * @ORM\Column(name="idmise", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmise;

    /**
     * @var string
     *
     * @ORM\Column(name="nomjeu", type="string", length=60, nullable=false)
     */
    private $nomjeu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pubmise", type="date", nullable=false)
     */
    private $pubmise;

    /**
     * @var string
     *
     * @ORM\Column(name="versionmise", type="string", length=60, nullable=false)
     */
    private $versionmise;

    /**
     * @var int
     *
     * @ORM\Column(name="taillemise", type="integer", nullable=false)
     */
    private $taillemise;

    /**
     * @var string
     *
     * @ORM\Column(name="descmise", type="string", length=300, nullable=false)
     */
    private $descmise;

    /**
     * @var \Jeux
     *
     * @ORM\ManyToOne(targetEntity="Jeux")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idjeux", referencedColumnName="idjeux")
     * })
     */
    private $idjeux;

    public function getIdmise(): ?int
    {
        return $this->idmise;
    }

    public function getNomjeu(): ?string
    {
        return $this->nomjeu;
    }

    public function setNomjeu(string $nomjeu): self
    {
        $this->nomjeu = $nomjeu;

        return $this;
    }

    public function getPubmise(): ?\DateTimeInterface
    {
        return $this->pubmise;
    }

    public function setPubmise(\DateTimeInterface $pubmise): self
    {
        $this->pubmise = $pubmise;

        return $this;
    }

    public function getVersionmise(): ?string
    {
        return $this->versionmise;
    }

    public function setVersionmise(string $versionmise): self
    {
        $this->versionmise = $versionmise;

        return $this;
    }

    public function getTaillemise(): ?int
    {
        return $this->taillemise;
    }

    public function setTaillemise(int $taillemise): self
    {
        $this->taillemise = $taillemise;

        return $this;
    }

    public function getDescmise(): ?string
    {
        return $this->descmise;
    }

    public function setDescmise(string $descmise): self
    {
        $this->descmise = $descmise;

        return $this;
    }

    public function getIdjeux(): ?Jeux
    {
        return $this->idjeux;
    }

    public function setIdjeux(?Jeux $idjeux): self
    {
        $this->idjeux = $idjeux;

        return $this;
    }


}

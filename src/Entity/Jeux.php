<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @ORM\GeneratedValue
     */
    private $idjeux;

    /**
     * @var string
     * @Assert\NotBlank(message="nom jeux is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
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
     * @var string
     * @Assert\NotBlank(message="taille jeux is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     *
     * @ORM\Column(name="taillejeux", type="string", length=60, nullable=false)
     */
    private $taillejeux;

    /**
     * @var string
     * @Assert\NotBlank(message="description is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     *
     * @ORM\Column(name="descjeux", type="string", length=300, nullable=false)
     */
    private $descjeux;

    /**
     * @var string
     * @Assert\NotBlank(message="platforme is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     *@Assert\Choice({"console", "pc","mobile"})
     *@Assert\NotBlank(message="vous n'avez rien choisi")
     * @ORM\Column(name="platdispojeux", type="string", length=60, nullable=false)
     */
    private $platdispojeux;

    /**
     * @var string
     * @Assert\NotBlank(message="configuration is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     *
     *
     * @ORM\Column(name="conreqjeux", type="string", length=300, nullable=false)
     */
    private $conreqjeux;

    /**
     * @ORM\OneToMany(targetEntity=Miseajour::class, mappedBy="Jeux")
     */
    private $miseajours;

    public function __construct()
    {
        $this->miseajours = new ArrayCollection();
    }



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

    public function getTaillejeux(): ?string
    {
        return $this->taillejeux;
    }

    public function setTaillejeux(string $taillejeux): self
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

    /**
     * @return Collection<int, Miseajour>
     */
    public function getMiseajours(): Collection
    {
        return $this->miseajours;
    }

    public function addMiseajour(Miseajour $miseajour): self
    {
        if (!$this->miseajours->contains($miseajour)) {
            $this->miseajours[] = $miseajour;
            $miseajour->setJeux($this);
        }

        return $this;
    }

    public function removeMiseajour(Miseajour $miseajour): self
    {
        if ($this->miseajours->removeElement($miseajour)) {
            // set the owning side to null (unless already changed)
            if ($miseajour->getJeux() === $this) {
                $miseajour->setJeux(null);
            }
        }

        return $this;
    }



}

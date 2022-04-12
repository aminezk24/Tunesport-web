<?php

namespace App\Entity;

use App\Repository\MiseajourRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=MiseajourRepository::class)
 */
class Miseajour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @Assert\NotBlank(message="nom jeu is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     * @ORM\Column(type="string", length=255)
     */
    private $nomjeu;

    /**
     * @ORM\Column(type="date")
     */
    private $pubmise;

    /**
     * @Assert\NotBlank(message="version mise a jour is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     * @ORM\Column(type="string", length=255)
     */
    private $versionmise;

    /**
     * @Assert\NotBlank(message="taille  is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     * @ORM\Column(type="string", length=255)
     */
    private $taillemise;

    /**
     * @Assert\NotBlank(message="descmise is empty")
     * @Assert\Length(
     *     min = 2,
     *     max = 50,
     *     minMessage = "doit etre >=2",
     *     maxMessage = "doit etre <=50")
     * @ORM\Column(type="string", length=255)
     */
    private $descmise;

    /**
    /*** @ORM\ManyToOne(targetEntity="Jeux" , inversedBy="miseajours")
     * @ORM\JoinColumn(name="idjeux", referencedColumnName="idjeux")
     */

    private $jeux;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
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

    public function getTaillemise(): ?string
    {
        return $this->taillemise;
    }

    public function setTaillemise(string $taillemise): self
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

    public function getJeux(): ?Jeux
    {
        return $this->jeux;
    }

    public function setJeux(?Jeux $jeux): self
    {
        $this->jeux = $jeux;

        return $this;
    }

    public function __toString()
    {
        return $this->getNomjeu();
    }

}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank(message=" nomevent doit etre non vide")
     * @Assert\Length(
     *      min = 5,
     *      minMessage=" Entrer un nom d'evenement au mini de 5 caracteres"
     *
     *     )
     * @ORM\Column(name="nomevent" , type="string", length=255)
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
     *@Assert\NotBlank(message=" categorie doit etre non vide")
     * @ORM\Column(name="descevent" , type="string", length=255)
     */
    private $descevent;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="evenements")
     */
    private $categorie;

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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }


}

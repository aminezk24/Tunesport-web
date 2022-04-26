<?php

namespace App\Entity;

use App\Repository\LivreurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreurRepository::class)
 */
class Livreur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomliv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomliv;

    /**
     * @ORM\Column(type="integer")
     */
    private $telliv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typevehi;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dispo;

    /**
     * @ORM\OneToMany(targetEntity=Livraison::class, mappedBy="livreur")
     */
    private $livraison;

    public function __construct()
    {
        $this->livraison = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomliv(): ?string
    {
        return $this->nomliv;
    }

    public function setNomliv(string $nomliv): self
    {
        $this->nomliv = $nomliv;

        return $this;
    }

    public function getPrenomliv(): ?string
    {
        return $this->prenomliv;
    }

    public function setPrenomliv(string $prenomliv): self
    {
        $this->prenomliv = $prenomliv;

        return $this;
    }

    public function getTelliv(): ?int
    {
        return $this->telliv;
    }

    public function setTelliv(int $telliv): self
    {
        $this->telliv = $telliv;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getTypevehi(): ?string
    {
        return $this->typevehi;
    }

    public function setTypevehi(string $typevehi): self
    {
        $this->typevehi = $typevehi;

        return $this;
    }

    public function getDispo(): ?string
    {
        return $this->dispo;
    }

    public function setDispo(string $dispo): self
    {
        $this->dispo = $dispo;

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraison(): Collection
    {
        return $this->livraison;
    }

    public function addLivraison(Livraison $livraison): self
    {
        if (!$this->livraison->contains($livraison)) {
            $this->livraison[] = $livraison;
            $livraison->setLivreur($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): self
    {
        if ($this->livraison->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getLivreur() === $this) {
                $livraison->setLivreur(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\CategorieproduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieproduitRepository::class)
 */
class Categorieproduit
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
    private $nomCP;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descCP;

    /**
     * @ORM\OneToMany(targetEntity=Produit::class, mappedBy="categorieproduit")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCP(): ?string
    {
        return $this->nomCP;
    }

    public function setNomCP(string $nomCP): self
    {
        $this->nomCP = $nomCP;

        return $this;
    }

    public function getDescCP(): ?string
    {
        return $this->descCP;
    }

    public function setDescCP(string $descCP): self
    {
        $this->descCP = $descCP;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setCategorieproduit($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCategorieproduit() === $this) {
                $produit->setCategorieproduit(null);
            }
        }

        return $this;
    }
}

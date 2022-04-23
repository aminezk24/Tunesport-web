<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit", indexes={@ORM\Index(name="fk_foreign_key_idCP", columns={"categorieproduit_id"})})
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="idP", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idp;

    /**
     * @var string
     *
     * @ORM\Column(name="nomP", type="string", length=255, nullable=false)
     */
    private $nomp;

    /**
     * @var int
     *
     * @ORM\Column(name="prixP", type="integer", nullable=false)
     */
    private $prixp;

    /**
     * @var string
     *
     * @ORM\Column(name="descP", type="string", length=255, nullable=false)
     */
    private $descp;

    /**
     * @var string
     *
     * @ORM\Column(name="dispoP", type="string", length=255, nullable=false)
     */
    private $dispop;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurP", type="string", length=255, nullable=false)
     */
    private $couleurp;

    /**
     * @var int
     *
     * @ORM\Column(name="quantiteP", type="integer", nullable=false)
     */
    private $quantitep;

    /**
     * @var string
     *
     * @ORM\Column(name="tailleP", type="string", length=255, nullable=false)
     */
    private $taillep;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=false)
     */
    private $image;

    /**
     * @var \Categorieproduit
     *
     * @ORM\ManyToOne(targetEntity="Categorieproduit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorieproduit_id", referencedColumnName="id")
     * })
     */
    private $categorieproduit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Utilisateur", mappedBy="idp")
     */
    private $iduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iduser = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getIdp(): ?int
    {
        return $this->idp;
    }

    public function getNomp(): ?string
    {
        return $this->nomp;
    }

    public function setNomp(string $nomp): self
    {
        $this->nomp = $nomp;

        return $this;
    }

    public function getPrixp(): ?int
    {
        return $this->prixp;
    }

    public function setPrixp(int $prixp): self
    {
        $this->prixp = $prixp;

        return $this;
    }

    public function getDescp(): ?string
    {
        return $this->descp;
    }

    public function setDescp(string $descp): self
    {
        $this->descp = $descp;

        return $this;
    }

    public function getDispop(): ?string
    {
        return $this->dispop;
    }

    public function setDispop(string $dispop): self
    {
        $this->dispop = $dispop;

        return $this;
    }

    public function getCouleurp(): ?string
    {
        return $this->couleurp;
    }

    public function setCouleurp(string $couleurp): self
    {
        $this->couleurp = $couleurp;

        return $this;
    }

    public function getQuantitep(): ?int
    {
        return $this->quantitep;
    }

    public function setQuantitep(int $quantitep): self
    {
        $this->quantitep = $quantitep;

        return $this;
    }

    public function getTaillep(): ?string
    {
        return $this->taillep;
    }

    public function setTaillep(string $taillep): self
    {
        $this->taillep = $taillep;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorieproduit(): ?Categorieproduit
    {
        return $this->categorieproduit;
    }

    public function setCategorieproduit(?Categorieproduit $categorieproduit): self
    {
        $this->categorieproduit = $categorieproduit;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getIduser(): Collection
    {
        return $this->iduser;
    }

    public function addIduser(Utilisateur $iduser): self
    {
        if (!$this->iduser->contains($iduser)) {
            $this->iduser[] = $iduser;
            $iduser->addIdp($this);
        }

        return $this;
    }

    public function removeIduser(Utilisateur $iduser): self
    {
        if ($this->iduser->removeElement($iduser)) {
            $iduser->removeIdp($this);
        }

        return $this;
    }
    public function __toString() {
        return strval($this->idp);
    }
}

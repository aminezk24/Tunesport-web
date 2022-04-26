<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity
 */
class Livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="idliv", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idliv;

    /**
     * @var string
     *
     * @ORM\Column(name="adressel", type="string", length=60, nullable=false)
     */
    private $adressel;

    /**
     * @var float
     *
     * @ORM\Column(name="prixP", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="validation", type="string", length=255, nullable=true, options={"default"="NonValide"})
     */
    private $validation = 'NonValide';



    /**
     * @ORM\ManyToOne(targetEntity=Livreur::class, inversedBy="livraison")
     */
    private $livreur;

    public function getLivreur(): ?Livreur
    {
        return $this->livreur;
    }

    public function setLivreur(?Livreur $livreur): self
    {
        $this->livreur = $livreur;

        return $this;
    }

    public function getIdliv(): ?int
    {
        return $this->idliv;
    }

    public function getAdressel(): ?string
    {
        return $this->adressel;
    }

    public function setAdressel(string $adressel): self
    {
        $this->adressel = $adressel;

        return $this;
    }

    public function getPrixp(): ?float
    {
        return $this->prixp;
    }

    public function setPrixp(float $prixp): self
    {
        $this->prixp = $prixp;

        return $this;
    }

    public function getValidation(): ?string
    {
        return $this->validation;
    }

    public function setValidation(?string $validation): self
    {
        $this->validation = $validation;

        return $this;
    }


}

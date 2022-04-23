<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorieproduit
 *
 * @ORM\Table(name="categorieproduit")
 * @ORM\Entity
 */
class Categorieproduit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cp", type="string", length=255, nullable=false)
     */
    private $nomCp;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_cp", type="string", length=255, nullable=false)
     */
    private $descCp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCp(): ?string
    {
        return $this->nomCp;
    }

    public function setNomCp(string $nomCp): self
    {
        $this->nomCp = $nomCp;

        return $this;
    }

    public function getDescCp(): ?string
    {
        return $this->descCp;
    }

    public function setDescCp(string $descCp): self
    {
        $this->descCp = $descCp;

        return $this;
    }


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
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
     * @ORM\Column(name="nomP", type="string", length=60, nullable=false)
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
     * @ORM\Column(name="descP", type="string", length=60, nullable=false)
     */
    private $descp;

    /**
     * @var string
     *
     * @ORM\Column(name="dispoP", type="string", length=60, nullable=false)
     */
    private $dispop;

    /**
     * @var string
     *
     * @ORM\Column(name="couleurP", type="string", length=60, nullable=false)
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
     * @ORM\Column(name="tailleP", type="string", length=30, nullable=false)
     */
    private $taillep;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande", indexes={@ORM\Index(name="fk_foreign_key_id", columns={"idP"})})
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="idC", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idc;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseC", type="string", length=255, nullable=false)
     */
    private $adressec;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateC", type="date", nullable=false)
     */
    private $datec;

    /**
     * @var string
     *
     * @ORM\Column(name="statusC", type="string", length=10, nullable=false)
     */
    private $statusc;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idP", referencedColumnName="idP")
     * })
     */
    private $idp;


}

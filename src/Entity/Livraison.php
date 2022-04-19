<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livraison
 *
 * @ORM\Table(name="livraison", indexes={@ORM\Index(name="IDX_A60C9F1F56039734", columns={"idC"})})
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
     * @var \Commande
     *
     * @ORM\ManyToOne(targetEntity="Commande")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idC", referencedColumnName="idC")
     * })
     */
    private $idc;


}

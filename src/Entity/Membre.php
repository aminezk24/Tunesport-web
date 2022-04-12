<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\Entity
 */
class Membre
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMen", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmen;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMen", type="string", length=255, nullable=false)
     */
    private $nommen;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomMen", type="string", length=255, nullable=false)
     */
    private $prenommen;

    /**
     * @var string
     *
     * @ORM\Column(name="EmailMen", type="string", length=255, nullable=false)
     */
    private $emailmen;

    /**
     * @var int
     *
     * @ORM\Column(name="mdpMen", type="integer", nullable=false)
     */
    private $mdpmen;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaissMen", type="string", length=255, nullable=false)
     */
    private $datenaissmen;

    /**
     * @var string
     *
     * @ORM\Column(name="sexeMen", type="string", length=255, nullable=false)
     */
    private $sexemen;

    /**
     * @var int
     *
     * @ORM\Column(name="telMen", type="integer", nullable=false)
     */
    private $telmen;


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="nomevent", type="string", length=30, nullable=false)
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
     *
     * @ORM\Column(name="descevent", type="string", length=255, nullable=false)
     */
    private $descevent;


}

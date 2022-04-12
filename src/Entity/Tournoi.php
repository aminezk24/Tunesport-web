<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tournoi
 *
 * @ORM\Table(name="tournoi")
 * @ORM\Entity
 */
class Tournoi
{
    /**
     * @var int
     *
     * @ORM\Column(name="idtour", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtour;

    /**
     * @var string
     *
     * @ORM\Column(name="nomtour", type="string", length=30, nullable=false)
     */
    private $nomtour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebtour", type="date", nullable=false)
     */
    private $datedebtour;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefintour", type="date", nullable=false)
     */
    private $datefintour;

    /**
     * @var string
     *
     * @ORM\Column(name="desctour", type="string", length=255, nullable=false)
     */
    private $desctour;

    /**
     * @var string
     *
     * @ORM\Column(name="recomptour", type="string", length=255, nullable=false)
     */
    private $recomptour;


}

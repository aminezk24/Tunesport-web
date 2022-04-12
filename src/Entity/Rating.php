<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrat;

    /**
     * @var string
     *
     * @ORM\Column(name="titleRat", type="string", length=20, nullable=false)
     */
    private $titlerat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRat", type="date", nullable=false)
     */
    private $daterat;

    /**
     * @var int
     *
     * @ORM\Column(name="valueRat", type="integer", nullable=false)
     */
    private $valuerat;

    /**
     * @var int
     *
     * @ORM\Column(name="idCli", type="integer", nullable=false)
     */
    private $idcli;

    /**
     * @var int
     *
     * @ORM\Column(name="idCoa", type="integer", nullable=false)
     */
    private $idcoa;


}

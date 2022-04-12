<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var int
     *
     * @ORM\Column(name="idRes", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRes", type="date", nullable=false)
     */
    private $dateres;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureRes", type="time", nullable=false)
     */
    private $heureres;

    /**
     * @var string
     *
     * @ORM\Column(name="dispoRes", type="string", length=10, nullable=false)
     */
    private $dispores;

    /**
     * @var float
     *
     * @ORM\Column(name="prixRes", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixres;

    /**
     * @var int|null
     *
     * @ORM\Column(name="idCli", type="integer", nullable=true)
     */
    private $idcli;

    /**
     * @var int
     *
     * @ORM\Column(name="idCoa", type="integer", nullable=false)
     */
    private $idcoa;


}

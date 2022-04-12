<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jeux
 *
 * @ORM\Table(name="jeux")
 * @ORM\Entity
 */
class Jeux
{
    /**
     * @var int
     *
     * @ORM\Column(name="idjeux", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idjeux;

    /**
     * @var string
     *
     * @ORM\Column(name="nomjeux", type="string", length=50, nullable=false)
     */
    private $nomjeux;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datesortjeux", type="date", nullable=false)
     */
    private $datesortjeux;

    /**
     * @var int
     *
     * @ORM\Column(name="taillejeux", type="integer", nullable=false)
     */
    private $taillejeux;

    /**
     * @var string
     *
     * @ORM\Column(name="descjeux", type="string", length=300, nullable=false)
     */
    private $descjeux;

    /**
     * @var string
     *
     * @ORM\Column(name="platdispojeux", type="string", length=60, nullable=false)
     */
    private $platdispojeux;

    /**
     * @var string
     *
     * @ORM\Column(name="conreqjeux", type="string", length=300, nullable=false)
     */
    private $conreqjeux;


}

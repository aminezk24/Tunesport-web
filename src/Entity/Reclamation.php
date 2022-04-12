<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_r", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idR;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_r", type="string", length=255, nullable=false)
     */
    private $descR;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_r", type="date", nullable=false)
     */
    private $dateR;

    /**
     * @var string
     *
     * @ORM\Column(name="statu_r", type="string", length=255, nullable=false)
     */
    private $statuR;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heur_r", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $heurR = 'CURRENT_TIMESTAMP';


}

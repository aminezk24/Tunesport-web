<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires", indexes={@ORM\Index(name="fk_id_article", columns={"id_art"})})
 * @ORM\Entity
 */
class Commentaires
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commentaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_commentaire", type="string", length=255, nullable=false)
     */
    private $titreCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_commentaire", type="text", length=65535, nullable=false)
     */
    private $contenuCommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commentaire", type="date", nullable=false)
     */
    private $dateCommentaire;

    /**
     * @var int
     *
     * @ORM\Column(name="id_art", type="integer", nullable=false)
     */
    private $idArt;


}

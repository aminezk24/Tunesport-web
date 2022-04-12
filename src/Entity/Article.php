<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_article", type="string", length=255, nullable=false)
     */
    private $titreArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="description_article", type="text", length=65535, nullable=false)
     */
    private $descriptionArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_article", type="date", nullable=false)
     */
    private $dateArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="image_article", type="string", length=255, nullable=false)
     */
    private $imageArticle;


}

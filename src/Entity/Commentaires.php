<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Commentaires
 *
 * @ORM\Table(name="commentaires", indexes={@ORM\Index(name="teeee", columns={"titre_article"})})
 * @ORM\Entity(repositoryClass="App\Repository\CommentairesRepository")
 * @UniqueEntity(
 *     fields={"titreCommentaire"},
 *     message="This Username Already Exists!"
 * )
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
     * @Assert\NotBlank(message="Enter Your Username Please!")
     * @Assert\Length(
     *     min= 5,
     *     max= 15,
     *     minMessage="Too Short For A Username !",
     *     maxMessage="Too Long For A Username !"
     * )
     */
    private $titreCommentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu_commentaire", type="text", length=65535, nullable=false)
     * @Assert\NotBlank(message="Enter Votre Commentaire Please!")
     */
    private $contenuCommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commentaire", type="date", nullable=false)
     */
    private $dateCommentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="commentairess")
     * @ORM\JoinColumn(name="titre_article", referencedColumnName="id_article" , nullable=false , onDelete="CASCADE" )
     */
    private $titreArticle;

    /**
     * @return mixed
     */
    public function getTitreArticle()
    {
        return $this->titreArticle;
    }

    /**
     * @param mixed $titreArticle
     */
    public function setTitreArticle($titreArticle): void
    {
        $this->titreArticle = $titreArticle;
    }

    public function getIdCommentaire(): ?int
    {
        return $this->idCommentaire;
    }

    public function getTitreCommentaire(): ?string
    {
        return $this->titreCommentaire;
    }

    public function setTitreCommentaire(string $titreCommentaire): self
    {
        $this->titreCommentaire = $titreCommentaire;

        return $this;
    }

    public function getContenuCommentaire(): ?string
    {
        return $this->contenuCommentaire;
    }

    public function setContenuCommentaire(string $contenuCommentaire): self
    {
        $this->contenuCommentaire = $contenuCommentaire;

        return $this;
    }

    public function getDateCommentaire(): ?\DateTimeInterface
    {
        return $this->dateCommentaire;
    }

    public function setDateCommentaire(\DateTimeInterface $dateCommentaire): self
    {
        $this->dateCommentaire = $dateCommentaire;

        return $this;
    }




}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Article
 *
 * @ORM\Table(name="article")
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 * @UniqueEntity(
 *     fields={"titreArticle"},
 *     message="This Title Already Exists!"
 * )
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
     * @Assert\NotBlank(message="Enter The Title Please!")
     * @Assert\Length(
     *     min= 5,
     *     max= 15,
     *     minMessage="Too Short For A Title!",
     *     maxMessage="Too Long For A Title!"
     * )
     */
    private $titreArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="description_article", type="text", length=65535, nullable=false)
     *  @Assert\NotBlank(message="Enter Your Description Please!")
     */
    private $descriptionArticle;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_article", type="date", nullable=false)
     *  @Assert\DateTime(message="Enter the Current DateTime Please!")
     */
    private $dateArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="image_article", type="string", length=255, nullable=false)
     */
    private $imageArticle;

    public function getIdArticle(): ?int
    {
        return $this->idArticle;
    }

    public function getTitreArticle(): ?string
    {
        return $this->titreArticle;
    }

    public function setTitreArticle(string $titreArticle): self
    {
        $this->titreArticle = $titreArticle;

        return $this;
    }

    public function getDescriptionArticle(): ?string
    {
        return $this->descriptionArticle;
    }

    public function setDescriptionArticle(string $descriptionArticle): self
    {
        $this->descriptionArticle = $descriptionArticle;

        return $this;
    }

    public function getDateArticle(): ?\DateTimeInterface
    {
        return $this->dateArticle;
    }

    public function setDateArticle(\DateTimeInterface $dateArticle): self
    {
        $this->dateArticle = $dateArticle;

        return $this;
    }

    public function getImageArticle(): ?string
    {
        return $this->imageArticle;
    }

    public function setImageArticle(string $imageArticle): self
    {
        $this->imageArticle = $imageArticle;

        return $this;
    }
    public function __toString() {
        return $this->titreArticle;
    }

}

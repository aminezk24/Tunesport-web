<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Coaching", mappedBy="category")
     */
    private $coachings;


    public function __construct()
    {
        $this->coachings = new ArrayCollection();
    }


    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Enter Your Category Name Please!")
     * @Assert\Length(
     *     min= 5,
     *     max= 20,
     *     minMessage="Too Short For A Name!",
     *     maxMessage="Too Long For A Name!"
     * )
     */

    private $nameCat;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Enter A Description Here Please!")
     * @Assert\Length(
     *     min= 5,
     *     max= 40,
     *     minMessage="Too Short For A Description!",
     *     maxMessage="Too Long For A Description!"
     * )
     */
    private $descCat;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameCat(): ?string
    {
        return $this->nameCat;
    }

    public function setNameCat(string $nameCat): self
    {
        $this->nameCat = $nameCat;

        return $this;
    }

    public function getDescCat(): ?string
    {
        return $this->descCat;
    }

    public function setDescCat(string $descCat): self
    {
        $this->descCat = $descCat;

        return $this;
    }
}

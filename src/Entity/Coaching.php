<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Coaching
 *
 * @ORM\Table(name="coaching")
 * @ORM\Entity
 * @UniqueEntity(
 *     fields={"nicknamecoa"},
 *     message="This Nickname Already Exists!"
 * )
 */
class Coaching
{

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="coachings")
     */
    private $category;

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jeux", inversedBy="coachings")
     * @ORM\JoinColumn(name="idjeux", referencedColumnName="idjeux")
     */
    private $game ;

    /**
     * @return mixed
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param mixed $game
     */
    public function setGame($game): void
    {
        $this->game = $game;
    }


    /**
     * @var int
     *
     * @ORM\Column(name="idCoa", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcoa;

    /**
     * @var string
     *
     * @ORM\Column(name="nicknameCoa", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Enter Your Nickname Please!")
     * @Assert\Length(
     *     min= 3,
     *     max= 10,
     *     minMessage="Too Short For A Nickname!",
     *     maxMessage="Too Long For A Nickname!"
     * )
     */
    private $nicknamecoa;

    /**
     * @var string
     *@Assert\NotBlank(message="Enter Your Rank Please!")
     * @ORM\Column(name="rankCoa", type="string", length=255, nullable=false)
     */
    private $rankcoa;


    /**
     * @var string
     *
     * @ORM\Column(name="desCoa", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Enter Your Description Please!")
     */
    private $descoa;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imageCoa", type="string", length=255, nullable=true)
     *
     * @Assert\Length(
     *     min= 10,
     *     max= 100,
     *     minMessage="Too Short For A Description!",
     *     maxMessage="Too Long For A Description!"
     * )
     */
    private $imagecoa;

    public function getIdcoa(): ?int
    {
        return $this->idcoa;
    }

    public function getNicknamecoa(): ?string
    {
        return $this->nicknamecoa;
    }

    public function setNicknamecoa(string $nicknamecoa): self
    {
        $this->nicknamecoa = $nicknamecoa;

        return $this;
    }

    public function getRankcoa(): ?string
    {
        return $this->rankcoa;
    }

    public function setRankcoa(string $rankcoa): self
    {
        $this->rankcoa = $rankcoa;

        return $this;
    }


    public function getDescoa(): ?string
    {
        return $this->descoa;
    }

    public function setDescoa(string $descoa): self
    {
        $this->descoa = $descoa;

        return $this;
    }

    public function getImagecoa(): ?string
    {
        return $this->imagecoa;
    }

    public function setImagecoa(?string $imagecoa): self
    {
        $this->imagecoa = $imagecoa;

        return $this;
    }


}

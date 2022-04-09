<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Coaching
 *
 * @ORM\Table(name="coaching")
 * @ORM\Entity
 */
class Coaching
{


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
     * @ORM\Column(name="gameCoa", type="string", length=255, nullable=false)
     * @Assert\NotBlank(message="Enter Your Game Please!")
     */
    private $gamecoa;

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
     * @ORM\Column(name="imageCoa", type="string", length=255, nullable=false)
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

    public function getGamecoa(): ?string
    {
        return $this->gamecoa;
    }

    public function setGamecoa(string $gamecoa): self
    {
        $this->gamecoa = $gamecoa;

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

<?php

namespace App\Entity;

use App\Repository\SignalizationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SignalizationRepository::class)
 */
class Signalization
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latitude;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }
    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }
    public function setLongitude(string $longitude):  void
    {
        $this->longitude = $longitude;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }
    public function setImage(string $image):  void
    {
        $this->image = $image;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
    public function setType(string $type):  void
    {
        $this->type = $type;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }
    public function setComment(string $comment):  void
    {
        $this->comment = $comment;
    }

}

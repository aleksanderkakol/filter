<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_produktu;

    /**
     * @ORM\Column(type="text")
     */
    private $nazwa;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getId_produktu(): ?int
    {
        return $this->id_produktu;
    }

    public function getNazwa()
    {
        return $this->nazwa;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TodoListRepository")
 */
class TodoList
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nuevaEntrada;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNuevaEntrada(): ?string
    {
        return $this->nuevaEntrada;
    }

    public function setNuevaEntrada(string $nuevaEntrada): self
    {
        $this->nuevaEntrada = $nuevaEntrada;

        return $this;
    }
}

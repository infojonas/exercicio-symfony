<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TbServicosRepository")
 */
class TbServicos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20, options={"default":"Sim"}, columnDefinition="ENUM('Sim','Não')", nullable=true)
     */
    private $hidraulico;

    /**
     * @ORM\Column(type="string", length=20, options={"default":"Sim"}, columnDefinition="ENUM('Sim','Não')", nullable=true)
     */
    private $eletrico;

    /**
     * @ORM\Column(type="string", length=20, options={"default":"Sim"}, columnDefinition="ENUM('Sim','Não')", nullable=true)
     */
    private $pintura;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $descricao;

    /**
     * @ORM\Column(type="integer")
     */
    private $tempo_medio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHidraulico(): ?string
    {
        return $this->hidraulico;
    }

    public function setHidraulico(?string $hidraulico): self
    {
        $this->hidraulico = $hidraulico;

        return $this;
    }

    public function getEletrico(): ?string
    {
        return $this->eletrico;
    }

    public function setEletrico(?string $eletrico): self
    {
        $this->eletrico = $eletrico;

        return $this;
    }

    public function getPintura(): ?string
    {
        return $this->pintura;
    }

    public function setPintura(?string $pintura): self
    {
        $this->pintura = $pintura;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getTempoMedio(): ?int
    {
        return $this->tempo_medio;
    }

    public function setTempoMedio(int $tempo_medio): self
    {
        $this->tempo_medio = $tempo_medio;

        return $this;
    }
}

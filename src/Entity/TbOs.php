<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TbOsRepository")
 */
class TbOs
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $sequence;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="O campo 'Desconto' deve ser preenchido")
     */
    private $desconto;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="O campo 'Valor Total' deve ser preenchido")
     */
    private $valor_total;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank(message="O campo 'Data do serviço' deve ser preenchido")
     */
    private $data_Servico;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="O campo 'Técnico' deve ser preenchido")
     */
    private $tecnico;

    /**
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity="App\Entity\TbFerramentas")
     * @ORM\JoinColumn(name="ferramenta", referencedColumnName="id")
     * @Assert\NotBlank(message="O campo 'Ferramenta' deve ser preenchido")
     */
    private $ferramenta;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSequence(): ?string
    {
        return $this->sequence;
    }

    public function setSequence(string $sequence): self
    {
        $this->sequence = $sequence;

        return $this;
    }

    public function getDesconto(): ?float
    {
        return $this->desconto;
    }

    public function setDesconto(?float $desconto): self
    {
        $this->desconto = $desconto;

        return $this;
    }

    public function getValorTotal(): ?float
    {
        return $this->valor_total;
    }

    public function setValorTotal(?float $valor_total): self
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    public function getDataServico(): ?\DateTimeInterface
    {
        return $this->data_Servico;
    }

    public function setDataServico(?\DateTimeInterface $data_Servico): self
    {
        $this->data_Servico = $data_Servico;

        return $this;
    }

    public function getTecnico(): ?int
    {
        return $this->tecnico;
    }

    public function setTecnico(int $tecnico): self
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    public function getFerramenta(): ?int
    {
        return $this->ferramenta;
    }

    public function setFerramenta(int $ferramenta): self
    {
        $this->ferramenta = $ferramenta;

        return $this;
    }
}

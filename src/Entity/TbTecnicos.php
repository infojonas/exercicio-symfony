<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TbTecnicosRepository")
 */
class TbTecnicos
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=11)
     * @Assert\NotBlank(message="O campo 'CPF' não pode estar vazio")
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=150, nullable=false)
     * @Assert\NotBlank(message="O campo 'Nome' não pode estar vazio")
     */
    private $nome_completo;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank(message="O campo 'Data de nascimento' não pode estar vazio")
     */
    private $dt_nasc;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="O campo 'Valor por hora' não pode estar vazio")
     */
    private $valor_hora;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     * @return TbTecnicos
     */
    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeCompleto(): ?string
    {
        return $this->nome_completo;
    }

    /**
     * @param string|null $nome_completo
     * @return TbTecnicos
     */
    public function setNomeCompleto(?string $nome_completo): self
    {
        $this->nome_completo = $nome_completo;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDtNasc(): ?\DateTimeInterface
    {
        return $this->dt_nasc;
    }

    /**
     * @param \DateTimeInterface|null $dt_nasc
     * @return TbTecnicos
     */
    public function setDtNasc(?\DateTimeInterface $dt_nasc): self
    {
        $this->dt_nasc = $dt_nasc;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValorHora(): ?float
    {
        return $this->valor_hora;
    }

    /**
     * @param float|null $valor_hora
     * @return TbTecnicos
     */
    public function setValorHora(?float $valor_hora): self
    {
        $this->valor_hora = $valor_hora;

        return $this;
    }
}

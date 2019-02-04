<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TbFerramentasRepository")
 */
class TbFerramentas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="cod_ferramenta")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=80, nullable=true)
     * @Assert\NotBlank(message="O campo 'Nome da ferramenta' não pode estar vazio")
     */
    private $nome_ferramenta;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="O campo 'Marca da ferramenta' não pode estar vazio")
     */
    private $marca_ferramenta;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\NotBlank(message="O campo 'Aluguel por hora' não pode estar vazio")
     */
    private $aluguel_hora;

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
    public function getNomeFerramenta(): ?string
    {
        return $this->nome_ferramenta;
    }

    /**
     * @param string|null $nome_ferramenta
     * @return TbFerramentas
     */
    public function setNomeFerramenta(?string $nome_ferramenta): self
    {
        $this->nome_ferramenta = $nome_ferramenta;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMarcaFerramenta(): ?string
    {
        return $this->marca_ferramenta;
    }

    /**
     * @param string|null $marca_ferramenta
     * @return TbFerramentas
     */
    public function setMarcaFerramenta(?string $marca_ferramenta): self
    {
        $this->marca_ferramenta = $marca_ferramenta;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getAluguelHora(): ?float
    {
        return $this->aluguel_hora;
    }

    /**
     * @param float|null $aluguel_hora
     * @return TbFerramentas
     */
    public function setAluguelHora(?float $aluguel_hora): self
    {
        $this->aluguel_hora = $aluguel_hora;

        return $this;
    }
}

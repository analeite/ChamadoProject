<?php

namespace ChamadoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Chamado
 *
 * @ORM\Table(name="chamado")
 * @ORM\Entity(repositoryClass="ChamadoBundle\Repository\ChamadoRepository")
 */
class Chamado
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="descricao", type="string", length=255)
     * @Assert\Length(
     * min = 10, 
     * max = 255, 
     * minMessage = "O campo solicitante não pode ter menos que {{ limit }} caracteres.",
     * maxMessage = "O campo solicitante não pode ter mais que {{ limit }} caracteres.")
     *
     */
    private $descricao;

    /**
     * @var string
     *
     * @ORM\Column(name="solicitante", type="string", length=100)
     * @Assert\Length(
     * min = 10, 
     * max = 100, 
     * minMessage = "O campo solicitante não pode ter menos que {{ limit }} caracteres.",
     * maxMessage = "O campo solicitante não pode ter mais que {{ limit }} caracteres.")
     */
    private $solicitante;

    /**
     * @var string
     *
     * @ORM\Column(name="assunto", type="string", length=50)
     * @Assert\Length(
     * min = 10,
     * max = 50,
     * minMessage = "O campo solicitante não pode ter menos que {{ limit }} caracteres.",
     * maxMessage = "o campo solicitante não pode ter mais que {{ limit }} caracteres.")
     */
    private $assunto;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     *
     * @return Chamado
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set solicitante
     *
     * @param string $solicitante
     *
     * @return Chamado
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * Get solicitante
     *
     * @return string
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * Set assunto
     *
     * @param string $assunto
     *
     * @return Chamado
     */
    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;

        return $this;
    }

    /**
     * Get assunto
     *
     * @return string
     */
    public function getAssunto()
    {
        return $this->assunto;
    }
}


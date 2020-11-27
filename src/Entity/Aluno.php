<?php


namespace Diego\Gerenciador\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
 *  @ORM\Table(name="alunos")
 */
class Aluno implements \JsonSerializable
{
    /** @ORM\Id
     *  @ORM\GeneratedValue
     *  @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="string") */
    private string $nome;

    /** @ORM\Column(type="string") */
    private string $email;

    /** @ORM\Column(type="string") */
    private string $curso;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getCurso(): string
    {
        return $this->curso;
    }

    /**
     * @param string $curso
     */
    public function setCurso(string $curso): void
    {
        $this->curso = $curso;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'curso' => $this->curso
        ];
    }
}

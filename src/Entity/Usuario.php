<?php


namespace Diego\Gerenciador\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity
 *  @ORM\Table(name="usuarios")
 */
class Usuario
{
    /** @ORM\Id
     *  @ORM\GeneratedValue
     *  @ORM\Column(type="integer")
     */
    private int $id;

    /** @ORM\Column(type="string") */
    private string $email;

    /** @ORM\Column(type="string")   */
    private string $senha;

    public function senhaEstaCorreta($senha): bool
    {
        return password_verify($senha, $this->senha);
    }

}
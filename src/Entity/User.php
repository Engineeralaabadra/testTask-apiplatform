<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ApiResource(
 * collectionOperations={
 * "get"={
 * "normalization_context"={"groups"={"read:collection"}}
 * },
 * "post"={
 * "normalization_context"={"groups"={"create:User"}}
 * }
 * },
 * itemOperations={
 *  "put"={"normalization_context"={"groups"={"put:User"}}},
 *  "get"={"normalization_context"={"groups"={"read:collection","read:User"}}},
 *  "delete"={"normalization_context"={"groups"={"delete:User"}}}
 * }
 * )
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:collection","put:User","delete:User","create:User"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:collection","put:User","delete:User","create:User"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read:collection","put:User","delete:User","create:User"})
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="users")
     * @Groups({"read:collection","put:User","delete:User","create:User"})
     */
    private $role;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"read:collection","put:User","delete:User","create:User"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"read:collection","put:User","delete:User","create:User"})
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UselessEntityRepository")
 */
class UselessEntity
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
    private $string;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $boolean;

    /**
     * @ORM\Column(type="integer")
     */
    private $integer_value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getString(): ?string
    {
        return $this->string;
    }

    public function setString(string $string): self
    {
        $this->string = $string;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getBoolean(): ?bool
    {
        return $this->boolean;
    }

    public function setBoolean(bool $boolean): self
    {
        $this->boolean = $boolean;

        return $this;
    }

    public function getIntegerValue(): ?int
    {
        return $this->integer_value;
    }

    public function setIntegerValue(int $integer_value): self
    {
        $this->integer_value = $integer_value;

        return $this;
    }
}

<?php

namespace App\Model\Domain;

class Student
{
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBoard(): string
    {
        return $this->board;
    }
}

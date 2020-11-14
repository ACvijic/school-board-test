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

    public function getPass(): bool
    {
        $pass = false;

        switch ($this->board) {
            case 'CSM':
                if ($this->averageGrade >= 7) {
                    $pass = true;
                }
                break;
            case 'CSMB':
                if ($this->maxGrade > 8) {
                    $pass = true;
                }
                break;
        }
        
        return $pass;
    }
}

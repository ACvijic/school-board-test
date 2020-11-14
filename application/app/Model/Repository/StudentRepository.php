<?php

namespace App\Model\Repository;

use App\Model\Domain\Student;

class StudentRepository extends AbstractRepository
{
    public function getAll()
    {
        return
            $this
                ->db
                ->query('SELECT * FROM students')
                ->fetchAll(\PDO::FETCH_CLASS, Student::class);
    }
    
    public function find(int $id): ?Student
    {
        $statement =
            $this
                ->db
                ->prepare('SELECT * FROM students WHERE id = :id');

        $statement instanceof \PDOStatement;
        $statement->bindParam('id', $id);
        $statement->execute();
        
        return
            ($result = $statement->fetchObject(Student::class)) instanceof Student
            ? $result
            : null;
    }
}

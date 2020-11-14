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
        $sql = <<<SQL
            SELECT students.*, AVG(g.grade) as averageGrade, MAX(g.grade) as maxGrade
            FROM students
            LEFT JOIN grades g ON students.id = g.student_id
            WHERE students.id = :id
SQL;
        $statement =
            $this
                ->db
                ->prepare($sql);
                
        $statement instanceof \PDOStatement;
        $statement->bindParam('id', $id);
        $statement->execute();
        
        return
            ($result = $statement->fetchObject(Student::class)) instanceof Student
            ? $result
            : null;
    }
}

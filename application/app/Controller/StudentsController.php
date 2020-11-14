<?php

namespace App\Controller;

use App\Model\Repository\StudentRepository;

class StudentsController extends AbstractController
{
    protected $repository;
    
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function find(int $id)
    {
        $student = $this->repository->find($id);

        if (! isset($student)) {
            echo 'Student not found!';
        }

        if ($student->board == 'CSM') {
            echo json_encode([
                'id' => $student->id,
                'name' => $student->name,
                'board' => $student->board,
                'pass' => $student->getPass(),
            ]);
        } else {
            $pass = $student->getPass() ? 1 : 0;
            echo <<<XML
            <student>
                <id>
                    $student->id
                </id>
                <name>
                    $student->name
                </name>
                <board>
                    $student->board
                </board>
                <pass>
                    $pass
                </pass>
            </student>
XML;
        }
    }
}

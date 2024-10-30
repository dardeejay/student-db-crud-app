<?php

namespace App\Models;

use CodeIgniter\Model;

class GradeModel extends Model
{
    protected $table      = 'grades';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'grade_level', 'average_grade'];
    protected $useAutoIncrement = true;

    protected $validationRules = [
        'student_id' => 'required|integer',
        'grade_level' => 'required|integer|in_list[7,8,9,10]', // Specify the valid grade levels
        'average_grade' => 'required|decimal'
    ];

    public function insertGradeBatch($student_id, $postData)
    {
        $data = [
            [
                'student_id' => $student_id,
                'grade_level' => 7,
                'average_grade' => $postData['g7_average_grade'],
            ],
            [
                'student_id' => $student_id,
                'grade_level' => 8,
                'average_grade' => $postData['g8_average_grade'],
            ],
            [
                'student_id' => $student_id,
                'grade_level' => 9,
                'average_grade' => $postData['g9_average_grade'],
            ],
            [
                'student_id' => $student_id,
                'grade_level' => 10,
                'average_grade' => $postData['g10_average_grade'],
            ]
        ];

        return $this->insertBatch($data);
    }
    public function updateGradeBatch($student_id, $postData)
    {
        $data = [
            [
                'id' => $postData['g7_id'],
                'student_id' => $student_id,
                'grade_level' => 7,
                'average_grade' => $postData['g7_average_grade'],
            ],
            [
                'id' => $postData['g8_id'],
                'student_id' => $student_id,
                'grade_level' => 8,
                'average_grade' => $postData['g8_average_grade'],
            ],
            [
                'id' => $postData['g9_id'],
                'student_id' => $student_id,
                'grade_level' => 9,
                'average_grade' => $postData['g9_average_grade'],
            ],
            [
                'id' => $postData['g10_id'],
                'student_id' => $student_id,
                'grade_level' => 10,
                'average_grade' => $postData['g10_average_grade'],
            ]
        ];

        $this->updateBatch($data, 'id');
    }
}

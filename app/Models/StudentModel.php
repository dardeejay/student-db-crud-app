<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'id';
    protected $allowedFields = ['lrn', 'first_name', 'last_name', 'middle_name', 'jr_high_school'];
    protected $useAutoIncrement = true;

    // Optional: Define validation rules if necessary
    protected $validationRules = [
        'lrn' => 'required|is_unique[students.lrn]',
        'first_name' => 'required|max_length[100]',
        'last_name' => 'required|max_length[100]',
        'middle_name' => 'permit_empty|max_length[100]',
        'jr_high_school' => 'required|max_length[100]'
    ];
    protected $validationMessages = [
        'lrn' => [
            'required' => 'The Learners Reference Number is required.',
            'is_unique' => 'The Learners Reference Number provided already exists in the system.'
        ],
        'first_name' => [
            'required' => 'The first name is required.',
            'max_length' => 'The first name cannot exceed 100 characters.'
        ],
        'last_name' => [
            'required' => 'The last name is required.',
            'max_length' => 'The last name cannot exceed 100 characters.'
        ],
        'middle_name' => [
            'max_length' => 'The middle name cannot exceed 100 characters.'
        ],
        'jr_high_school' => [
            'required' => 'The junior high school is required.',
            'max_length' => 'The junior high school name cannot exceed 100 characters.'
        ]
    ];
    public function getStudentByLRN($lrn)
    {
        return $this->where('lrn', $lrn)->first();
    }
    public function getStudentByLastName($last_name)
    {
        return $this->like('last_name', $last_name)->first();
    }
    public function getStudentByFirstName($first_name)
    {
        return $this->like('first_name', $first_name)->first();
    }
    public function getStudentByMiddleName($middle_name)
    {
        return $this->like('middle_name', $middle_name)->first();
    }
    public function getStudentByJrHighSchool($jr_high_school)
    {
        return $this->like('jr_high_school', $jr_high_school)->first();
    }
    public function getStudentFullName($first_name, $last_name, $middle_name = null)
    {
        $formattedName = "{$last_name}, {$first_name}";

        // Add the middle initial if provided
        if (!empty($middle_name)) {
            $middleInitial = strtoupper($middle_name[0]); // Get the first letter and capitalize it
            $formattedName .= ", {$middleInitial}.";
        }

        return $formattedName;
    }

    public function getAllStudents()
    {
        $students = $this->findAll();
        if (empty($students)) {
            return null;
        }
        return $students;
    }

    public function searchByLRNFNLN($search)
    {
        if (empty($search)) {
            return null;
        }
        return $this->like('lrn', $search)
            ->orLike('first_name', $search)
            ->orLike('last_name', $search)
            ->findAll();
    }
    public function deleteStudentByLRN($lrn)
    {
        return $this->where('lrn', $lrn)->delete();
    }
}

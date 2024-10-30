<?php

namespace App\Controllers;

use App\Models\GradeModel;
use App\Models\StudentModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Helpers\StudentHelper;

class StudentController extends BaseController
{
    public function create()
    {
        $studentModel = new StudentModel();
        $gradeModel = new GradeModel();
        // Example data
        $data = [
            'lrn' => $this->request->getPost('lrn'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'jr_high_school' => $this->request->getPost('jr_high_school')
        ];


        if (!$studentModel->insert($data)) {
            return view('student/add', ['errors' => $studentModel->errors()]);
        }

        $student_id = $studentModel->insertID();
        if (!$gradeModel->insertGradeBatch($student_id, $this->request->getPost())) {
            return view('student/add', ['errors' => $gradeModel->errors()]);
        }

        // Return a success response
        return view('student/add', ['success' => 'Student added successfully']);
    }

    public function add()
    {
        return view('student/add');
    }

    public function list()
    {
        $studentModel = new StudentModel();
        $students = $studentModel->getAllStudents();
        return view('student/list-all', ['students' => $students]);
    }

    public function search(): string
    {
        $studentModel = new StudentModel();
        $search = $this->request->getGet('search');
        $students = $studentModel->searchByLRNFNLN($search);
        if (empty($students)) {
            return view('search');
        }
        return view('search', ['students' => $students]);
    }
    public function information()
    {
        $studentModel = new StudentModel();
        $gradeModel = new GradeModel();

        $student = $studentModel->getStudentByLRN($this->request->getGet('lrn'));
        $student_id = $student['id'];
        $studentGrades = $gradeModel->where('student_id', $student_id)->findAll();

        $student['full_name'] = $studentModel->getStudentFullName($student['first_name'], $student['last_name'], $student['middle_name']);
        if (empty($student)) {
            return view('student/info', ['error' => 'Student not found']);
        }
        return view('student/info', ['student' => $student, 'studentGrades' => $studentGrades]);
    }
    public function delete()
    {
        $studentModel = new StudentModel();
        $lrn = $this->request->getPost('lrn');
        $students = $studentModel->getAllStudents();
        if (!$studentModel->deleteStudentByLRN($lrn)) {
            return redirect()->back()->with('error', 'Failed to delete student');
        }
        $previousUrl = $_SERVER['HTTP_REFERER'] ?? site_url('students/list-all'); // Fallback URL if HTTP_REFERER is not set
        header('Location: ' . $previousUrl);
        exit;
    }

    public function edit()
    {
        $studentModel = new StudentModel();
        $gradeModel = new GradeModel();
        $lrn = $this->request->getGet('lrn');
        $student = $studentModel->find($lrn);
        $student = $studentModel->getStudentByLRN($lrn);
        $student_id = $student['id'];
        $studentGrades = $gradeModel->where('student_id', $student_id)->findAll();
        $success = $this->request->getGet('success');
        if (empty($studentGrades)) {
            return view('student/edit', ['error' => 'Student not found']);
        }
        if ($success == null) {
            return view('student/edit', ['student' => $student, 'student_grades' => $studentGrades]);
        }
        return view('student/edit', ['student' => $student, 'student_grades' => $studentGrades, 'success' => $success]);
    }

    public function update()
    {
        $studentModel = new StudentModel();
        $gradeModel = new GradeModel();
        // Example data
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'jr_high_school' => $this->request->getPost('jr_high_school')
        ];

        $lrn = $this->request->getPost('lrn');
        $student = $studentModel->getStudentByLRN($lrn);
        $studentModel->update($student['id'], $data);
        $gradeModel->updateGradeBatch($student['id'], $this->request->getPost());
        if (empty($student)) {
            return view('student/edit', ['errors' => 'Student not found']);
        }

        // Return a success response
        return redirect()->to('/student/edit?lrn=' . $lrn . '&success=Student updated successfully');
    }
}

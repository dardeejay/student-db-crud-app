<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Home extends BaseController
{
    public function index(): string
    {
        $studentModel = new StudentModel();
        $search = $this->request->getGet('search');
        $students = $studentModel->searchByLRNFNLN($search);
        if (empty($students)) {
            return view('search');
        }
        return view('search', ['students' => $students]);
    }
}

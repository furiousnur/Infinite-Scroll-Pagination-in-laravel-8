<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function AddStudent()
    {
        $addStudent = [
          ['name' => 'smith', 'email' => 'smith@gmail.com', 'phone' => '01236547898'],
          ['name' => 'smith2', 'email' => 'smith2@gmail.com', 'phone' => '0123654898']
        ];
        Student::insert($addStudent);
        return "student added successfully";
    }

    public function index()
    {
        return "fuck";
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

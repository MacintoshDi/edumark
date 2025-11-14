<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // In a real application, you would fetch students from the database
        $students = [
            ['name' => 'Daniel Wilson', 'role' => 'SEO Enthusiast', 'avatar' => 'daniel-wilson.jpg'],
            ['name' => 'David Anderson', 'role' => 'Marketing Strategist', 'avatar' => 'david-anderson.jpg'],
            ['name' => 'Emily Davis', 'role' => 'SEO Specialist', 'avatar' => 'emily-davis.jpg'],
            ['name' => 'Jennifer White', 'role' => 'Content Creator', 'avatar' => 'jennifer-white.jpg'],
            ['name' => 'John Carter', 'role' => 'Growth Hacker', 'avatar' => 'john-carter.jpg'],
            ['name' => 'Mike Johnson', 'role' => 'Data Analyst', 'avatar' => 'mike-johnson.jpg'],
            ['name' => 'Sarah Miller', 'role' => 'Video Producer', 'avatar' => 'sarah-miller.jpg'],
            ['name' => 'Chris Lee', 'role' => 'Content Marketer', 'avatar' => 'chris-lee.jpg'],
        ];

        return view('pages.students.index', ['students' => $students]);
    }
}
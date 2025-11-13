<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // In a real application, you would fetch this data from the database.
        $jobs = [
            ['id' => 1, 'title' => 'Product Marketing Manager', 'company' => 'Bettermode', 'location' => 'Remote (US)', 'type' => 'Full-time', 'logo' => 'bettermode-icon.png'],
            ['id' => 2, 'title' => 'Senior SEO Specialist', 'company' => 'Growth Experts', 'location' => 'New York, NY', 'type' => 'Full-time', 'logo' => null],
            ['id' => 3, 'title' => 'Content Creator (Part-time)', 'company' => 'Media Co.', 'location' => 'Remote', 'type' => 'Part-time', 'logo' => null],
            ['id' => 4, 'title' => 'Digital Marketing Intern', 'company' => 'Startup Inc.', 'location' => 'San Francisco, CA', 'type' => 'Internship', 'logo' => null],
        ];

        return view('pages.academy.careers', ['jobs' => $jobs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // In a real application, you would find the job by its ID.
        // For this example, we'll just show the static detail page.
        $job = [
            'id' => $id, 
            'title' => 'Product Marketing Manager', 
            'company' => 'Bettermode', 
            'location' => 'Remote (US)', 
            'type' => 'Full-time', 
            'logo' => 'bettermode-icon.png'
        ];
        
        return view('pages.academy.career-detail', ['job' => $job]);
    }
}

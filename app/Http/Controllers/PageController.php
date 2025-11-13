<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function discussion(): View
    {
        $posts = [
            [
                'author' => 'Daniel Wilson', 'avatar' => 'daniel-wilson.jpg', 'time' => '3h ago',
                'content' => "Just published my first blog post using the SEO techniques we learned in the 'Advanced SEO' cohort! It's about optimizing for local search. Would love to get some feedback from you all. Check it out and let me know what you think!",
                'likes' => 12, 'comments' => 4,
            ],
            [
                'author' => 'Sarah Miller', 'avatar' => 'sarah-miller.jpg', 'time' => '8h ago',
                'content' => "I'm looking for a good video editing software for creating short-form content for social media. What are your top recommendations? Preferably something that's user-friendly but has powerful features.",
                'likes' => 25, 'comments' => 11,
            ],
            [
                'author' => 'Mike Johnson', 'avatar' => 'mike-johnson.jpg', 'time' => '1d ago',
                'content' => "Excited to share a success story! After implementing the A/B testing framework from the 'Growth Marketing' cohort, we saw a 15% increase in our landing page conversion rate. Small changes, big impact! Never underestimate the power of data.",
                'likes' => 48, 'comments' => 9,
            ]
        ];
        return view('pages.community.discussion', ['posts' => $posts]);
    }

    public function events(): View
    {
        $events = [
            ['title' => 'Advanced SEO Workshop', 'date' => 'July 5, 2024', 'type' => 'Workshop', 'image' => 'cohort-advanced-seo.png'],
            ['title' => 'Content Strategy Roundtable', 'date' => 'July 12, 2024', 'type' => 'Networking', 'image' => 'cohort-content-marketing.png'],
            ['title' => 'Growth Marketing AMA', 'date' => 'July 18, 2024', 'type' => 'Q&A', 'image' => 'cohort-growth-marketing.png']
        ];
        return view('pages.community.events', ['events' => $events]);
    }

    public function spotlight(): View
    {
        return view('pages.community.spotlight');
    }

    public function connect(): View
    {
        return view('pages.community.connect');
    }

    public function showcase(): View
    {
        $projects = [
            [
                'image' => 'showcase-1.png', 'title' => 'E-commerce SEO Audit', 'author' => 'Emily Davis', 'avatar' => 'emily-davis.jpg',
                'likes' => 128, 'comments' => 15,
                'description' => "A comprehensive SEO audit for a local e-commerce store, identifying key areas for improvement in on-page, off-page, and technical SEO. The project resulted in a 40% increase in organic traffic over 3 months.",
                'tags' => ['SEO', 'E-commerce', 'Audit']
            ],
            [
                'image' => 'showcase-2.png', 'title' => 'Brand Awareness Video Campaign', 'author' => 'Sarah Miller', 'avatar' => 'sarah-miller.jpg',
                'likes' => 95, 'comments' => 8,
                'description' => "A short, engaging video created for a new startup to build brand awareness on social media. The campaign reached over 500,000 viewers and generated significant buzz, leading to a feature in a major industry blog.",
                'tags' => ['Video Marketing', 'Branding', 'Social Media']
            ],
        ];
        return view('pages.community.showcase', ['projects' => $projects]);
    }
    
    public function askTeacher(): View
    {
        return view('pages.academy.ask-teacher');
    }
}

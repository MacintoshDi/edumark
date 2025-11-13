<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CohortController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cohorts = [
            ['name' => 'Growth Marketing', 'desc' => 'Learn the fundamentals of growing a business online.', 'members' => 128, 'posts' => 45, 'image' => 'cohort-growth-marketing.png', 'slug' => 'growth-marketing'],
            ['name' => 'Advanced SEO', 'desc' => 'Master search engine optimization techniques.', 'members' => 92, 'posts' => 31, 'image' => 'cohort-advanced-seo.png', 'slug' => 'advanced-seo'],
            ['name' => 'Video Marketing', 'desc' => 'Create and distribute compelling video content.', 'members' => 78, 'posts' => 22, 'image' => 'cohort-video-marketing.png', 'slug' => 'video-marketing'],
            ['name' => 'Content Marketing', 'desc' => 'Develop a content strategy that drives results.', 'members' => 150, 'posts' => 67, 'image' => 'cohort-content-marketing.png', 'slug' => 'content-marketing'],
        ];

        return view('pages.cohorts.index', ['cohorts' => $cohorts]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        // In a real application, you would find the cohort by its slug.
        // For this example, we'll just show the static detail page and pass some sample posts.
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
            ]
        ];
        
        return view('pages.cohorts.show', ['posts' => $posts]);
    }
}

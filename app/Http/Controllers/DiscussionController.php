<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
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

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        // In a real app, find the post and its comments by ID
        $post = [
            'id' => $id,
            'title' => "I'm looking for a good video editing software...",
            'author' => 'Sarah Miller',
            'author_avatar' => 'sarah-miller.jpg',
            'time' => '8 hours ago',
            'content_html' => "<p>I'm looking for a good video editing software for creating short-form content for social media. What are your top recommendations? Preferably something that's user-friendly but has powerful features.</p><p>I've tried a few but haven't found the one that clicks. Any suggestions would be greatly appreciated!</p>",
            'likes' => 25,
            'comments_count' => 2,
        ];

        $comments = [
            [
                'author' => 'David Anderson', 'author_avatar' => 'david-anderson.jpg', 'time' => '7 hours ago',
                'content' => 'For quick and easy edits on mobile, I highly recommend CapCut. For desktop, DaVinci Resolve has an amazing free version that is incredibly powerful.',
            ],
             [
                'author' => 'Chris Lee', 'author_avatar' => 'chris-lee.jpg', 'time' => '5 hours ago',
                'content' => 'Seconding DaVinci Resolve! It has a bit of a learning curve, but the results are professional-grade. Their color grading tools are industry standard.',
            ],
        ];

        return view('pages.community.discussion-show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}

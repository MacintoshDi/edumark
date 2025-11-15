@extends('layouts.app')

@section('title', 'Assignment Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumbs -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-2 text-sm">
            <li>
                <div class="flex items-center">
                    <a href="{{ route('cohorts.index') }}" class="text-copy-lightest hover:text-copy-light">Cohorts</a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-300" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" /></svg>
                    <a href="{{ route('cohorts.growth-marketing') }}" class="ml-2 text-copy-lightest hover:text-copy-light">{{ $assignment['cohort'] }}</a>
                </div>
            </li>
        </ol>
    </nav>

    <div class="bg-surface rounded-lg shadow-card">
        <!-- Header -->
        <div class="p-6 border-b border-border-color">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-copy">{{ $assignment['title'] }}</h1>
                    <div class="mt-2 flex items-center gap-4 text-copy-light text-sm">
                        <span class="tag bg-gray-100 text-copy-lightest">Due: {{ $assignment['due_date'] }}</span>
                        <span class="tag bg-gray-100 text-copy-lightest">{{ $assignment['points'] }} Points</span>
                    </div>
                </div>
                <div>
                     @if ($assignment['submitted_at'])
                        <div class="tag bg-green-100 text-green-800">Submitted on {{ $assignment['submitted_at'] }}</div>
                    @else
                        <div class="tag bg-yellow-100 text-yellow-800">Not Submitted</div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Instructions -->
        <div class="p-6">
            <h2 class="text-lg font-semibold text-copy mb-2">Instructions</h2>
            <div class="prose max-w-none prose-p:text-copy-light prose-ul:text-copy-light">
                <p>For this assignment, you will conduct a competitive analysis for a company of your choice (real or fictional). Your report should identify at least three direct competitors and analyze their strengths, weaknesses, opportunities, and threats (SWOT analysis).</p>
                <p>Your final submission should include:</p>
                <ul>
                    <li>An executive summary of your findings.</li>
                    <li>A detailed SWOT analysis for each competitor.</li>
                    <li>A comparison of marketing strategies (e.g., content, SEO, social media).</li>
                    <li>Actionable recommendations for your chosen company based on your analysis.</li>
                </ul>
                <p>Please refer to the attached template and grading rubric for detailed requirements.</p>
            </div>
        </div>

        <!-- Attachments -->
        <div class="p-6 border-t border-border-color">
            <h2 class="text-lg font-semibold text-copy mb-3">Attachments</h2>
            <div class="space-y-3">
                <a href="#" class="flex items-center gap-3 bg-gray-50 hover:bg-gray-100 border border-border-color rounded-md p-3">
                    <svg class="w-6 h-6 text-copy-lightest flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                    <div>
                        <p class="font-medium text-copy">Competitive_Analysis_Template.docx</p>
                        <p class="text-xs text-copy-lightest">Microsoft Word Document</p>
                    </div>
                </a>
                <a href="#" class="flex items-center gap-3 bg-gray-50 hover:bg-gray-100 border border-border-color rounded-md p-3">
                    <svg class="w-6 h-6 text-copy-lightest flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                    <div>
                        <p class="font-medium text-copy">Grading_Rubric.pdf</p>
                        <p class="text-xs text-copy-lightest">Adobe PDF</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Submission -->
        <div class="p-6 border-t border-border-color">
             <h2 class="text-lg font-semibold text-copy mb-3">Submit Your Work</h2>
             <div class="p-6 border-2 border-dashed border-gray-300 rounded-lg text-center">
                 <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" /></svg>
                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                    <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-primary focus-within:outline-none focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-2 hover:text-primary-darker">
                        <span>Upload a file</span>
                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                    </label>
                    <p class="pl-1">or drag and drop</p>
                </div>
                 <p class="text-xs leading-5 text-gray-500">PDF, DOCX, ZIP up to 10MB</p>
             </div>
             <div class="mt-6 text-right">
                <button class="btn-primary">Submit Assignment</button>
             </div>
        </div>
    </div>
</div>
@endsection

<?php
// app/Http/Controllers/CandidateController.php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CandidateController extends Controller
{
    public function create()
    {

        return view('candidates.create');
    }

    public function store(Request $request)
    {
        try {
            Log::info('Starting candidate registration process', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:candidates,email',
                'phone' => 'required|string|max:20',
                'html_css' => 'required|boolean',
                'javascript' => 'required|boolean',
                'react_nextjs' => 'required|boolean',
                'crud_app' => 'required|boolean',
                'database_knowledge' => 'required|boolean',
                'authentication' => 'required|boolean',
                'deployment' => 'required|boolean',
                'express_hono' => 'required|boolean',
                'laravel' => 'required|boolean',
                'golang' => 'required|boolean',
                'api_development' => 'required|boolean'
            ]);

            Log::debug('Form validation passed', ['email' => $validated['email']]);


            $skills = [
                'html_css' => (bool)$validated['html_css'],
                'javascript' => (bool)$validated['javascript'],
                'react_nextjs' => (bool)$validated['react_nextjs'],
                'crud_app' => (bool)$validated['crud_app'],
                'database_knowledge' => (bool)$validated['database_knowledge'],
                'authentication' => (bool)$validated['authentication'],
                'deployment' => (bool)$validated['deployment'],
                'express_hono' => (bool)$validated['express_hono'],
                'laravel' => (bool)$validated['laravel'],
                'golang' => (bool)$validated['golang'],
                'api_development' => (bool)$validated['api_development']
            ];

            Log::debug('Skills data processed', $skills);

            // Determine tier
            $tierResult = $this->determineTier($skills);
            Log::info('Tier assigned', [
                'email' => $validated['email'],
                'tier' => $tierResult['tier']
            ]);

            // Create candidate
            $candidate = Candidate::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'skills' => $skills,
                'tier' => $tierResult['tier'],
                'tier_description' => $tierResult['description']
            ]);

            Log::info('Candidate created successfully', [
                'candidate_id' => $candidate->id,
                'email' => $candidate->email,
                'tier' => $candidate->tier
            ]);

            return redirect()->route('candidates.show', $candidate->id)
                ->with('success', 'Registration successful! Your tier has been assigned.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed during candidate registration', [
                'errors' => $e->errors(),
                'input' => $request->except(['_token'])
            ]);
            throw $e;

        } catch (\Exception $e) {
            Log::error('Error during candidate registration', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'input' => $request->except(['_token'])
            ]);

            return redirect()->back()
                ->with('error', 'An error occurred during registration. Please try again.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            Log::debug('Attempting to show candidate', ['candidate_id' => $id]);

            $candidate = Candidate::findOrFail($id);

            Log::info('Candidate details viewed', [
                'candidate_id' => $id,
                'tier' => $candidate->tier
            ]);

            return view('candidates.show', compact('candidate'));

        } catch (\Exception $e) {
            Log::error('Error showing candidate details', [
                'candidate_id' => $id,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return redirect()->route('dashboard.index')
                ->with('error', 'Candidate not found.');
        }
    }

    private function determineTier($skills)
    {
        Log::debug('Determining tier for skills', $skills);

        if ($skills['golang'] && $skills['api_development'] &&
            ($skills['express_hono'] || $skills['laravel']) &&
            $skills['authentication'] && $skills['deployment']) {


            return [
                'tier' => 5,
                'description' => 'Advanced Full-Stack Developer: Proficient in Next.js, Express/Laravel and Hono. Knows Golang and can build simple APIs with Go.'
            ];
        }


        if (($skills['express_hono'] || $skills['laravel']) &&
            $skills['api_development'] && $skills['authentication'] &&
            $skills['deployment'] && !$skills['golang']) {


            return [
                'tier' => 4,
                'description' => 'Multi-Framework Developer: Can build authenticated CRUD apps with Next.js and authenticated CRUD APIs with Express/Hono or Laravel. Does not know Golang.'
            ];
        }


        if ($skills['authentication'] && $skills['deployment'] &&
            $skills['crud_app'] && $skills['database_knowledge'] &&
            !$skills['express_hono'] && !$skills['laravel']) {


            return [
                'tier' => 3,
                'description' => 'Full-Stack Next.js Developer: Can build an authenticated CRUD App, deploy it, but does not have knowledge of Express/Hono or other backend frameworks.'
            ];
        }


        if ($skills['crud_app'] && $skills['database_knowledge'] &&
            !$skills['authentication']) {

            Log::debug('Assigned Tier 2 - CRUD Developer');
            return [
                'tier' => 2,
                'description' => 'CRUD Developer: Can build a CRUD application with a database using server actions or API routes, but cannot implement authentication.'
            ];
        }

        if ($skills['react_nextjs'] && $skills['html_css'] &&
            $skills['javascript'] && !$skills['crud_app']) {


            return [
                'tier' => 1,
                'description' => 'Beginner with React/Next.js: Knows HTML, CSS, and basic JavaScript. Has basic knowledge of Next.js or React but cannot build CRUD apps with database.'
            ];
        }

        return [
            'tier' => 0,
            'description' => 'Complete Beginner: Has done HTML, CSS, and basic JavaScript. Learning the basics of web development.'
        ];
    }
}

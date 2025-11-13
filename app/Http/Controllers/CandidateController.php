<?php
namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
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

        $tierResult = $this->determineTier($skills);

        $candidate = Candidate::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'skills' => $skills,
            'tier' => $tierResult['tier'],
            'tier_description' => $tierResult['description']
        ]);

        return redirect()->route('candidates.show', $candidate->id)
            ->with('success', 'Registration successful! Your tier has been assigned.');
    }

    public function show($id)
    {
        $candidate = Candidate::findOrFail($id);
        return view('candidates.show', compact('candidate'));
    }

    private function determineTier($skills)
    {
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

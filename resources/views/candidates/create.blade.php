@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Candidate Registration</h1>

        <form action="{{ route('candidates.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                        <input type="text" name="name" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" name="email" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="text" name="phone" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>


    
<div class="mb-8">
    <h2 class="text-xl font-semibold mb-4">Skill Assessment</h2>
    <p class="text-gray-600 mb-6">Please indicate which skills you possess:</p>

    <div class="space-y-4">
        @php
            $skills = [
                'html_css' => 'I know HTML and CSS',
                'javascript' => 'I know basic JavaScript',
                'react_nextjs' => 'I have basic knowledge of Next.js or React',
                'crud_app' => 'I can build a CRUD application with a database',
                'database_knowledge' => 'I can work with databases',
                'authentication' => 'I can implement authentication (password + Google OAuth)',
                'deployment' => 'I can deploy applications',
                'express_hono' => 'I know Express/Hono or can build authenticated CRUD APIs',
                'laravel' => 'I can build authenticated CRUD apps with Laravel',
                'golang' => 'I know Golang',
                'api_development' => 'I can build simple APIs with Go and integrate with frontend'
            ];
        @endphp

        @foreach($skills as $key => $label)
        <div class="flex items-center">

            <input type="hidden" name="{{ $key }}" value="0">
            <input type="checkbox" name="{{ $key }}" value="1"
                   class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label class="ml-2 text-sm text-gray-700">{{ $label }}</label>
        </div>
        @endforeach
    </div>
</div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Submit Registration
            </button>
        </form>
    </div>
</div>
@endsection

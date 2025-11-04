@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-green-600 mb-2">Registration Successful!</h1>
            <p class="text-gray-600">Your technical tier has been assigned.</p>
        </div>

        <div class="border-t border-b border-gray-200 py-4 mb-6">
            <h2 class="text-lg font-semibold mb-2">Candidate Information</h2>
            <p><strong>Name:</strong> {{ $candidate->name }}</p>
            <p><strong>Email:</strong> {{ $candidate->email }}</p>
            <p><strong>Phone:</strong> {{ $candidate->phone }}</p>
        </div>

        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
            <h2 class="text-lg font-semibold text-blue-800 mb-2">Assigned Tier: Tier {{ $candidate->tier }}</h2>
            <p class="text-blue-700">{{ $candidate->tier_description }}</p>
        </div>

        <div class="mt-6 text-center">
            <a href="/dashboard" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                View All Candidates
            </a>
        </div>
    </div>
</div>
@endsection

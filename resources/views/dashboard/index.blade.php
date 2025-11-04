@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Candidate Dashboard</h1>

    <!-- Tier Statistics -->
    <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-8">
        @for($i = 0; $i <= 5; $i++)
        <a href="{{ route('dashboard.filter', $i) }}"
           class="bg-white rounded-lg shadow-md p-4 text-center hover:shadow-lg transition-shadow">
            <div class="text-2xl font-bold text-blue-600">{{ $tierCounts[$i] ?? 0 }}</div>
            <div class="text-sm text-gray-600">Tier {{ $i }}</div>
        </a>
        @endfor
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="flex flex-wrap gap-2">
            <a href="/dashboard"
               class="px-4 py-2 rounded-full {{ !isset($tier) ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
               All Candidates
            </a>
            @for($i = 0; $i <= 5; $i++)
            <a href="{{ route('dashboard.filter', $i) }}"
               class="px-4 py-2 rounded-full {{ (isset($tier) && $tier == $i) ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700' }}">
               Tier {{ $i }}
            </a>
            @endfor
        </div>
    </div>

    <!-- Candidates Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tier</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Registered</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($candidates as $candidate)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full
                                {{ $candidate->tier == 0 ? 'bg-gray-200 text-gray-800' : '' }}
                                {{ $candidate->tier == 1 ? 'bg-blue-200 text-blue-800' : '' }}
                                {{ $candidate->tier == 2 ? 'bg-green-200 text-green-800' : '' }}
                                {{ $candidate->tier == 3 ? 'bg-yellow-200 text-yellow-800' : '' }}
                                {{ $candidate->tier == 4 ? 'bg-orange-200 text-orange-800' : '' }}
                                {{ $candidate->tier == 5 ? 'bg-red-200 text-red-800' : '' }}">
                                Tier {{ $candidate->tier }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $candidate->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('candidates.show', $candidate->id) }}"
                               class="text-blue-600 hover:text-blue-900">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No candidates found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

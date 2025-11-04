<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            Log::info('Dashboard accessed');

            $candidates = Candidate::latest()->get();
            $tierCounts = Candidate::selectRaw('tier, count(*) as count')
                ->groupBy('tier')
                ->pluck('count', 'tier')
                ->toArray();

            Log::debug('Dashboard data loaded', [
                'total_candidates' => $candidates->count(),
                'tier_distribution' => $tierCounts
            ]);

            return view('dashboard.index', compact('candidates', 'tierCounts'));

        } catch (\Exception $e) {
            Log::error('Error loading dashboard', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return back()->with('error', 'Unable to load dashboard data.');
        }
    }

    public function filterByTier($tier)
    {
        try {
            Log::info('Dashboard filtered by tier', ['tier' => $tier]);

            $candidates = Candidate::where('tier', $tier)->latest()->get();
            $tierCounts = Candidate::selectRaw('tier, count(*) as count')
                ->groupBy('tier')
                ->pluck('count', 'tier')
                ->toArray();

            Log::debug('Filtered dashboard data loaded', [
                'tier' => $tier,
                'filtered_candidates' => $candidates->count()
            ]);

            return view('dashboard.index', compact('candidates', 'tierCounts', 'tier'));

        } catch (\Exception $e) {
            Log::error('Error filtering dashboard by tier', [
                'tier' => $tier,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return back()->with('error', 'Unable to filter dashboard data.');
        }
    }
}

<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $candidates = Candidate::latest()->get();
        $tierCounts = Candidate::selectRaw('tier, count(*) as count')
            ->groupBy('tier')
            ->pluck('count', 'tier')
            ->toArray();

        return view('dashboard.index', compact('candidates', 'tierCounts'));
    }

    public function filterByTier($tier)
    {
        $candidates = Candidate::where('tier', $tier)->latest()->get();
        $tierCounts = Candidate::selectRaw('tier, count(*) as count')
            ->groupBy('tier')
            ->pluck('count', 'tier')
            ->toArray();

        return view('dashboard.index', compact('candidates', 'tierCounts', 'tier'));
    }
}

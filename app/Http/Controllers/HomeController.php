<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Lab;
use App\Models\LandingPageContent;
use App\Models\Loan;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        $stats = [
            'total_equipment' => Equipment::where('is_active', true)->count(),
            'available_equipment' => Equipment::where('status', 'available')->where('is_active', true)->count(),
            'total_labs' => Lab::where('is_active', true)->count(),
            'active_loans' => Loan::whereIn('status', ['disetujui_laboran', 'diambil'])->count(),
        ];

        $recentEquipment = Equipment::with('lab')
            ->where('is_active', true)
            ->where('status', 'available')
            ->latest()
            ->take(6)
            ->get();

        $labs = Lab::where('is_active', true)->get();

        // Get landing page content if available
        $landingContent = [];
        try {
            $landingContent = LandingPageContent::where('is_active', true)
                ->pluck('content', 'key')
                ->toArray();
        } catch (\Exception $e) {
            // Table may not exist yet
        }

        return Inertia::render('welcome', [
            'stats' => $stats,
            'recentEquipment' => $recentEquipment,
            'labs' => $labs,
            'landingContent' => $landingContent,
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Show the form for creating a new loan.
     */
    public function create()
    {
        $equipment = [
            ['id' => 1, 'name' => 'Spektrofotometer UV-Vis', 'code' => 'SPK-001'],
            ['id' => 2, 'name' => 'pH Meter Digital', 'code' => 'PHM-002'],
            ['id' => 3, 'name' => 'Rotary Evaporator', 'code' => 'ROT-003'],
        ];
        
        return view('loans.create', compact('equipment'));
    }
    
    /**
     * Store a newly created loan in storage.
     */
    public function store(Request $request)
    {
        // Validation and storage logic would go here
        return redirect()->route('dashboard')->with('success', 'Pengajuan peminjaman berhasil dikirim!');
    }
}
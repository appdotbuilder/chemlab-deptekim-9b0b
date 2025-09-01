<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of equipment.
     */
    public function index()
    {
        // Mock equipment data for the grid
        $equipment = [
            [
                'id' => 1,
                'name' => 'Spektrofotometer UV-Vis',
                'code' => 'SPK-001',
                'status' => 'available',
                'location' => 'Lab Kimia Analitik',
                'image' => 'placeholder.jpg'
            ],
            [
                'id' => 2,
                'name' => 'pH Meter Digital',
                'code' => 'PHM-002',
                'status' => 'borrowed',
                'location' => 'Lab Kimia Dasar',
                'image' => 'placeholder.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Rotary Evaporator',
                'code' => 'ROT-003',
                'status' => 'maintenance',
                'location' => 'Lab Sintesis',
                'image' => 'placeholder.jpg'
            ],
        ];
        
        return view('equipment.index', compact('equipment'));
    }
}
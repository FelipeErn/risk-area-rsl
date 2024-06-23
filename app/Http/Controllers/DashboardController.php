<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RiskArea;
use App\Models\Incident;
use App\Models\Alert;

class DashboardController extends Controller
{
    public function index()
    {
        $riskAreas = RiskArea::all();
        $incidents = Incident::latest()->take(5)->get();
        $alerts = Alert::latest()->take(5)->get();

        return view('index', compact('riskAreas', 'incidents', 'alerts'));
    }
}

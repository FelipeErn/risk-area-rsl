<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Models\RiskArea;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::with('riskArea')->get();
        return view('incidents.index', compact('incidents'));
    }

    public function create()
    {
        $riskAreas = RiskArea::all();
        return view('incidents.create', compact('riskAreas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'risk_area_id' => 'required|exists:risk_areas,id',
            'description' => 'required',
            'occurrence_date' => 'required|date',
        ]);

        Incident::create($request->all());

        return redirect()->route('incidents.index')->with('success', 'Incident created successfully.');
    }

    public function show(Incident $incident)
    {
        return view('incidents.show', compact('incident'));
    }

    public function edit(Incident $incident)
    {
        $riskAreas = RiskArea::all();
        return view('incidents.edit', compact('incident', 'riskAreas'));
    }

    public function update(Request $request, Incident $incident)
    {
        $request->validate([
            'risk_area_id' => 'required|exists:risk_areas,id',
            'description' => 'required',
            'occurrence_date' => 'required|date',
        ]);

        $incident->update($request->all());

        return redirect()->route('incidents.index')->with('success', 'Incident updated successfully.');
    }

    public function destroy(Incident $incident)
    {
        $incident->delete();

        return redirect()->route('incidents.index')->with('success', 'Incident deleted successfully.');
    }
}

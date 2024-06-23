<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alert;
use App\Models\RiskArea;
use App\Models\User;

class AlertController extends Controller
{
    public function index()
    {
        $alerts = Alert::all();
        return view('alerts.index', compact('alerts'));
    }

    public function create()
    {
        $riskAreas = RiskArea::all();
        return view('alerts.create', compact('riskAreas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'risk_area_id' => 'required|exists:risk_areas,id',
            'message' => 'required|string',
            'sent_at' => 'required|date',
            'end_at' => 'required|date|after_or_equal:sent_at',
            'active' => 'required|boolean'
        ]);

        Alert::create($validatedData);

        return redirect()->route('alerts.index')->with('success', 'Alerta criado com sucesso.');
    }

    public function show($id)
    {
        $alert = Alert::findOrFail($id);
        return view('alerts.show', compact('alert'));
    }

    public function edit($id)
    {
        $alert = Alert::findOrFail($id);
        $riskAreas = RiskArea::all();
        return view('alerts.edit', compact('alert', 'riskAreas'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'risk_area_id' => 'required|exists:risk_areas,id',
            'message' => 'required|string',
            'sent_at' => 'required|date',
            'end_at' => 'required|date|after_or_equal:sent_at',
            'active' => 'required|boolean'
        ]);

        $alert = Alert::findOrFail($id);
        $alert->update($validatedData);

        return redirect()->route('alerts.index')->with('success', 'Alerta atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $alert = Alert::findOrFail($id);
        $alert->delete();

        return redirect()->route('alerts.index')->with('success', 'Alerta excluído com sucesso.');
    }
}

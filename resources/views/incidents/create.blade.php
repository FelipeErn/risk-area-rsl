@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Novo Incidente</h1>
    <form action="{{ route('incidents.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="risk_area_id">Área de Risco</label>
            <select name="risk_area_id" id="risk_area_id" class="form-control" required>
                <option value="">Selecione a Área de Risco</option>
                @foreach ($riskAreas as $riskArea)
                    <option value="{{ $riskArea->id }}">{{ $riskArea->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="occurrence_date">Data de Ocorrência</label>
            <input type="date" name="occurrence_date" id="occurrence_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Incidente</button>
    </form>
</div>
@endsection

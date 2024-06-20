@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Incidente</h1>
    <form action="{{ route('incidents.update', $incident->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="risk_area_id">Área de Risco</label>
            <select name="risk_area_id" id="risk_area_id" class="form-control" required>
                <option value="">Selecione a Área de Risco</option>
                @foreach ($riskAreas as $riskArea)
                    <option value="{{ $riskArea->id }}" {{ $riskArea->id == $incident->risk_area_id ? 'selected' : '' }}>{{ $riskArea->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea name="description" id="description" class="form-control" required>{{ $incident->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="occurrence_date">Data de Ocorrência</label>
            <input type="date" name="occurrence_date" id="occurrence_date" class="form-control" required value="{{ $incident->occurrence_date }}">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Incidente</button>
    </form>
</div>
@endsection

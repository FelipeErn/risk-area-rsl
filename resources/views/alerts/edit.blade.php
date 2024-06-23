@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Alerta</h1>
    <form action="{{ route('alerts.update', $alert->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="risk_area_id">Área de Risco</label>
            <select name="risk_area_id" id="risk_area_id" class="form-control" required>
                <option value="">Selecione a Área de Risco</option>
                @foreach ($riskAreas as $riskArea)
                    <option value="{{ $riskArea->id }}" {{ $alert->risk_area_id == $riskArea->id ? 'selected' : '' }}>{{ $riskArea->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="message">Mensagem</label>
            <textarea name="message" id="message" class="form-control" required>{{ $alert->message }}</textarea>
        </div>
        <div class="form-group">
            <label for="sent_at">Início</label>
            <input type="datetime-local" name="sent_at" id="sent_at" class="form-control" required value="{{ \Carbon\Carbon::parse($alert->sent_at)->format('Y-m-d\TH:i') }}">
        </div>
        <div class="form-group">
            <label for="end_at">Fim</label>
            <input type="datetime-local" name="end_at" id="end_at" class="form-control" required value="{{ \Carbon\Carbon::parse($alert->end_at)->format('Y-m-d\TH:i') }}">
        </div>
        <div class="form-group">
            <label for="active">Ativo</label>
            <select name="active" id="active" class="form-control" required>
                <option value="1" {{ $alert->active ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ !$alert->active ? 'selected' : '' }}>Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Atualizar Alerta</button>
    </form>
</div>
@endsection

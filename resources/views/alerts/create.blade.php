@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Alerta</h1>
    <form action="{{ route('alerts.store') }}" method="POST">
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
            <label for="message">Mensagem</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="sent_at">Início</label>
            <input type="datetime-local" name="sent_at" id="sent_at" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_at">Fim</label>
            <input type="datetime-local" name="end_at" id="end_at" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="active">Ativo</label>
            <select name="active" id="active" class="form-control" required>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Criar Alerta</button>
    </form>
</div>
@endsection

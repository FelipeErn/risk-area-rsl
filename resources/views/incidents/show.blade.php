@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Incidente</h1>
    <div class="form-group">
        <strong>ID:</strong> {{ $incident->id }}
    </div>
    <div class="form-group">
        <strong>Área de Risco:</strong> {{ $incident->riskArea->name }}
    </div>
    <div class="form-group">
        <strong>Descrição:</strong> {{ $incident->description }}
    </div>
    <div class="form-group">
        <strong>Data de Ocorrência:</strong> {{ $incident->occurrence_date }}
    </div>
    <a href="{{ route('incidents.index') }}" class="btn btn-primary">Voltar para a Lista</a>
</div>
@endsection

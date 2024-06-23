@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Alerta</h1>
    <div class="card">
        <div class="card-header">
            Alerta ID: {{ $alert->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Área de Risco: {{ $alert->riskArea->name }}</h5>
            <p class="card-text">Mensagem: {{ $alert->message }}</p>
            <p class="card-text">Início: {{ $alert->sent_at }}</p>
            <p class="card-text">Fim: {{ $alert->end_at }}</p>
            <p class="card-text">Ativo: {{ $alert->active ? 'Sim' : 'Não' }}</p>
            <a href="{{ route('alerts.edit', $alert->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('alerts.destroy', $alert->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection

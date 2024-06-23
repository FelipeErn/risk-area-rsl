@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Alertas</h1>
    <a href="{{ route('alerts.create') }}" class="btn btn-primary mb-3">Criar Alerta</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Área de Risco</th>
                <th>Mensagem</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alerts as $alert)
                <tr>
                    <td>{{ $alert->id }}</td>
                    <td>{{ $alert->riskArea->name }}</td>
                    <td>{{ $alert->message }}</td>
                    <td>{{ $alert->sent_at }}</td>
                    <td>{{ $alert->end_at }}</td>
                    <td>{{ $alert->active ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('alerts.edit', $alert->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('alerts.destroy', $alert->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Incidentes</h1>
    <a href="{{ route('incidents.create') }}" class="btn btn-primary">Adicionar Novo Incidente</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Área de Risco</th>
                <th>Descrição</th>
                <th>Data de Ocorrência</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incidents as $incident)
                <tr>
                    <td>{{ $incident->id }}</td>
                    <td>{{ $incident->riskArea->name }}</td>
                    <td>{{ $incident->description }}</td>
                    <td>{{ $incident->occurrence_date }}</td>
                    <td>
                        <a href="{{ route('incidents.show', $incident->id) }}" class="btn btn-info">Visualizar</a>
                        <a href="{{ route('incidents.edit', $incident->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('incidents.destroy', $incident->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

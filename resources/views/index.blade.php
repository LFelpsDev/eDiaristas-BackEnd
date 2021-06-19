@extends('app')

@section('titulo','Pagina Inicial')

@section('conteudo')
<h1>Listas de Diaristas</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($diaristas as $diarista)
        <tr>
            <th scope="row">{{ $diarista->id }}</th>
            <td>{{ $diarista->nome_completo}}</td>
            <td>{{ $diarista->telefone }}</td>
            <td>
                <a href="{{ route('diaristas.edit', $diarista) }}"  class="btn btn-primary">Atualizar</a>
                <a href="{{ route('diaristas.destroy', $diarista) }}" class="btn btn-danger" onClick="return confirm('tem Certeza que Deseja apagar?')">Excluir</a>
            </td>
        </tr>
    </tbody>
    @empty
    <tr>
        <th></th>
        <td>Nenhum Registro Cadastrado</td>
        <td></td>
        <td></td>
    </tr>
    @endforelse
</table>
<a href="{{ route('diaristas.create')}}" class="btn btn-success">Nova Diarista</a>

@endsection



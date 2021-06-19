@extends('app')

@section('titulo', 'Editar Diaristas')

@section('conteudo')
<h1>Editar Diaristas</h1>
<form action="{{ route('diaristas.update', $diarista) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('_form')
</form>


@endsection
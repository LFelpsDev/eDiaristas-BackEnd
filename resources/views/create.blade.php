@extends('app')

@section('titulo', 'Criar Diaristas')

@section('conteudo')
<h1>Criar Diarista</h1>
<form action="{{ route('diaristas.store')}}" method="POST" enctype="multipart/form-data">

    @include('_form')

</form>


@endsection
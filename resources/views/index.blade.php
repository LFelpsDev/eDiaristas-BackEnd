<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Pagina Inicial</title>
</head>

<body>
    <h1>Pagina Inicial </h1>

    <div class="container">
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
                    <td></td>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</body>

</html>
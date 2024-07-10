<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aggiungi Genere</title>

    </head>
    <body>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('typeEdit', ['id' => $type->id]) }}" method="post">
            @csrf
            <button type="submit">Salva</button> <br>
            ID genere: {{ $type->id}} <br>
            Nome: <input type="text" value="{{ $type->nome}}" name="nome"> </br>

            
        </form>

        <form action="{{ route('typeDelete') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $type->id }}">
            <button style="margin-top: 15px" type="submit">Elimina genere</button>
        </form>
    </body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aggiungi Genere</title>

    </head>
    <body>
        Inserisci un Genere

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="post">
            @csrf
            Nome: <input style="margin-bottom: 3px" type="text" name="nome"> </br>
            
         <button type="submit">Aggiungi</button>
        </form>
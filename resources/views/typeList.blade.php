<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Generi Film</title>

        <style>
            .top-right { position: absolute; top: 10px; right: 10px;}
        </style>
    </head>
    <body>
        <h2>Generi di Film</h2>
        @for ($i = 0; $i < count($types); $i++)
        {{ $types[$i]->nome}}

        @auth
            <a href="{{ route('typeEdit', $types[$i]->id) }}">
                <button style="margin-bottom: 3px">mod</button></a>
        @endauth
        <br>
        @endfor

        <a href="{{ route('typeInsert') }}">
            <button style="margin-top: 10px">Aggiungi un genere</button></a>

        <div class="top-right">
            @guest
            <a href="{{ route('login') }}">
                <button>Login</button></a>
            @else
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Logout</button>
                </form>
            @endguest
        </div> 
    </body>
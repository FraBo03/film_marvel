<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Film MCU</title>

        <style>
            .top-right { position: absolute; top: 10px; right: 10px;}
        </style>
    </head>
    <body>
        <h2>Film del Marvel Cinematic Universe</h2>
        @for ($i = 0; $i < count($movies); $i++)
        {{ $movies[$i]->numero}} {{ $movies[$i]->nome}}
        
        @auth
            <a href="{{ route('edit', $movies[$i]->id) }}">
                <button>mod</button></a>
        @endauth
        
        <a href="{{ route('info', $movies[$i]->id) }}">
            <button style="margin-bottom: 3px">info</button></a><br>
        @endfor
        
        <a href="{{ route('insert') }}">
            <button >Aggiungi un film</button></a>

        <a href="{{ route('typeHome') }}">
            <button style="margin-top: 10px">Generi</button></a>
        
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
</html>

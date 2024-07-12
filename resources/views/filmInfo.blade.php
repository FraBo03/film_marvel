<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $movie->nome}}</title>

        <style>
            div {}

            .div1 {
                float: left;
                padding-right: 10px; 
            }
            
        </style>
    </head>
    <body>
        Numero: {{ $movie->numero}} <br>
        Titolo: {{ $movie->nome}} <br>
        Descrizione: {{ $movie->descrizione}} <br>
        Genere: {{ $movie->type->nome}} <br>
        <div class="div1">
            <img src="{{ asset("storage/images")."/".$movie->immagine}}" width="500px">
        </div>
        <div>
            <iframe src="{{ $movie->video}}" frameborder="0" width="889px" height="500px"></iframe>
        </div>
        
        @auth
        <form action="{{ route('comment.store', $movie->id) }}" method="post">
            @csrf
            <textarea name="content" required></textarea><br>
            <button type="submit">Add Comment</button>
        </form>
        @endauth
    
        <h2>Comments</h2>
        @foreach($movie->comments as $comment)
            <p><strong>{{ $comment->user->name }}</strong>: {{ $comment->content }}</p>
        @endforeach
    </body>
</html>
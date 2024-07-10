<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Modifica Film</title>

        <style>
            div {}

            .div1 {
                float: left;
                padding-right: 15px; 
            }

            .div2 {
                padding-bottom: 15px;
            }
        </style>
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

        <div class="div1">
            <form action="{{ route('edit', ['id' => $movie->id]) }}" method="post">
                @csrf
                <button type="submit">Salva</button> <br>
                ID film: {{ $movie->id}} <br>
                Numero: <input style="margin-bottom: 3px" type="number" value="{{ $movie->numero}}" name="numero"> </br>
                Titolo: <input style="margin-bottom: 3px" type="text" value="{{ $movie->nome}}" name="nome" required> </br>
                Descrizione: <textarea name="descrizione"> {{ $movie->descrizione}}</textarea> </br>
                Genere: 
                <select style="margin-bottom: 3px" name="genere">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{($movie->type == $type) ? 'selected' : ''}}>{{ $type->nome }}</option>
                    @endforeach
                </select><br>
                Link incorporato: <input style="margin-bottom: 3px" type="text" value="{{ $movie->video}}" name="video"> </br>
                
                <img src="{{ asset("storage/images")."/".$movie->immagine}}" width="500px">
            </form>    
        </div>

        <div class="div2">
            @if($movie->immagine)
                <form action="{{ route('delete_img') }}" method="post">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $movie->id }}">
                    <button type="submit">Elimina Immagine</button>
                </form>
            @else
                <form action="{{ route('add_img', $movie->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    Immagine: <input style="margin-bottom: 3px" type="file" name="immagine" required> </br>
                    <button type="submit">Aggiungi Immagine</button>
                </form>
            @endif
        </div> 

        <div>
            <form action="{{ route('delete') }}" method="post">
                @csrf
                <input type="hidden" name="film_id" value="{{ $movie->id }}">
                <button type="submit">Elimina film</button>
            </form>
        </div>
        
    </body>
</html>
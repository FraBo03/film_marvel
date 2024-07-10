<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Aggiungi Film</title>

    </head>
    <body>
        Inserisci i Dati
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            Numero: <input style="margin-bottom: 3px" type="number" name="numero"> </br>
            Titolo: <input style="margin-bottom: 3px" type="text" name="nome" required> </br>
            Descrizione: <textarea name="descrizione"></textarea> </br>
            Genere: 
            <select style="margin-bottom: 3px" name="genere">
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->nome }}</option>
                @endforeach
            </select>
            </br>
            Immagine: <input style="margin-bottom: 3px" type="file" name="immagine" required> <br>
            Link incorporato: <input style="margin-bottom: 3px" type="text" name="video"> </br>
    

         <button type="submit">Aggiungi</button>
        </form>
        
       

    </body>
</html>
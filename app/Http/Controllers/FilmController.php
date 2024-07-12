<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{

    const IMG_URL = "/storage/images/";

    public function list(){
        $films = Film::orderByRaw('ISNULL(numero), numero ASC')->get();
        return view('filmList', ['movies'=>$films]);
    }

    public function insert(){
        $types = Type::all();

        return view('filmInsert', ['types'=>$types]);
    }

    public function do_insert(Request $request){
        $request->validate([
            'numero'=>'nullable|integer',
            'nome'=>'required',
            'immagine'=>'required|image'
        ]);

        $data = $request->post();

        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imagePath = $image->store('images','public'); // Save the image in the public disk under the images directory
            $data['immagine'] =basename($imagePath); // Save the image path in the database
        }

        Film::insert([
            "numero" => $data["numero"], 
            "nome" => $data["nome"], 
            "descrizione" => $data["descrizione"], 
            'type_id' => $data['genere'],
            'immagine' => $data['immagine'],
            'video' => $data['video']
        ]);

        return redirect()->route('home');
    }

    public function addImage($id, Request $request)
{
    $request->validate([
        'immagine' => 'required|image',
    ]);
        
    $film = Film::find($id);
    

    
        $image = $request->file('immagine');
        $imagePath = $image->store('images','public'); // Save the image in the public disk under the images directory
        $immagine =basename($imagePath); // Save the image path in the database
    

    $film->immagine=$immagine;
    $film->save();


    return redirect()->route('edit', $id);
}

    public function delete(Request $request){
        $film_id = $request->input('film_id');
        $film = Film::find($film_id);
        
        if ($film->immagine) {
            Storage::disk('public')->delete('images/'.$film->immagine);
        }
        
        $film->delete();

        return redirect()->route('home');
    }

    public function deleteImg(Request $request){
        $film_id = $request->input('film_id');
        $film = Film::find($film_id);
        
        if ($film->immagine) {
            Storage::disk('public')->delete('images/'.$film->immagine);
        }
        
        $film->update(['immagine' => null]);

        return redirect()->route('edit', $film_id);

    }

    public function edit($id){
        $film = Film::find($id);
        $types = Type::all();

        if (!$film) {
            abort(404, 'Film not found');
        }

        return view('filmEdit', ['movie'=>$film, 'types'=>$types]);
    }

    public function do_edit($id, Request $request){
        $request->validate([
            'numero'=>'nullable|integer',
            'nome'=>'required'
        ]);

        $data = $request->post();
        Film::where('id', $id)->update([
            'numero' => $data['numero'],
            'nome' => $data['nome'],
            'descrizione' => $data['descrizione'],
            'type_id' => $data['genere'],
            'video' => $data['video']
        ]);

        return redirect()->route('home');
    }

    public function info($id){
        $film = Film::with(['comments.user'])->find($id);

        if (!$film) {
            abort(404, 'Film not found');
        }
        
        return view('filmInfo', ['movie'=>$film]);
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $film = Film::findOrFail($id);
        $film->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('info', $id);
    }
}

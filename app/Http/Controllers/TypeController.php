<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function list() {
        $types = Type::orderByRaw('nome ASC')->get();
        return view('typeList', ['types'=>$types]);
    }

    public function insert(){
        return view('typeInsert');
    }

    public function do_insert(Request $request){
        $request->validate([
            'nome'=>'required'
        ]);

        $data = $request->post();
        Type::insert(["nome" => $data["nome"]]);

        return redirect()->route('typeHome');
    }

    public function edit($id){
        $type = Type::find($id);

        if (!$type) {
            abort(404, 'Film not found');
        }

        return view('typeEdit', ['type'=>$type]);
    }

    public function do_edit($id, Request $request){
        $request->validate([
            'nome'=>'required'
        ]);

        $data = $request->post();
        Type::where('id', $id)->update(['nome' => $data['nome']]);

        return redirect()->route('typeHome');
    }

    public function delete (Request $request){
        $id = $request->input('id');
        Type::where('id', $id)->delete();

        return redirect()->route('typeHome');
    }
}
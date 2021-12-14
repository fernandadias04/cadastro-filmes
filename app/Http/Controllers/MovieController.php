<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class MovieController extends Controller
{
    public function index ()
    {
        return view('movie.index', ['page_Title'=>__('CadastroFilmes')]);
    }

    public function create ()
    {
        return view('movie.form', ['page_Title'=>__('CriarNovoFilme')]);
    }

    public function store (Request $request)
    {
        $actors = $request->get('optionsHide');

        $movie = Movie::create([
            'name'=>$request->get('name'),
            'director'=>$request->get('director'),
            'duration'=>$request->get('duration'),
            'punctuation'=>$request->get('punctuation')
        ]);

        foreach($actors as $actor){
            Actor::create([
                'name'=>$actor,
                'movie_id'=>$movie->id
            ]);
        }

        return redirect()->route('movie.index');
    }

    public function edit ($id)
    {

    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->update([
            'name'=>$request->get('name'),
            'director'=>$request->get('director'),
            'duration'=>$request->get('duration'),
            'punctuation'=>$request->get('punctuation')
        ]);


    }

    public function destroy (Request $request)
    {
        $movie = Movie::findOrFail($request->get('id'));

        $movie->delete();

        $request->session()->flash(
            'mensagem',
            "Enquete removida com sucesso"
        );

        return redirect()->route('');
    }
}

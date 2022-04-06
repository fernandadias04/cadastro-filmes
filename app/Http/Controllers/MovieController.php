<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

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


        $movie = Movie::create([
            'name'=>$request->get('name'),
            'director'=>$request->get('director'),
            'duration'=>$request->get('duration'),
            'punctuation'=>$request->get('punctuation'),
            'user_id'=>auth()->id()
        ]);




        return redirect()->route('movies.index');
    }

    public function edit ($id)
    {
        $movie = Movie::findOrFail($id);

        if($movie->user_id != auth()->id()){
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('movie.form', [
            'movie'=>$movie,
            'pageTitlle'=>_('Editing Movie: :name', ['name' => $movie->name])
        ]);
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

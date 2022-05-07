<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpFoundation\Response;

class MovieController extends Controller
{
    public function index (Request $request)
    {
        $query = Movie::query();

        $query->where('user_id', '=', auth()->id());

        if ($request->has('search')) {
            $pattern = '%'.str_replace(' ', '%', $request->get('search')).'%';

            $query->where('name', 'like', $pattern);
        }

        $query->orderBy('name', 'ASC');

        $movies = $query->paginate(10);
        $movies->appends($request->all());

        return view('movie.index', [
             'movies' => $movies,
             'page_Title'=>__('CadastroFilmes')]
        );
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
            'pageTitlle'=>__('Editing Movie: :name', ['name' => $movie->name])
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


        return redirect()->route('movies.index');

    }

    public function destroy (Request $request)
    {
        $movie = Movie::findOrFail($request->get('id'));

        $movie->delete();

        $request->session()->flash(
            'mensagem',
            "Movie removed"
        );

        return redirect()->route('movies.index');
    }
}

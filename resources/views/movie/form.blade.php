@extends('movie.parts.desing')

@section('conteudo')

<head>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
</head>
<div class="container mx-auto">
    <div class="grid-cols-1">



    <form method="POST" action="{{ isset($movie)? route('movies.update', ['id' => $movie->id] ) : route('movies.store') }}" >
        @csrf

        <div>
            <label class="block" for="name" >{{__('Movie Title')}}</label>
            <input id="name" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"   type="text" name="name" value="{{old('name', isset($movie)? $movie->name :'')}}" required autofocus />
        </div>

        <div>
            <label>{{__('Movie Director')}}</label>
            <input id="director" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  name="director" value="{{old('name', isset($movie)? $movie->director :'')}}" required autofocus />
        </div>

        <div>
            <label>{{__('Movie Length')}}</label>
            <input id="duration" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  name="duration" value="{{old('name', isset($movie)? $movie->duration :'')}}" required autofocus />
        </div>

        <div>
            <label>{{__('User Score')}}</label>
            <input id="punctuationr" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1"  name="punctuation" value="{{old('name', isset($movie)? $movie->punctuation :'')}}" required autofocus />
        </div>


        <div>
            <button type="submit" class="block w-full text-sm text-slate-500">{{__('Save')}}</button>
        </div>
    </form>

    </div>
</div>

@endsection


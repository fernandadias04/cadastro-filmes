@extends('movie.parts.desing')

@section('conteudo')

<table class="table-auto">
    <thead>
        <tr>
           <th> Movies</th>
           <th></th>
           <th></th>
        </tr>
    </thead>

     <tbody>

        @foreach ($movies as  $movie)
            <tr>

                <td><a href="#">{{$movie->name}}</a></td>
                <td>Edit</td>
                <td>
                    <form method="POST" action="{{route('movies.destroy', ['id'=>$movie->id])}}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes( $movie->name )}}?')">
                        @csrf
                        @method('delete')
                        <button >Delete</button>
                    </form>
                </td>

            </tr>

         @endforeach

    </tbody>

</table>


   @endsection

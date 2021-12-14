@section('content')

<form method="POST" action="{{ isset($movie)? route('movies.edit') ['id' => $movie->id]) : route('movies.create)}}">
    @csrf

    <div>
        <label for="name">{{__('Film's Name')}}</label>
        <input id="name"  type="text" name="name" value="{{old('name', isset($movie)? $movie->name :'')}}" required autofocus />
    </div>

    <div>
        <label>{{__('Film's Director')}}</label>
        <input id="director" name="director" />
    </div>

    <div>
        <label>{{__('Film's Length')}}</label>
        <input id="duration" name="duration" />
    </div>

    <div>
        <label>{{__('User Score')}}</label>
        <input id="punctuationr" name="punctuation" />
    </div>

    <div>
        <label>{{__('Film's Director')}}</label>
        <input id="director" name="director" />
    </div>

    <div id="actores">
        <label>{{__('Film's Actors')}}</label>
        @if (isset($movie))
            @foreach ($actors as $actor)

            <div id="movie{{$index}}">

                <div>
                    <input type="text" name="actors[{{$index}}][id]"  value="{{$actor->name}}" />
                    <input type="hidden" name="options[{{$index}}][id]" value="{{$actor->id}}"/>
                </div>

                <div>
                    <button class="btn btn-outline-danger" type="button" onclick="document.getElementById('actor{{$index}}').remove()">Excluir</button>
                </div>

            </div>

            @endforeach

        @endif

        <div>
            <div id="actorGroupHide">
                <div id="actorHide">

                    <div>
                        <input type="text" class="form-control">
                    </div>

                    <div>
                        <button class="btn btn-outline-danger" type="button" onclick="this.parentNode.remove()">Excluir</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

</form>

<script>
     var butAdd = document.getElementById("add");
    butAdd.addEventListener('click', function(){
        var optionHide = document.getElementById("optionHide");
        var opClone =optionHide.cloneNode(true);
        opClone.id = null;
        opClone.style.display = 'block';
        var inputHide = opClone.getElementsByTagName('input')[0];
        inputHide.name = 'optionsHide[]';
        var optionGroupHide = document.getElementById('optionGroupHide');
        optionGroupHide.appendChild(opClone);
    });
</script>

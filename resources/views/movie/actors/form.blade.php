
<div>
        <div>
            <h3>{{__('Actores')}}</h3>

            @if (isset($movie))
                @foreach ($movie->actors as $index=>$actor)


                @endforeach
            @endif

                <div id="actorGroupHide">
                    <div id="actorHide">

                        <div>
                            <input type="text" class="form-control">
                        </div>

                        <div>
                            <button class="btn btn-outline-danger" type="button" >{{__('Delete')}}</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="add" class="btn btn-primary"> {{__('Add Option')}} </button>
        </div>

    </div>




<script>
    var butAdd = document.getElementById("add");
    butAdd.addEventListener('click', function(){
        var optionHide = document.getElementById("actorHide");
        var opClone =optionHide.cloneNode(true);
        opClone.id = null;
        opClone.style.display = 'block';
        var inputHide = opClone.getElementsByTagName('input')[0];
        inputHide.name = 'actorsHide[]';
        var optionGroupHide = document.getElementById('actorGroupHide');
        optionGroupHide.appendChild(opClone);

        opClone.getElementsByTagName('button')[0].addEventListener('click', function(){
            optionGroupHide.removeChild(opClone);
        });

    });
</script>

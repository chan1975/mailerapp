@extends('layouts.master')
@section('title','Usuario')
@section('content')
<div class='container'>
    <br/>
    <h3> Crear Usuario </h3>    
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class='form-group'>    
            <label for="nombre"> Nombre: </label>
            <input id="nombre" class="form-control" type='text' name="name" value="{{old('name')}}"/>
            <span class="text-danger">@error('name'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="email"> Email: </label>
            <input id="email" class="form-control" type='email' name="email" value="{{old('email')}}"/>
            <span class="text-danger">@error('email'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="celular"> Celular: </label>
            <input id="celular" class="form-control" type='text' name="cell" value="{{old('cell')}}"/>
            <span class="text-danger">@error('cell'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="cedula"> Cedula: </label>
            <input id="cedula" class="form-control" type='text' name ="cedula" value="{{old('cedula')}}"/>
            <span class="text-danger">@error('cedula'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="password"> Password: </label>
            <input id="password" class="form-control" type='password' name="password"/>
            <span class="text-danger">@error('password'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="confirm_password"> Confirmar Password: </label>
            <input id="confirm_password" class="form-control" type='password' name="password_confirmation" />
            <span class="text-danger">@error('password_confirmation'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="fecha_nacimiento"> Fecha de Nacimiento: </label>
            <input id="fecha_nacimiento" class="form-control" type='date' name="date_birth" value="{{old('date_birth')}}"/>
            <span class="text-danger">@error('date_birth'){{ $message}} @enderror </span>
        </div>
        <div class='form-group'>    
            <label for="pais"> Pais: </label>
            <select id="pais" class="form-control">
                
            </select>
        </div>
        <div class='form-group'>    
            <label for="provincia"> Provincia: </label>
            <select id="provincia" class="form-control">
            </select>
        </div>
        <div class='form-group'>    
            <label for="ciudad"> Ciudad: </label>
            <select id="ciudad" class="form-control" name="city">
            </select>
            <span class="text-danger">@error('city'){{ $message}} @enderror </span>
        </div>
        <a href="{{route('users.index')}}" class="btn btn-primary" > Cancelar </a>
        <button class="btn btn-success" type="submit"> Enviar </button>
    </form>
</div>
<br>

<script type="text/javascript">
    $(function () {
        
        $.get("{{ route('catalog.country') }}", {},
        function(data) {
            var sel = $("#pais");
            sel.empty();
            sel.append('<option selected>Selecione una opcion</option>');
            for (var i=0; i<data.length; i++) {
            sel.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
            }
        }, "json");

        $( "#pais" ).change(function() {
            const countryValue = $('#pais').find(":selected").val();
            let countryId = Number(countryValue)
            if(!Number.isNaN(countryId) ){
                let url = "{{ route('catalog.state')}}";
                url = url + '?country_id='+ countryId
                $.get(url, {},
                function(data) {
                    var sel = $("#provincia");
                    sel.empty();
                    sel.append('<option selected>Selecione una opcion</option>');
                    for (var i=0; i<data.length; i++) {
                    sel.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                }, "json");
            }
        });
        $( "#provincia" ).change(function() {
            const stateValue = $('#provincia').find(":selected").val();
            const stateId = Number(stateValue)
            if(!Number.isNaN(stateId) ){
                let url = "{{ route('catalog.city')}}";
                url = url + '?state_id='+ stateId
                $.get(url, {},
                function(data) {
                    var sel = $("#ciudad");
                    sel.empty();
                    sel.append('<option selected>Selecione una opcion</option>');
                    for (var i=0; i<data.length; i++) {
                    sel.append('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    }
                }, "json");
            }
        });
                
    });
    </script>
@endsection
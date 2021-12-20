@extends('layouts.master')
@section('title','Usuario')
@section('content')
<div class='container'>
    <br/>
    <h3> Crear Usuario </h3>    
    <form>
        <div class='form-group'>    
            <label for="nombre"> Nombre: </label>
            <input id="nombre" class="form-control" type='text' />
        </div>
        <div class='form-group'>    
            <label for="email"> Email: </label>
            <input id="email" class="form-control" type='email' />
        </div>
        <div class='form-group'>    
            <label for="celular"> Celular: </label>
            <input id="celular" class="form-control" type='text' />
        </div>
        <div class='form-group'>    
            <label for="cedula"> Cedula: </label>
            <input id="cedula" class="form-control" type='text' />
        </div>
        <div class='form-group'>    
            <label for="password"> Password: </label>
            <input id="password" class="form-control" type='password' />
        </div>
        <div class='form-group'>    
            <label for="confirm_password"> Confirmar Password: </label>
            <input id="confirm_password" class="form-control" type='password' />
        </div>
        <div class='form-group'>    
            <label for="fecha_nacimiento"> Fecha de Nacimiento: </label>
            <input id="fecha_nacimiento" class="form-control" type='date' />
        </div>
        <div class='form-group'>    
            <label for="pais"> Pais: </label>
            <select id="pais" class="form-control">
                <option>Ecuador</option>
            </select>
        </div>
        <div class='form-group'>    
            <label for="provincia"> Provincia: </label>
            <select id="provincia" class="form-control">
                <option>Ecuador</option>
            </select>
        </div>
        <div class='form-group'>    
            <label for="ciudad"> Ciudad: </label>
            <select id="ciudad" class="form-control">
                <option>Ecuador</option>
            </select>
        </div>
        <button class="btn btn-error"> Cancelar </button>
        <button class="btn btn-success" type="submit"> Enviar </button>
    </form>
</div>
<br>
@endsection
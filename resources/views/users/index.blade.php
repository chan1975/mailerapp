@extends('layouts.master')
@section('title','Usuario')
@section('content')
    <div class='container'>
        <br/>
        <form action="{{route('users.create')}}" method="GET">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </form>
        <br/>
        <br/>
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Celular</th>
                    <th>Cedula</th>
                    <th>Ciudad</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
    $(function () {
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'edad', name: 'edad'},
                {data: 'cell', name: 'cell'},
                {data: 'cedula', name: 'cedula'},
                {data: 'city', name: 'city'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
    </script>
@endsection
   

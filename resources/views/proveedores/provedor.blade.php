@extends('layouts.app', ['activePage' => 'Provedores', 'titlePage' => __('Provedores')])

@section('content')
<div class="content">
    @if(session()->has('success'))
    <div id="alerte" class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Vista de Provedor</h4>
                <p class="card-category">Aquí va la info de los Provedor</p>
            </div>
            
            <div class="card-body">
                <a href="/provedor/crear" style="float: right;">
                <button class="btn btn-success">Añadir Provedor</button>
            </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th>&ensp;</th>
                            <th>&ensp;</th>
                            <th>&ensp;</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($provedor as $provedo)
                            <tr>
                                <td scope="row">{{$provedo->id}}</td>
                                <td>{{$provedo->name}}</td>
                                <td>{{$provedo->email}}</td>
                                <td><a href="/provedor/edit/{{$provedo->id}}"><button class="btn btn-dark">Edit</button></a></td>
                                <td><a href="/provedor/detalles/{{$provedo->id}}"><button class="btn btn-info">Detalles</button></a></td>
                                <td>
                                    <form action="{{route('provedores.delete', $provedo->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(function() {
        $('#alerte').fadeOut('slow');
    }, 5000); // <-- time in milliseconds
</script>
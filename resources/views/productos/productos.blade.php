@extends('layouts.app', ['activePage' => 'Producto', 'titlePage' => __('Producto')])

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
                <h4 class="card-title">Vista de Productos</h4>
                <p class="card-category">Aquí va la info de los productos</p>
            </div>
            
            <div class="card-body">
                <a href="/producto/crear" style="float: right;">
                <button class="btn btn-success">Añadir Producto</button>
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
                @foreach ($producto as $product)
                            <tr>
                                <td scope="row">{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->email}}</td>
                                <td><a href="/producto/edit/{{$product->id}}"><button class="btn btn-dark">Edit</button></a></td>
                                <td><a href="/producto/detalles/{{$product->id}}"><button class="btn btn-info">Detalles</button></a></td>
                                <td>
                                    <form action="{{route('productos.delete', $product->id)}}" method="post">
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
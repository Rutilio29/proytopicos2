@extends('layouts.app', ['activePage' => 'Producto', 'titlePage' => __('Producto')])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
    <form action="{{route('producto.update',$producto->id)}}" method="post" class="form-horizontal"> 
                @csrf
                
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Provedores</h4>

                        <p class="card-category">Actualiza datos</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$producto->name}}" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" placeholder="Correo" value="{{$producto->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Contraseña</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <!--End footer-->

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
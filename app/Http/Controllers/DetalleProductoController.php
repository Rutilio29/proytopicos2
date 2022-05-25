<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Producto;

class DetalleProductoController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function producto()
    {
        $producto = Producto::all();
        return view('productos.productos', compact('producto'));
    }
    public function create_producto(){
        return view('productos.create_producto');
    }
    
    public function store(request $request){
        Producto::create($request->only('name','email')
        +[
            'password'=>bcrypt($request->input('password')),
            
        ]);
        return redirect()->route('producto')->with('success','Producto registrado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.editar_producto', compact('producto'));
    }

    public function update(Request $request, $id){
        $producto = Producto::findorFail($id);
        $data = $request->only('name','email');
        if(trim($request->password)==''){
            $data=$request->except('password');
        }
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }

        $producto->update($data);
        return redirect()->route('producto')->with('success', 'Producto actualizado exitosamente');
    }
    public function delete($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('producto')->with('success', 'Producto eliminado');
    }
    public function detalles($id)
    {
        $producto = Producto::find($id);
        return view('productos.detalles_producto', compact('producto'));
    }
}

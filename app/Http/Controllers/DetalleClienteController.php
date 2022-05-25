<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Cliente;

class DetalleClienteController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function cliente()
    {
        $cliente = Cliente::all();
        return view('cliente.clientes', compact('cliente'));
    }
    public function create_cliente(){
        return view('cliente.create_cliente');
    }
    
    public function store(request $request){
        Cliente::create($request->only('name','email')
        +[
            'password'=>bcrypt($request->input('password')),
            
        ]);
        return redirect()->route('cliente')->with('success','Cliente registrado correctamente');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.editar_cliente', compact('cliente'));
    }

    public function update(Request $request, $id){
        $cliente = Cliente::findorFail($id);
        $data = $request->only('name','email');
        if(trim($request->password)==''){
            $data=$request->except('password');
        }
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }

        $cliente->update($data);
        return redirect()->route('cliente')->with('success', 'Cliente actualizado exitosamente');
    }
    public function delete($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente')->with('success', 'Cliente eliminado');
    }
    public function detalles($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.detalles_cliente', compact('cliente'));
    }
}
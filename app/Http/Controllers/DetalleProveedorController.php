<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Provedore;

class DetalleProveedorController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function provedor()
    {
        $provedor = Provedore::all();
        return view('proveedores.provedor', compact('provedor'));
    }
    public function create_provedores(){
        return view('proveedores.create_provedor');
    }
    
    public function store(request $request){
        Provedore::create($request->only('name','email')
        +[
            'password'=>bcrypt($request->input('password')),
            
        ]);
        return redirect()->route('provedores')->with('success','Provedor registrado correctamente');
    }

    public function edit($id)
    {
        $provedor = Provedore::find($id);
        return view('proveedores.editar_provedor', compact('provedor'));
    }

    public function update(Request $request, $id){
        $provedor =Provedore::findorFail($id);
        $data = $request->only('name','email');
        if(trim($request->password)==''){
            $data=$request->except('password');
        }
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }

        $provedor->update($data);
        return redirect()->route('provedores')->with('success', 'Provedor actualizado exitosamente');
    }
    public function delete($id)
    {
        $provedor = Provedore::findOrFail($id);
        $provedor->delete();
        return redirect()->route('provedores')->with('success', 'Provedor eliminado');
    }
    public function detalles($id)
    {
        $provedor = Provedore::find($id);
        return view('proveedores.detalles_provedor', compact('provedor'));
    }
}

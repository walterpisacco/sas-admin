<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(){
        $clientes = DB::table('clients')
        ->get();

        return view('admin.gestionar_cliente.index',compact('clientes'));
    }

    public function create(){
        return view('admin.gestionar_cliente.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'cuit' =>['required', 'max:13'],
            'nombre'=> ['required', 'max:120'],
            'direccion'=> ['nullable'],
            'razon_social'=> ['nullable'],
            'id_pais'=> ['nullable'],
        ]);

        $data['id_client']=Auth::user()->id_client;
        $cliente=Client::create($data);

        return redirect()->route('usuario.clientes');
    }

    public function edit(Client $cliente){
        return view('admin.gestionar_cliente.edit',compact('cliente'));
    }

    public function update(Request $request,Client $cliente){
        $data=$request->validate([
            'cuit' =>['required', 'max:13'],
            'nombre'=> ['required', 'max:120'],
            'direccion'=> ['nullable'],
            'razon_social'=> ['nullable'],
        ]);
        
        $cliente->update($data);

        return redirect()->route('usuario.clientes');
    }

    public function destroy(Request $request){

        $id = $request->id;

        $cliente = Client::where('id',$id);
        $cliente->delete();

        $result = array();
        $result['success'] = 'true';
        $result['texto'] = 'cliente eliminado con éxito!';
        return json_encode($result);

        //return redirect()->route('usuario.clientes');
    }
}

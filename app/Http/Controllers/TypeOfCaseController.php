<?php

namespace App\Http\Controllers;

use App\Models\TypeOfCase;
use CreateTypeOfCasesTable;
use Illuminate\Http\Request;

class TypeOfCaseController extends Controller
{

    public function index()
    {
        $tipos=TypeOfCase::all();
        return view('admin.gestionar_tipo_caso.index',compact('tipos'));
    }

    public function create(){
        return view('admin.gestionar_tipo_caso.create');
    }

    public function store(Request $request)
    {
        $data=$request->validate([
            'nombre'=> ['required', 'max:120'],
        ]);

        $tipo=TypeOfCase::create($data);

        return redirect()->route('admin.tiposTs');
    }

    public function edit(TypeOfCase $tipo){
        return view('admin.gestionar_tipo_caso.edit',compact('tipo'));
    }

    public function update(Request $request,TypeOfCase $tipo){
        $data=$request->validate([
            'nombre'=> ['required', 'max:120'],
        ]);

        $tipo->update($data);

        return redirect()->route('admin.tiposTs');
    }
    
    public function destroy(TypeOfCase $tipo){
        $tipo->delete();
        
        $result = array();
        $result['success'] = 'true';
        $result['texto'] = 'tipo eliminado con éxito!';
        return json_encode($result);

        //return redirect()->route('admin.tiposTs');
    }
    
}

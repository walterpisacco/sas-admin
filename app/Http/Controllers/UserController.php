<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function menu(){
        return view('admin.menu');
    }

    public function index(){

        if(auth()->user()->rol == 'Super'){
            $usuarios=User::all();
        }else{
            $usuarios = User::where('id_client','=',auth()->user()->id_client)->get();
        }

        return view('admin.gestionar_usuario.index', compact('usuarios'));
    }

    public function create(){

        if(auth()->user()->rol == 'Super'){
            $clientes = Client::all();
        }else{
            $clientes = Client::where('id','=',auth()->user()->id_client)->get();
        }

        return view('admin.gestionar_usuario.create',compact('clientes'));
    }

    public function store(Request $request){
        $data=$request->validate([
            'id_client'=> ['required'],
            'name'=> ['required', 'max:120'],
            'email'=> ['required', 'unique:users,email'],
            'password'=>['required' ,'min:6'],
            'rol' => ['required'],
        ]);

        $data['password']=Hash::make($request->password);

        $usuario=User::create($data);

        return redirect()->route('admin.usuarios');
    }

    public function edit(User $usuario){
        return view('admin.gestionar_usuario.edit',compact('usuario'));
    }

    public function update(Request $request,User $usuario){
        $data=$request->validate([
            'name'=> ['required', 'max:120'],
            'email'=> ['required'],
            'rol'=> ['required'],
        ]);

        if(!is_null($request->password)){
            $data['password']=Hash::make($request->password);
        }

        $usuario_email=User::where('email',$request->email)->where('id','!=',$usuario->id)->first();

        if(!is_null($usuario_email)){
            return back()->withErrors(['error' => 'El email ya pertenece a otro usuario']);  
        }
        $usuario->update($data);

        return redirect()->route('admin.usuarios');
    }

    public function destroy(User $usuario){
        $usuario->delete();

        $result = array();
        $result['success'] = 'true';
        $result['texto'] = 'usuario eliminado con éxito!';
        return json_encode($result);

        //return redirect()->route('admin.usuarios');
    }

    //-------------------------------------------------------------------------------------------------------------------//

    public function loginView(){
        return view('admin.login');
    }

    public function login(Request $request){
        $validacion=$request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $usuario=User::where('email',$request->email)->first(); 

        if(is_null($usuario)){
            return back()->withErrors(['error' => 'El Usuario no existe']);
        }

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admin.menu');
        }

        return back()->withErrors(['error' => 'El password es incorrecto']);    
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('index');
    }

}
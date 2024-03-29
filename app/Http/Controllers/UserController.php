<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    //Listado de usuarios
    public function list(){
        $data['users'] = Usuario::paginate(3);

        return view('usuarios.list', $data);
    }

    //Formulario de usuarios
    public function userform(){
        return view('usuarios.userform');
    }

    //Guardar Usuarios
    public function save(Request $request){

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:255',
            'email'=> 'required|string|max:255|email|unique:usuarios'


        ]);

        $userdata = request()->except('_token');
        Usuario::insert(userdata);

        return back()->with('usuarioGuardado','Usuario guardado');  
    }

    //Eliminar Usuarios
    public function delete($id){
        Usuario::delete($id);

        return back()->with('usuarioEliminado','Usuario eliminado');
    }

    //Formulario para editar usuarios
    public function editform($id){
        $usuario = Usuario::findOrFail($id);


        return view('usuarios.editform', compact('usuario'));
    }

    //Edicion de usuarios
    public function edit(Request $request, $id){
        $datosUsuario = request()->except((['_token', '_method']));
        Usuario::where('id', '=', $id) -> update($datosUsuario);

        return back()->with('usuarioModificado', 'Usuario modificado');
    }
}

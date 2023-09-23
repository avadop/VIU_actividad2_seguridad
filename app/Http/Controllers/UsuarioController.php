<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        dd($credentials);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redirigir a la página deseada
            return redirect('/home');
        } else {
            // Autenticación fallida, redirigir de nuevo al formulario de inicio de sesión
            return back()->withErrors(['Credenciales incorrectas']);
        }

    }

    public function create()
    {
        return view('usuario.create');
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->get('nombre');
        $apellidos = $request->get('apellidos');
        $dni = $request->get('dni');
        $email = $request->get('email');
        $password = $request->get('password');
        $telefono = $request->get('telefono');
        $pais = $request->get('pais');
        $cuentaBancaria = $request->get('cuentaBancaria');
        $sobreTi = $request->get('sobreTi');

        $request->validate([
            'nombre' => 'required|min:2|max:20',
            'apellidos' => 'required|min:2|max:40',
            'dni' => 'required', // formato español
            'email' => 'required|email',
            'password' => 'required',
            'telefono' => 'min:9|max:12',
            'cuentaBancaria' => '',
            'sobreTi' => 'min:20|max:250',
        ]);

        $usuario = new Usuario;
        $usuario->nombre=$nombre;
        $usuario->apellidos=$apellidos;
        $usuario->dni=$dni;
        $usuario->email=$email;
        $usuario->password=$password;
        $usuario->telefono=$telefono;
        $usuario->pais=$pais;
        $usuario->cuentaBancaria=$cuentaBancaria;
        $usuario->sobreTi=$sobreTi;
        $usuario->save(); 
       
        return redirect()->route('store-usuario')->with('success', 'Usuario creado correctamente.');
    }

    public function storeUsuarioView()
    {      
        return view('usuario.store');
    }


}

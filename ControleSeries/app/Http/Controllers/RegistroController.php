<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};

class RegistroController extends Controller
{
    public function create(){
      return view('registro.create');
    }

    public function store(Request $request){
      $data = $request->except('token'); // salva todo o request em 'data', exceto o token de autenticaçao

      $data['password'] = Hash::make($data['password']);
      $user = User::create($data);

      Auth::login($user);
      return redirect()->route('index');
    }
}

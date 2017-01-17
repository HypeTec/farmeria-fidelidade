<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class CardController extends Controller
{

  public function showpontoform()
  {
    $usuarios = Usuario::all();
    return view('usuarios.cartao', compact('usuarios'));
  }

  public function validateRulesOnCreate(Request $request)
  {
  $rules = [
    'usuario_id' => 'required',
    'username' => 'required',
    'password' => 'required',
  ];
  return Validator::make($request->all(), $rules);
  }

  public function assinarponto(Request $request)
  {
    echo "oi";
  }
}

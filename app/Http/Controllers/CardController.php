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
}

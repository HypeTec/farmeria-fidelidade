<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Point;
use App\Operador;
use Validator;
use DB;

class CardController extends Controller
{

  public function showpontoform()
  {
    return view('usuarios.cartao');
  }

  public function validateRulesOnCreate(Request $request)
  {
  $rules = [
    'usuario_id' => 'required',
    'cupomfiscal' => 'required',
    'data_compra' => 'required',
    'operador_username' => 'required',
  ];
  return Validator::make($request->all(), $rules);
  }

  public function assinarponto(Request $request)
  {
      $validator = $this->validateRulesOnCreate($request);

      if ($validator->fails())
      {
          return redirect(route('cartao.adicionarponto'));
      }

      $p = new Point();
      $p->cupomfiscal = $request->get('cupomfiscal');
      $p->data_compra = $request->get('data_compra');
      $p->operador_id = Operador::where('username', '=', $request->get('operador_username'))->first()->id;

      //Usuario::find($request->get('usuario_id'))->card()->first()->pontos()->save($p);
      DB::beginTransaction();
      try
      {
          $this->savepoint($p, $request->get('usuario_id'));
          DB::commit();

          return redirect(route('cartao.adicionarponto'))->with('success', 'registro criado com sucesso');
      }
      catch(\Exception $ex)
      {
          DB::rollBack();
          return redirect(route('cartao.adicionarponto'))->withErrors($ex->getMessage())->withInput();
      }


  }

  public function savepoint(Point $p, $user_id)
  {
    Usuario::find($user_id)->card()->pontos()->save($p);
  }
}

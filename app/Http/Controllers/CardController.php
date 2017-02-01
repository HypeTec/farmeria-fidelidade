<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Point;
use App\Operador;
use Validator;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;


class CardController extends Controller
{

  public function showpontoform()
  {
    $filter = Input::get('filterSearch'); // or using a Request instance

    if ($filter !== null)
    {
        // do something with my eloquent query builder that might involve the key
        try {

          $usuario = Usuario::find($filter);
          return view('usuarios.cartao', compact('usuario'));
        } catch (ModelNotFoundException $ex) {
          return view('usuarios.cartao')->withErrors($ex->getMessage());
        }
    }
    else
    {
        return view('usuarios.cartao');
    }
  }

  public function validateRulesOnCreate(Request $request)
  {
  $rules = [
    'usuario_id' => 'required',
    #'cupomfiscal' => 'required',
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
      $p->data_compra = "";
      $data = Carbon::createfromFormat('d/m/Y', $request->get('data_compra'));

      $p->data_compra = $data;

      $p->operador_id = Operador::where('username', '=', $request->get('operador_username'))->first()->id;

      //Usuario::find($request->get('usuario_id'))->card()->first()->pontos()->save($p);
      DB::beginTransaction();
      try
      {
        if ($this->checkDate($p->data_compra, $request->get('usuario_id')))
        {

          DB::rollBack();
          return redirect(route('cartao.adicionarponto'))->withErrors('Já existe uma assinatura de ponto neste dia!');
        }

        else
        {
          $this->savepoint($p, $request->get('usuario_id'));
          DB::commit();
          return redirect(route('usuarios.show', $request->get('usuario_id')))->with('success', 'registro criado com sucesso');
        }
      }
      catch(\Exception $ex)
      {
          DB::rollBack();
          return redirect(route('cartao.adicionarponto'))->withErrors($ex->getMessage())->withInput();
      }


  }

  public function savepoint(Point $p, $user_id)
  {
    Usuario::find($user_id)->card()->first()->pontos()->save($p);
  }

  public function checkDate($date, $user_id)
  {

    $user = Usuario::find($user_id);
    return Point::where('data_compra', '=', $date->format('Y-m-d'))
        ->where('card_id', '=', $user->card->first()->id)->exists();
  }
}

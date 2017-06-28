<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Usuario;
use App\Operador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use DB;
use Validator;
use Carbon\Carbon;

class UsuarioController extends CrudController
{

  // $rules = [
  //   'nome' => 'required',
  //   'pin' => 'required',
  //   'sexo' => 'required',
  //   'data_nascimento' => 'required',
  //   'cpf' => 'required',
  //   'email' => 'required',
  //   'celular' => 'required',
  //   'fixo' => 'required',
  // ];
    public function __construct()
    {
        $this->paginatorLimit = 10;
        $this->middleware('auth')->only(['index', 'show', 'edit', 'update', 'store', 'delete', 'create']);
        $this->middleware('usuario.logado')->only('show');
        parent::__construct(Usuario::class);
    }

    public function index()
    {
        $filter = Input::get('filterSearch'); // or using a Request instance

        if ($filter !== null)
        {
            // do something with my eloquent query builder that might involve the key
            $list = $this->getModel()->where('nome', 'LIKE', "%" . $filter . "%")->
            orWhere('cpf', 'LIKE', "%" . $filter . "%")->
            orWhere('fixo', 'LIKE', "%" . $filter . "%")->
            orWhere('celular', 'LIKE', "%" . $filter . "%")->paginate($this->paginatorLimit);

        }
        else
        {
            $list = $this->getModel()->paginate($this->paginatorLimit);
        }
        return view($this->templatePrefix . '.index', compact('list'));
    }

    public function validateRulesOnCreate(Request $request)
    {
		$rules = [
			'nome' => 'required',
			'celular' => 'required',
		];
		return Validator::make($request->all(), $rules);
    }

    public function validateRulesOnUpdate(Request $request)
    {
		$rules = [
			'nome' => 'required',
			'celular' => 'required',
		];
		return Validator::make($request->all(), $rules);
    }

    public function store(Request $request)
    {

        $validator = $this->validateRulesOnCreate($request);
        if($validator->fails())
        {
            return redirect(route($this->route_base_name . '.create'))->withErrors($validator)->withInput();
        }

        foreach($this->getModel()->getFillables() as $column)
        {
          if ($request->get($column) != "")
          {
            $this->getModel()->$column = ($column == 'password' ? bcrypt($request->get($column)) : $request->get($column));
          }
        }

        DB::beginTransaction();
        try
        {
            $this->getModel()->save();
            DB::commit();

            return redirect(route($this->route_base_name . '.index'))->with('success', 'registro criado com sucesso');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect(route($this->route_base_name . '.create'))->withErrors($ex->getMessage())->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
        }

        $validator = $this->validateRulesOnUpdate($request);
        if($validator->fails())
        {
            return redirect(route($this->route_base_name . '.edit', $item->id))->withErrors($validator);
        }

        foreach($item->getFillables() as $column)
        {

          if ($request->get($column) != "")
          {


            $item->$column = ($column == 'password' ? bcrypt($request->get($column)) : $request->get($column));
          }
        }

        DB::beginTransaction();
        try
        {
            $item->save();
            DB::commit();

            return redirect(route($this->route_base_name . '.index'))->with('success', 'registro editado com sucesso');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect(route($this->route_base_name . '.edit', $item->id))->withErrors($ex->getMessage())->withInput();
        }
    }

    public function loginForm()
    {
        return view('usuarios.login');
    }

    public function logarUsuario(Request $request)
    {

        $this->validate($request, [
            'email' => ['required', ],
            'cpf' => ['required', ],
        ]);

        $usuario = Usuario::where('email', $request->get('email'))
            ->where('cpf', $request->get('cpf'))->first();

        if ($usuario)
        {
            $op_ids = $usuario->card()->first()->pontos()->pluck('operador_id');
            $operadores = Operador::whereIn('id', $op_ids)->select('id', 'name')->get();
            $request->session()->put('usuario_id', $usuario->id);

            return view($this->templatePrefix . '.show', [
                'item' => $usuario,
                'operadores' => $operadores,
            ]);
        }
        else
        {
            return redirect()->back()->withErrors('As credenciais de acesso estão incorretas!');
        }
    }

    public function logoutUsuario(Request $request)
    {

        $request->session()->flush();
        return redirect('/backend');
    }

    public function show($id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
            $op_ids = $item->card()->first()->pontos()->pluck('operador_id');
            $operadores = Operador::whereIn('id', $op_ids)->select('id', 'name')->get();
            return view($this->templatePrefix . '.show', compact('item', 'operadores'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
        }
    }

    public function select(Request $request)
    {
        $usuarios = Usuario::when(
            $q = $request->input('q'), function ($query) use ($q) {
                return $query->where('nome', 'ilike', "%{$q}%")->orWhere('cpf', 'ilike', "%{$q}%")->
                    orWhere('pin', 'ilike', "%{$q}%")->
                    orWhere('fixo', 'ilike', "%{$q}%")->
                    orWhere('celular', 'ilike', "%{$q}%");
            })->paginate(20);

        return response()->json([
            'results' => $usuarios->map(function ($usuario) {
                return [
                    'id' => $usuario->id,
                    'text' => "{$usuario->nome} ({$usuario->cpf})"
                ];
            }),
            'pagination' => [
                'more' => $usuarios->hasMorePages(),
            ],
        ]);
    }





}

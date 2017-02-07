<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Operador;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Validator;

class OperadorController extends CrudController
{

    public function __construct()
    {
        $this->paginatorLimit = 10;
        parent::__construct(Operador::class);
        $this->middleware('admin');
        $this->route_base_name = 'operadores';
    }

    public function validateRulesOnCreate(Request $request)
    {
		$rules = [
			'name' => 'required',
			'username' => 'required',
			'password' => 'required',
		];
		return Validator::make($request->all(), $rules);
    }

    public function validateRulesOnUpdate(Request $request)
    {
		$rules = [
			'name' => 'required',
			'username' => 'required',


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
            $this->getModel()->$column = ($column == 'password' ? bcrypt($request->get($column)) : $request->get($column));
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

    public function create()
    {
        $lojas = \App\Loja::all();
        return view($this->templatePrefix. '.create', compact('lojas'));
    }

    public function show($id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
            $lojas = \App\Loja::all();
            return view($this->templatePrefix . '.show', compact('item', 'lojas'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
            $lojas = \App\Loja::all();
            return view($this->templatePrefix . '.edit', compact('item','lojas'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
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
          if ($column == 'password' && $request->get($column) != "")
          {
            $this->getModel()->$column = bcrypt($request->get($column));
          }
          else $item->$column = $request->get($column);


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

    public function changeStatus(Request $request, $id)
    {

      try
      {
          $item = $this->getModel()->findOrFail($id);
      }
      catch(ModelNotFoundException $ex)
      {
          return redirect(route('operadores.index'))->withErrors($ex->getMessage());
      }

      if($item->status_id==1)
      {
          $item->status_id = 0;
      }
      else if ($item->status_id == 0)
      {
        $item->status_id = 1;
      }

      DB::beginTransaction();
      try
      {
          $item->save();
          DB::commit();
          return redirect(route('operadores.index'))->with('success', 'registro editado com sucesso');
      }
      catch(\Exception $ex)
      {
          DB::rollBack();
          return redirect(route('operadores.edit', $item->id))->withErrors($ex->getMessage())->withInput();
      }


    }

    public function select(Request $request)
    {
        $usuarios = Operador::when(
            $q = $request->input('q'), function ($query) use ($q) {
                return $query->where('name', 'ilike', "%{$q}%");
            })->paginate(20);

        return response()->json([
            'results' => $usuarios->map(function ($usuario) {
                return [
                    'id' => $usuario->id,
                    'text' => "{$usuario->name} ({$usuario->username})"
                ];
            }),
            'pagination' => [
                'more' => $usuarios->hasMorePages(),
            ],
        ]);
    }



}

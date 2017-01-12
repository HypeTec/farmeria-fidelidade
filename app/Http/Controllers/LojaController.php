<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Validator;

class LojaController extends CrudController
{

    public function __construct()
    {
        $this->paginatorLimit = 10;
        parent::__construct(User::class);
        $this->middleware('admin');
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

    public function index()
    {
        $list = $this->getModel()->where('role_id', '=', '1')->paginate($this->paginatorLimit);
        return view('lojas.index',compact('list'));
    }
    public function create()
    {
        return view('lojas.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validateRulesOnCreate($request);
        if($validator->fails())
        {
            return redirect(route('lojas.create'))->withErrors($validator)->withInput();
        }

        foreach($this->getModel()->getFillables() as $column)
        {
            $this->getModel()->$column = ($column == 'password' ? bcrypt($request->get($column)) : $request->get($column));
        }

        DB::beginTransaction();
        try
        {
            $this->getModel()->role_id = 1;
            $this->getModel()->save();
            DB::commit();

            return redirect(route('lojas.index'))->with('success', 'registro criado com sucesso');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect(route('lojas.create'))->withErrors($ex->getMessage())->withInput();
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
            return redirect(route('lojas.index'))->withErrors($ex->getMessage());
        }

        $validator = $this->validateRulesOnUpdate($request);
        if($validator->fails())
        {
            return redirect(route('lojas.edit', $item->id))->withErrors($validator);
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
            return redirect(route('lojas.index'))->with('success', 'registro editado com sucesso');
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            return redirect(route('lojas.edit', $item->id))->withErrors($ex->getMessage())->withInput();
        }
    }

}

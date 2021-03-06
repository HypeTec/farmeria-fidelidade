<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use \App\Http\Requests;
use DB;
use Validator;

abstract class CrudController extends Controller
{

    protected $model = null;
    protected $templatePrefix;
    protected $paginatorLimit = 10;
    protected $route_base_name;

    /**
     * CrudController constructor.
     *
     * @param $model
     * @param array $attributes
     */
    public function __construct($model, $attributes = [])
    {
        $this->model = (new $model);
        if(array_key_exists('templatePrefix', $attributes))
        {
            $this->templatePrefix = $attributes['templatePrefix'];
        }
        else
        {
            $pieces = explode('\\', get_class($this->model));
            $this->templatePrefix = str_plural(snake_case(end($pieces)));
        }

        $this->route_base_name = str_plural(snake_case(class_basename(get_class($this->getModel()))));
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return Validator
     */
    public abstract function validateRulesOnCreate(Request $request);

    /**
     * @param \Illuminate\Http\Request $request
     * @return Validator
     */
    public abstract function validateRulesOnUpdate(Request $request);


    /**
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->getModel()->paginate($this->paginatorLimit);
        return view($this->templatePrefix . '.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->templatePrefix. '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = $this->validateRulesOnCreate($request);
        if($validator->fails())
        {
            return redirect(route($this->route_base_name . '.create'))->withErrors($validator)->withInput();
        }

        foreach($this->getModel()->getFillables() as $column)
        {
            $this->getModel()->$column = $request->get($column);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response | \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
            return view($this->templatePrefix . '.show', compact('item'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
            return view($this->templatePrefix . '.edit', compact('item'));
        }
        catch(ModelNotFoundException $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            $item->$column = $request->get($column);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        try
        {
            $item = $this->getModel()->findOrFail($id);
            $item->delete();
            return redirect(route($this->route_base_name . '.index'))->with('success', 'registro deletado com sucesso');
        }
        catch(\Exception $ex)
        {
            return redirect(route($this->route_base_name . '.index'))->withErrors($ex->getMessage());
        }
    }
}

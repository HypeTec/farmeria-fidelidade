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
			'password' => 'required', 
		];
		return Validator::make($request->all(), $rules);
    }

}

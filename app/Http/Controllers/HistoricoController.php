<?php

namespace App\Http\Controllers;

use App\Point;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HistoricoController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $list = Point::orderBy('data_compra')->paginate(50);
        return view('historico.listagem', [
            'list' => $list
        ]);
    }
}

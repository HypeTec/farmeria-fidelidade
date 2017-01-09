<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $user;
    protected $htmlTitle = 'Farmeria Fidelidade';
    protected $title = 'Dashboard';
    protected $subtitle = 'Painel de controle';

    public function callAction($method, $parameters)
    {
        $action = parent::callAction($method, $parameters);
        view()->share('htmlTitle', $this->htmlTitle);
        view()->share('title', $this->title);
        view()->share('subtitle', $this->subtitle);
        view()->share('user', Auth()->user());
        return $action;
    }
}

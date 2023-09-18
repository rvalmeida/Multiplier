<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function read()
    {
        return view('dashboard');
    }

    public function edit()
    {
        return view('cliente.editar');
    }

    public function create()
    {
        return view('cliente.cadastro');
    }

}

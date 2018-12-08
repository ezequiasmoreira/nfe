<?php

namespace App\Http\Controllers\Pessoas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function index(){
        return view('pessoas.cliente.create');
    }
}

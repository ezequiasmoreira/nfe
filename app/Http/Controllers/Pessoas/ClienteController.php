<?php

namespace App\Http\Controllers\Pessoas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Cidade;
use App\Estado;
use App\Pais;

class ClienteController extends Controller
{
    public function index(){
        $list_Paises   = Pais::all();
        $list_cidades   = Cidade::all();
        $list_estados  = Estado::all();
        return view('pessoas.cliente.create',[
            'cidades'   =>  $list_cidades,
            'estados'   =>  $list_estados,
            'paises'   =>  $list_Paises
            ]
        );
    }
    public function retornaCidade(Request $request){
        $list_cidades = DB::table('cidade')->where('estado_id','=', $request->estado_id)->get();
        //$obj    =   ['cidades'  =>  $list_cidades];
        return $list_cidades;
    }
    public function retornaEstado(Request $request){
        $list_estados = DB::table('estado')->where('pais_id','=', $request->pais_id)->get();
        //$obj    =   ['estados'  =>  $list_estados];
        return $list_estados;
    }
}

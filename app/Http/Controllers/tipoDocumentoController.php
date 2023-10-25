<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tipoDocumentoController extends Controller
{
    public function index()
    {

        $tipoDocumentos = DB::table("tipoDocumentos")->get();

        return view("registerUser", ['tipoDocumentos' => $tipoDocumentos]);
    }
}

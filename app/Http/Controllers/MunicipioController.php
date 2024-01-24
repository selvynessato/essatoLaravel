<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function muni(){
        $datos = Municipio::all();
        return view('Municipio')->with("datos",$datos);
    }
}

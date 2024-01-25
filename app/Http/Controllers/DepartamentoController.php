<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Departamento;


class DepartamentoController extends Controller
{
    /*public function index(){
        return view("departamento");
    }
    public function index()
    {
        $departamentos = Departamento::all();
        return view('departamentos.index', compact('departamentos'));
    }
 use App\image;
 
 $departamentos = departamento::all();
 foreach($departamentos as $departamento){
    echo $image->image_path"<br/>";
    "<br/>"
 }*/
 
    public function depto(){
        $datos = Departamento::all();
        return view('Departamento')->with("datos",$datos);
    }
    
    public function create(Request $request) {
        //return $request->departamento;
        $sql =DB::insert(" insert into departamento(id_departamento, nombre_departamento)value(?,?)",[
            $request->codigo,
            $request->departamento
        ]);
        if ($sql == true) {
            return back()->with("mensaje", "correcto");
        } else {
            return back()->with("mensaje", "incorrecto");
        }
    }
}
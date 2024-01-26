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
        /*$sql =DB::insert(" insert into departamento(id_departamento, nombre_departamento)value(?,?)",[
            $request->codigo,
            $request->departamento
        ]);
        if ($sql == true) {
            return back()->with("mensaje", "correcto");
        } else {
            return back()->with("mensaje", "incorrecto");
        }*/

        //aca
        try {
            DB::table('departamento')->insert([
                'id_departamento' => $request->codigo,
                'nombre_departamento' => $request->departamento,
            ]);
            return back()->with("mensaje", "correcto");
        } catch (\Exception $e) {
            // imprime el mensaje de error para depuración
            // echo $e->getMessage();       
            return back()->with("mensaje", "incorrecto");
        }
    }

    public function edit(Request $request) {
        try {
            $id = $request->codigo; // Obtener el id desde el formulario
            $nombreDepartamento = $request->departamento;
    
            $sql = DB::table('departamento')
                ->where('id_departamento', $id)
                ->update(['nombre_departamento' => $nombreDepartamento]);
    
            if ($sql) {
                return back()->with("mensaje", "correcto");
            } else {
                return back()->with("mensaje", "incorrecto");
            }
        } catch (\Throwable $th) {
            // Manejar la excepción, puedes imprimir el mensaje de error para depuración
            // echo $th->getMessage();
            return back()->with("mensaje", "incorrecto");
        }
    }

    public function delete($id) {
        try{
            $sql =DB::delete(" delete from departamento where id_departamento=$id");
            if ($sql) {
                return back()->with("mensaje", "correcto");
            } else {
                return back()->with("mensaje", "incorrecto");
            }
        } catch(\Throwable $th){
            $sql = 0;
            return back()->with("mensaje", "incorrecto");
        }
    }
}
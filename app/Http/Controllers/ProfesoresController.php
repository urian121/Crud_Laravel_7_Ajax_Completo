<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\profesores;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{

public function Profesores(){
        $totalProfes = Profesores::all();
        $profesores = Profesores::orderBy('id', 'DESC')->paginate(8);
        return view('profesor.index', compact('profesores','totalProfes'));
        // return view('calificaciones.agregar')->with('alumnos',$alumnos)->with('asignatura',$asignatura)->with('calificaciones',$calificaciones);
    }


public function viewCreate(){
        return view('profesor.registrar');
    }


public function dataProfe(Request $request){
   /* if ($request->isMethod('post')){
        $nombre = $request->input("nombre");
        var_dump($nombre);
    }*/
    if($request->ajax()){

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');  
            $nombrearchivo = time()."_".$file->getClientOriginalName();  
            $file->move(public_path('/fotos/FotoProfesores/'),$nombrearchivo); 
        }

        $dataProfe = new profesores();
        
        $dataProfe->nombre      =$request->get('nombre');
        $dataProfe->apellido    =$request->get('apellido');
        $dataProfe->profesion   =$request->get('profesion');
        $dataProfe->telefono    =$request->get('telefono');
        $dataProfe->edad        =$request->get('edad');
        $dataProfe->sexo        =$request->get('sexo');
        $dataProfe->direccion   =$request->get('direccion');
        $dataProfe->foto        =$nombrearchivo;

        $dataProfe->save(); 
        return response()->json(['mensaje'=>'<strong>Felicitaciones ! </strong> Profesor Guardado Satisfactoriamente !']);
    }
}



public function detalleProfe($idProfe){
        $Profe = profesores::findOrFail($idProfe);
        return view('profesor.detalleProfe', compact('Profe'));
    }

public function eliminarProfe(Request $request, $idProfe){
        if($request->ajax()){
            $Profe = profesores::find($idProfe); 
            $Profe->delete(); 

            /**Luego de borrar el registro, busco la imagen y la borro */
            $image_path = public_path().'/fotos/FotoProfesores/'.$Profe->foto;  //busco la imagen del alumno
            if (@getimagesize($image_path)) {  //si la imagen existe
                unlink($image_path); //borro la imagen del alumno
            }

            return response()->json([
                'mensaje'=> '<strong>Felicitaciones ! </strong> El Profesor ('. $Profe->nombre .') fue Borrado.'
            ]);  
        }
}



public function vistaUpdate($idProfe){
    $Profe = profesores::findOrFail($idProfe);
    return view('profesor.updateProfe', compact('Profe'));
}

public function updateProfesor(Request $request, $id){
    
    if($request->ajax()){

        $profe = profesores::findOrFail($id); //Busco el registro

        if ($request->hasFile('foto')) {
            $image_path = public_path().'/fotos/FotoProfesores/'.$profe->foto;  //busco la imagen del alumno
            if (@getimagesize($image_path)) {  //si la imagen existe
                unlink($image_path); //borro la imagen del alumno
            }
    
            $file = $request->file('foto');  //obtenemos el campo file definido en el formulario
            $nombrearchivo = time()."_".$file->getClientOriginalName();  //obtenemos el nombre del archivo original de la img y le concateno la variable tiempo para evitar que se repitan las imagen
            $file->move(public_path('/fotos/FotoProfesores/'),$nombrearchivo); //mover la foto
        } 

            $profe->nombre       = $request->nombre;
            $profe->apellido     = $request->apellido;
            $profe->profesion    = $request->profesion;
            $profe->telefono     = $request->telefono;
            $profe->edad         = $request->edad;
            $profe->sexo         = $request->sexo;
            $profe->direccion    = $request->direccion;
            $profe->foto         = $nombrearchivo;
    
            $profe->save(); 
    
            /**retornamos una repuesta de tipo json*/
          return response()->json([
                'mensaje'=> 'El Profesor <strong>('.$profe->nombre .')</strong> fue Actualizado Correctamente.'
            ]);
    
        }

    }


public function DeleteMultiple(Request $request){
    if($request->ajax()){
        $ids = $request->ids;
        $sql = DB::table("profesores")->whereIn('id',explode(",",$ids))->delete();

        $total = profesores::all()->count(); //Consulto la nueva Cantidad de Registros

        return response()->json([
            'msjtotal' =>'<span> Total de Alumnos </span> <strong> ('. $total .')</strong>',
            'mensaje'=>"Alumnos Borrados  ('. $total.' + ' .$ids .' + '. $sql.') Correctamente."
            ]); 

        }
}


}

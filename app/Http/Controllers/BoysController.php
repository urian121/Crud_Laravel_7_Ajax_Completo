<?php

namespace App\Http\Controllers;
use App\boys;
use Illuminate\Http\Request;

class BoysController extends Controller
{

    public function viewBoy()
    {
    $boys = boys::orderBy('id', 'DESC')->get();
    return view('boys.boys', compact('boys'));
    }
   
    public function boyData(Request $request)
    {
        if($request->ajax()){
            $Pais = new boys();
       
            $Pais->nombre   = $request->nombre;
            $Pais->edad     = $request->edad;
            $Pais->sexo     = $request->sexo;
            $Pais->save();

            $countboys = boys::all()->count(); //Consulto la nueva Cantidad de Registros
            //$boys = boys::orderBy('id', 'DESC')->first(); //Ultimo registro

            $boys = boys::orderBy('id', 'DESC')->get();


            //return DB::table('files')->orderBy('upload_time', 'desc')->first();
            //return DB::table('files')->latest('upload_time')->first();
            //User::orderBy('created_at', 'desc')->first();
            //$last_project=Project::where('user_id','=',auth()->user()->id)->last();
            //$last_project=Project::where('user_id','=',auth()->user()->id)->last();
            //$last_project = Project::where('user_id', auth()->user()->id)->latest()->first();

            //$last = DB::table('items')->latest()->first();
           // $boys = DB::table('items')->orderBy('id', 'DESC')->first();
            //$last3 = DB::table('items')->latest('id')->first();

            //$last_cost = Costs::whereHas('material')->get()->last();

            //$data['activities']=$articles->where('category_id','=',$categorie->id)->orderby('created_at','DESC')->take(1)->get();
           // $user= Users::all();
            //var_dump($user->last());


            return response()->json([
                'mensaje' =>'<span> Chico Registrado Correctamente, Total </span> <strong> ('. $countboys .')</strong>',
                'boys'=>$boys
                ]); 
    
       
           // return response()->json(['mensaje'=>'Registro Correcto']);
       
           }
    }


}

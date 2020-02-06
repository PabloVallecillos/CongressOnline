<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Presentation;

class FileUploadController extends Controller
{
    function subir(){
         $presentations = Presentation::orderBy('tittle', 'asc')->paginate(10);
        return view('presentation.subir')->with('presentations' , $presentations);
        
    }
    function upload(Request $request){
        if($request->hasFile('file') && $request->file('file')->isValid()){     
            $file = $request->file('file');   
            $target = '../../upload/';  
            $name =  $file->getClientOriginalName();
            $file->move($target, $name);
       }
       return redirect('subir');
        //return response()->file($target . $name); 
        
    }
    
    function ver($archivo){
        $array = [
            
            '2' => '2.jpg',
        ];
        $mostrar = 'default.png';
        if(isset($array[$archivo])){
            $mostrar = $array[$archivo];
        }
        return response()->file('../../upload/'.$mostrar);
    }
    
}

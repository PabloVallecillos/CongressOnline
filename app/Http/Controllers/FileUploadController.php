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
    
    function upload(Request $request, $presentationid){
         $presentations = DB::table('presentations')->find($presentationid);
        if($request->hasFile('file') && $request->file('file')->isValid()){     
            $file = $request->file('file');   
            $target = '../../upload/';  
            $name =   $presentations->id .'.'. $file->getClientOriginalExtension();
            $file->move($target, $name);
       }
       header("Cache-Control: no-cache, must-revalidate");
       header("Location: http://informatica.ieszaidinvergeles.org:9040/DEFINITIVE/public/subir");
       return redirect('subir');
        //return response()->file($target . $name); 
        
    }
    
    function ver($archivo){

           
         $array2 = [
            '1' => '1.pdf',
            '2' => '2.pdf',
            '3' => '3.pdf',
            '4' => '4.pdf',
            '5' => '5.pdf',
            '6' => '6.pdf',
            '7' => '7.pdf',
            '8' => '8.pdf',
            '9' => '9.pdf',
        ];
        header("Cache-Control: no-cache, must-revalidate");
       header("Location: http://informatica.ieszaidinvergeles.org:9040/DEFINITIVE/public/subir");
        $nombre_fichero ='../../upload/'.$archivo.'.pdf';
        $mostrar = 'default.png';
        if(file_exists($nombre_fichero)){
            $mostrar = $array2[$archivo];
        }
        
        return response()->file('../../upload/'.$mostrar);
    }
    
}

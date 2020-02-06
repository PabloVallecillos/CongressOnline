<?php

namespace App\Http\Controllers;

use App\Presentation;
// use App\Http\Requests\PokemonRequest;
use http\Env\Response;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index']);  // especificar array metodos en los que queremos que se aplique el middleware
        // si no estas autentificado no deberia dejar y efectivamente te deja

        // podriamos guardar algo en la base de datos
        // file put content  para guardar en la base de datos
//        file_get_contents($fichero, $persona, FILE_APPEND | LOCK_EX); // ESCRITURA EXCLUSIVA
//        file_put_contents('prueba.txt', "probando\n", FILE_APPEND | LOCK_EX);

    }

    // public function imageid($presentationid)  // te llega el parametro de la ruta
    // {
    //     $target = '../../../pokemon/';
    //     $search = $target . $presentationid . '.*';
    //     // llaamada al sistema con un exec
    //       // php get file from folder
    //     $files = glob($search);
    //     // si no has encontrado ninguna
    //     if(count($files) === 0) {
    //         $files[] = '0.jpg';    // filtro si es
    //     }
    //     return $this->imagefile(basename($files[0]));  // basename php
    //     // buscar cual es el archivo correcto
    // }
    // public function imagefile($presentationfile)  // te llega el parametro de la ruta
    // {
    //     $target = '../../../pokemon/'; // se parte desde dentro de public k
    //     $mostrar = $target . '0.jpg';  // pensaba que cuando estaba null iba a mostrar 0.jpg .
    //     if(file_exists($target . $presentationfile )){
    //         $mostrar = $target . $presentationfile;
    //     }
    //     return response()->file($mostrar);

    //     // en rutas Route get     ?    function(controllador )
    // }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index(Request $request)
    {
        $messages = [
            'logged'        => 'Bienvenido',
            'verified'      => 'Usuario verificado,ya puede iniciar sesion',
            'registered'    => 'Registrado , ver correo',
            'passwordreset' => 'Clave de acceso reseteada',
        ];  
        $opSession = $request->session()->get('op');

        $alertMessage = null;

        if(isset($messages[$opSession])) {
            $alertMessage = $messages[$opSession];
        }
        
        $presentations = Presentation::orderBy('tittle', 'asc')->paginate(10);
        return view('presentation.index')->with('presentations' , $presentations, ['alertMessage' => $alertMessage]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//     public function create()
//     {
//         // $this->middleware('auth'); // con eso esta esta ruta protegida
// //        file_put_contents('prueba.txt', "create\n", FILE_APPEND | LOCK_EX);  // comprobar middlewares
//         return view('pokemon/create');
//     }
// // traernos el archivo  ,  deberiamos
//     private function uploadImage(int $id, string $fileParam, Request $request){
//         $result = null;
//         if($request->hasFile($fileParam) && $request->file($fileParam)->isValid()) {
//             $file = $request->file($fileParam);
//             $target = '../../../pokemon/';
//             $name = $id . '.' . $file->getClientOriginalExtension();
//             if($file->move($target, $name)){
//                 $result = $name;
//             } //
//         }
//         return $result;
//     }
//     private function deleteRepeatedFiles(int $presentationid, string $fileName){
//         // dir carpeta y todos los que se llamen de forma diferente los borra
//         $target = '../../../pokemon/';
//         $search = $target . $presentationid . '.*';
//         $files = glob($search);
//         foreach ($files as $file){
//             if(basename($file) != $fileName){
//                 unlink($file);
//             }
//         }
//     }
//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(PokemonRequest $request)
//     {
// //        $this->middleware('auth');

//         $input = $request->validated();
//         $presentation = new Pokemon($input);
//         $presentation->file = null;
//         $result = $presentation->save();  // cuando hacemos save nisiquiera sabes el id que tienes  te guarda el nombre temporal
//         $fileName = $this->uploadImage($presentation->id, 'file', $presentation);
//         if($fileName !== null){
//             // borra todo lo que me sobre
//             $this->deleteRepeatedFiles($presentation->id, $fileName);
//             $presentation->file = $fileName;
//             $presentation->save();
//         }
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Pokemon  $presentation
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Pokemon $presentation)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Pokemon  $presentation
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Pokemon $presentation)
//     {
// //        $this->middleware('auth');
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Pokemon  $presentation
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Pokemon $presentation)
//     {
// //        $this->middleware('auth');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Pokemon  $presentation
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Pokemon $presentation)
//     {
// //        $this->middleware('auth');
//     }
}

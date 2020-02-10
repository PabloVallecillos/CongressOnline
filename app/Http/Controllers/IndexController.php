<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presentation;
use http\Env\Response;
use Illuminate\Support\Facades\DB;
use mPDF; /*https://appdividend.com/2017/05/08/generate-pdf-blade-laravel-5-4/#Step_13_Write_a_controller_function_to_download_the_PDF*/
use App\User;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  public function index(Request $request)
    // {
    //     $messages = [
    //         'logged' => 'Bienvenido',
    //         'verified' => 'Usuario verificado,ya puede iniciar sesion',
    //         'registered' => 'Registrado , ver correo',
    //         'passwordreset' => 'Clave de acceso reseteada',
    //     ];  
    //     $opSession = $request->session()->get('op');

    //     $alertMessage = null;

    //     if(isset($messages[$opSession])) {
    //         $alertMessage = $messages[$opSession];
    //     }
    //     $presentations = Presentation::orderBy('tittle', 'asc')->paginate(10);
       
    //      return view('presentation.index')->with(['alertMessage' => $alertMessage] );

    // }
    public function correo()
    {
        $destinatario = 'vallecillostyler@gmail.com';
        $correo = new \App\Mail\InformationEmail();
        $correo->setSubject('Saludos');
        \Mail::to($destinatario)->send($correo);
    }
    
    public function presentation(Request $request)
    {
        $messages = [
            'logged' => 'Bienvenido',
            'verified' => 'Usuario verificado, ya puede iniciar sesion',
            'registered' => 'Registrado, ver correo',
            'passwordreset' => 'Clave de acceso reseteada',
            'success' => 'Presentation created successfully',
        ];  
        $opSession = $request->session()->get('op');

        $alertMessage = null;

        if(isset($messages[$opSession])) {
            $alertMessage = $messages[$opSession];
        }
        
        $presentations = Presentation::orderBy('tittle', 'asc')->paginate(10);
        return view('presentation.index')->with(['alertMessage' => $alertMessage, 'presentations' => $presentations]);
    }
    
    public function asistant($presentationid)
    {
        // $presentations = Presentation::orderBy('tittle', 'asc')->paginate(1);
        $presentations = DB::table('presentations')->find($presentationid);
        // $results = DB::select('select * from pre where id = :id', ['id' => 1]);
        return view('presentation.asistant')->with('presentations' , $presentations);
    }
    
    public function pdf2(){
        return view('presentation.pdf');
    }
    public function admin(){
        return view('admin.index');
    }
    
    public function storePresentation(Request $request){
        
        
        $presentation = new Presentation([
            'tittle' => $request->get('tittle'),
            'video' => $request->get('video'),
        ]);

        $presentation->user()->associate(\Auth::user()->id);
        $presentation->push();
        
        if($presentation->save()){
            $request->session()->flash('op', 'success');
        }
        
        return redirect('/');
    }
    public function presentationCreate(Request $request){
        return view('presentation.create');
    }
   
    // public function pay(){
        
    //   return view('presentation.pay');
    // }
    
    // public function back()
    // {
    //      return view('back.back');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \App\User;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],   // quita unico cuanod te vayas a editar el formulario , el email es el mismo que tenia no debe de ser unico y si no te peta con el sql y te casca
        ]);

    }

    public  function  passwordValidator(array $data){

        return passwordValidator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'], // confirmed es
            'oldpassword' => ['required', 'string', 'min:8'],
            // correo que ya existe validar a posteriori generar errores
        ]);
    }
    /*
     * Show the form for editing the specified
     */
    public function edit(Request $request){
        // coger los datos y inscribirtelos

//        dd(); var_dump de laravel
        $messages = [
            'passwordok'    => 'la clave de acceso ha sido modificada correctamente',
            'passwordko'    => 'No se ha podido modificar la clave de acceso',
            'useredit'      =>  'Usuario editado',
        ];
        $opSession = $request->session()->get('op');
        $alertMessage = null;
        if(isset($messages[$opSession])) {
            $alertMessage = $messages[$opSession];
        }
        return view('auth.edit')->with(['alertMessage' => $alertMessage]);
    }

    public function password(Request $request)
    {
        $this->passwordValidator($request->all()->validate());
        $oldpassword = $request->input('oldpassword');
        $user = Auth::user();

        if(Hash::check($oldpassword, $user->password))
        {
            $password = $request->input('password');
            $user->password = Hash::make($password);
            $user->save();
            $request->session()->flash('op', 'passwordok');
        }
        else
        {
            $request->session()->flash('op', 'passwordko');
        }
        return redirect(url('user'));
    }

    public function update(Request $request, User $user){
        $input = $this->validator($request->all())->validate();
       // si existe un usuario con ese correo ni siquiera mandar update  es decir consultar la base de datos
        // si el correo es diferente al anterio lo comprobar
//        $email = $request->input('email');
        $user = Auth::user();
//        $user->name = $request->input('name');  //cambiar user name
//        $user->email = $request->input('email');

//         try
//         {
//             // tienes que obtener el inpur del email , para comprobar si ha cambiado
//             if(voycambiarcorreo)   //$this->checkEmail($input['email'])
// //             {
// //                 marca
// //             }
// // //            $user->save();  // siempre vas a hacer un redirect cuando consultas la base de datos
// //             $user->update($input);

// //             if(marca)   //$this->checkEmail($input['email'])
// //             {
// //                 logout
// //                 sendEmailVerification
// //             }
// //             // comprobar
//         }catch (\Exception $e)  // si no ha funcionao ni nombre ni correo volver con los mensages de error
//         {
//             $error = ['email' => 'Correo duplicado'];
//             return redirect('user')->withErrors($error)->withInput();
//         }

        $request->session()->flash('op', 'useredit');
        return redirect(url('user'));

    }

    private function checkEmail(string $email){
        return $user = User::where('email', $email)->first() === null;
    }


}

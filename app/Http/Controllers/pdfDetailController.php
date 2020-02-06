<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pdfDetail;


class pdfDetailController extends Controller
{

    public function store(Request $request){

      $user = new pdfDetail([
        'first_name' => $request->get('first_name'),
        'last_name' => $request->get('last_name'),
        'card' => $request->get('card'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone')
      ]);

      $user->save();
      return redirect('/pdfindex');
    }
    public function index(){
      $users = pdfDetail::all();
      return view('pdfindex')->with('users' , $users);
    }
    
    public function downloadPDF($id){
      
      $user = pdfDetail::find($id);

      $pdf = \PDF::loadView('pdfwrite', compact('user'));
      return $pdf->download('Certificate.pdf');

    }
}
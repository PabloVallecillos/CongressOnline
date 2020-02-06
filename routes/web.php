<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains t-zz+--zz
*/
//Route::get('/home', 'HomeController@index')->name('home');

/*Route::get('/', function () {
    return view('index');
});*/

// Route::get('/', 'IndexController@index');
Route::get('/', 'IndexController@presentation');
Route::get('asistant/{presentationid?}', 'IndexController@asistant');
Route::get('asistant/{presentationid?}/pdf', 'IndexController@pdf2');
Route::get('pdfindex', 'pdfDetailController@index');

Route::post('submitForm','pdfDetailController@store');

Route::get('/downloadPDF/{id}','pdfDetailController@downloadPDF');

// Route::get('/pay/{id}','IndexController@pay');


// Route::get('subirDragDrop/', 'FileUploadDragDropController@subir');

Route::get('subir/{presentationid?}', 'FileUploadController@subir');

Route::post('upload/{presentationid?}','FileUploadController@upload');
Route::get('ver/{archivo}','FileUploadController@ver');


// Route::get('asistant/{presentationid?}/notes', 'IndexController@notes');


// Route::get('back', 'IndexController@back');

// Route::get('loginback', 'IndexController@back');
Route::get('correo', 'IndexController@correo');
Auth::routes(['verify' => true]); // PLANTILLA logico siempre hay que estar verificado

Route::get('guest', 'IndexController@guest')->middleware('guest');  // que no estes autentificado a esta ruta
Route::get('auntentificado', 'IndexController@auntentificado')->middleware('auth');
Route::get('verificado', 'IndexController@verificado')->middleware(['auth', 'verificado']); // auntetificado y verificado
Route::get('basic', 'IndexController@basic')->middleware(\App\Http\Middleware\BasicMiddleware::class); // auntetificado y verificado   basic inyecta datos al request
                                //  next param
Route::get('admin', 'IndexController@admin')->middleware(\App\Http\Middleware\AdminMiddleware::class);
// cuando obtienes la ruta antes de llegar al controlador si pone middware

Route::get('postview', 'IndexController@postview')->middleware(\App\Http\Middleware\PostViewMiddleware::class);

// Route::get('/', 'PresentationController@index');
Route::get('p', 'PokemonController@index');
Route::get('create', 'PokemonController@create');

// // Route::resource('type', 'TypeController');
Route::resource('user', 'UserController')->except(['index', 'create', 'show', 'store', 'destroy']); // -> except([]) array de rutas que no quiero de recurosos
Route::get('user', 'IndexController@edit');
Route::get('user', 'PokemonController@store');

 Route::get('user', 'UserController@edit')->middleware('auth'); // ya que estas ya verificado no hace falta verify
 Route::put('user', 'UserController@update')->middleware('auth');
 Route::put('user/password', 'UserController@password')->middleware('auth');

// // Route::resource('pokemon', 'PokemonController');
// // Route::get('pokemon/image/{pokemonid}', 'PokemonController@imageid');  //sabes su nombre pero no su extension  si no tienes la info bdd image src  =  route(pokemonid)  ruta a alguna pagina php que te diga que esa es la imagen
// // Route::get('pokemon/image/file/{pokemonfile?}', 'PokemonController@imagefile');  // metodo que te va ha mostrar el archivo que yo te pido  si la tinees bdd

// // //Route::get('pokemon/imagefile/{pokemonfile?}',function ($pokemonfile = '0.jpg'));  // metodo que te va ha mostrar el archivo que yo te pido  si la tinees bdd

// // ruta ayax suelen ser get   <-   <-   <-   <-   <-   <- 

// Route::resource('pokemonajax', 'PokemonAjaxController');      // js  asincrono y json 
// Route::get('indexajax', 'PokemonAjaxController@indexajax');      // js  asincrono y json 

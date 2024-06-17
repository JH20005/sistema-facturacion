<?php

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\InventarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PERSONAS
//Route::get('/',[PersonasController::class,'index'])->name('personas.index'); //--correcta
Route::get('/inicio',[PersonasController::class,'index'])->name('personas.index');
Route::get('/create',[PersonasController::class,'create'])->name('personas.create');
Route::post('/store',[PersonasController::class,'store'])->name('personas.store');
Route::get('/edit/{id}',[PersonasController::class,'edit'])->name('personas.edit');
Route::put('/update/{id}',[PersonasController::class,'update'])->name('personas.update');
Route::get('/show/{id}',[PersonasController::class,'show'])->name('personas.show');
Route::delete('/destroy/{id}',[PersonasController::class,'destroy'])->name('personas.destroy');


//INVENTARIO
Route::get('/inventarioinicio', [InventarioController::class, 'index'])->name('inventario.index');
Route::get('/inventariocreate',[InventarioController::class,'create'])->name('inventario.create');
Route::get('/inventarioedit/{id}',[InventarioController::class,'edit'])->name('inventario.edit');
Route::get('/inventarioshow/{id}',[InventarioController::class,'show'])->name('inventario.show');
Route::post('/inventariostore',[InventarioController::class,'store'])->name('inventario.store');
Route::put('/inventarioupdate/{id}',[InventarioController::class,'update'])->name('inventario.update');
Route::delete('/inventariodestroy/{id}',[InventarioController::class,'destroy'])->name('inventario.destroy');
/*








/*PARA EL LOGIN*/
Route::get('/', function(){
    return view('welcome');
});

//Route::view('/','welcome');
Route::view('login','login')->name('login');//->middleware('guest');
Route::view('dashboard','dashboard')->middleware('auth');

Route::post('login',function(){

    $credentials= request()->validate(['email'=>['required','email','string']
                                        ,'password'=>['required','string']
                                    ]);

    $remember=request()->filled('remember');
    
    //dump($credentials);

    if(Auth::attempt($credentials,$remember)){
     request()->session()->regenerate();
        return redirect()->intended('dashboard');   
    }
    return redirect('login');   
});

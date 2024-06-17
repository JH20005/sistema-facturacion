<?php

use App\Http\Controllers\PersonasController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\Auth\CustomLoginController;
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




//VENTAS
// Rutas para el controlador de ventas
Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
Route::get('/ventas/create', [VentasController::class, 'create'])->name('ventas.create');
Route::post('/ventas', [VentasController::class, 'store'])->name('ventas.store');
Route::get('/ventas/{id}', [VentasController::class, 'show'])->name('ventas.show');
Route::get('/ventas/{id}/edit', [VentasController::class, 'edit'])->name('ventas.edit');
Route::put('/ventas/{id}', [VentasController::class, 'update'])->name('ventas.update');
Route::delete('/ventas/{id}', [VentasController::class, 'destroy'])->name('ventas.destroy');


Route::get('ventas/{id}/print', [VentasController::class, 'print'])->name('ventas.print');


//PARA EL LOGIN



// Rutas de autenticación
Route::get('/login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login']);
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {    return view('dashboard');});
Route::get('/', function () {
    return view('welcome');
});


/*PARA EL LOGIN
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
*/
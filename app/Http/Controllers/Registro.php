<?php

namespace App\Http\Controllers;

use App\Models\Registro as ModelsRegistro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class Registro extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('registro.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('registro.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $user = Usuario::find('9ad8429e-e8a8-464f-91bd-e58d4612abed');

    $data = $request->all();

    $registro = new ModelsRegistro([
      'titulo' => $data['titulo'],
      'texto' => $data['texto'],
      'frase_do_dia' => $data['frase'],
      'cor' => $data['cor'],
    ]);

    $user->registros()->save($registro);

    return redirect(route('registro.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('registro.show');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

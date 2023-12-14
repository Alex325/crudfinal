<?php

namespace App\Http\Controllers;

use App\Models\Registro as ModelsRegistro;
use App\Models\Usuario;
use DateTime;
use Illuminate\Http\Request;

class Registro extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $regs = ModelsRegistro::all();
    return view('registro.index', ['regs' => $regs]);
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
    $data = $request->all();

    $registro = new ModelsRegistro([
      'titulo' => $data['titulo'],
      'texto' => $data['texto'],
      'frase_do_dia' => $data['frase'],
      'cor' => $data['cor'],
    ]);

    $registro->save();

    return redirect(route('registro.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $reg = ModelsRegistro::find($id);
    $dataFormatada = (new DateTime($reg->data))->format("d/m/Y à\s H:i:s");
    return view('registro.show', [
      'reg' => $reg,
      'dataFormatada' => $dataFormatada
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {

    $reg = ModelsRegistro::find($id);
    return view('registro.edit', [
      'reg' => $reg
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $data = $request->all();

    $reg = ModelsRegistro::find($id);
    $reg->titulo = $data['titulo'];
    $reg->frase_do_dia = $data['frase'];
    $reg->cor = $data['cor'];

    $reg->save();

    return redirect(route('registro.index'));
    

  }

  public function delete(string $id)
  {
    $reg = ModelsRegistro::find($id);
    return view('registro.delete', [
      'reg' => $reg
    ]);
  }

  public function destroy(string $id)
  {
    ModelsRegistro::destroy($id);
    return redirect(route('registro.index'));
  }
}

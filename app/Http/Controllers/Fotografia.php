<?php

namespace App\Http\Controllers;

use App\Models\Fotografia as ModelsFotografia;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class Fotografia extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $fotos = ModelsFotografia::all();
    return view('fotografia.index', ['fotos' => $fotos]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('fotografia.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->all();

    $arquivo = file_get_contents($request->file('imagem')->path());

    $base64 = 'data:image/' . $request->file('imagem')->extension() . ';base64,' . base64_encode($arquivo);

    $foto = new ModelsFotografia([
      'titulo' => $data['titulo'],
      'referencia' => $base64,
      'data_da_foto' => $data['data'],
      'legenda' => $data['legenda'],
    ]);

    $foto->save();
    return redirect(route('fotografia.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $foto = ModelsFotografia::find($id);
    $dataFormatada = (new DateTime($foto->data))->format("d/m/Y à\s H:i:s");
    $tiradaem = !is_null($foto->dataDaFoto) ? (new DateTime($foto->data_da_foto))->format('d/m/Y') : "Desconhecido";
    return view('fotografia.show', [
      'foto' => $foto,
      'data' => $dataFormatada,
      'tiradaem' => $tiradaem
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {

    $foto = ModelsFotografia::find($id);
    return view('fotografia.edit', [
      'foto' => $foto
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $data = $request->all();

    $foto = ModelsFotografia::find($id);
    $foto->titulo = $data['titulo'];
    $foto->legenda = $data['legenda'];
    $foto->data_da_foto = $data['data'];

    $foto->save();

    return redirect(route('fotografia.index'));
    

  }

  public function delete(string $id)
  {
    $foto = ModelsFotografia::find($id);
    return view('fotografia.delete', [
      'foto' => $foto
    ]);
  }

  public function destroy(string $id)
  {
    ModelsFotografia::destroy($id);
    return redirect(route('fotografia.index'));
  }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function cidades()
    {
        $subtitulo = 'Lista de Cidades';
        $cidades = Cidade::all();

        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(CidadeRequest $request)
    {
        Cidade::create($request->all());

        $request->session()->flash('success', "Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.list');
    }
}

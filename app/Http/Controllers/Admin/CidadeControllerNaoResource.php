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
        $action = route('admin.cidades.add');

        return view('admin.cidades.form', compact('action'));
    }

    public function adicionar(CidadeRequest $request)
    {
        Cidade::create($request->all());
        $request->session()->flash('success', "Cidade $request->nome incluída com sucesso!");

        return redirect()->route('admin.cidades.list');
    }

    public function delete($id, Request $request)
    {
        Cidade::destroy($id);
        $request->session()->flash('success', "Cidade $request->nome excluída com sucesso!");

        return redirect()->route('admin.cidades.list');
    }

    public function formEdit($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.edit', $cidade->id);

        return view('admin.cidades.form', compact('cidade', 'action'));
    }

    public function edit(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());

        $request->session()->flash('success', "Registro de $request->nome atualizado com sucesso!");
         return redirect()->route('admin.cidades.list');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CidadeController;
use App\Models\{Cidade, Tipo, Finalidade, Imovel, Endereco, Proximidade};
use Illuminate\Http\Request;
use App\Http\Requests\ImovelRequest;
use Illuminate\Support\Facades\DB;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $imoveis = Imovel::join('cidades', 'cidades.id', '=', 'imoveis.cidade_id')
                            ->join('enderecos', 'enderecos.imovel_id', '=', 'imoveis.id')
                            ->orderBy('cidades.nome', 'asc')
                            ->orderBy('enderecos.bairro', 'asc')
                            ->orderBy('titulo', 'asc');

        $cidade_id = $request->cidade_id;
        $titulo = $request->titulo;

        if ($cidade_id) {
            $imoveis->where('cidades.id', $cidade_id);
        }

        if ($titulo) {
            $imoveis->where('titulo', 'like', "%$titulo%");
        }

        $imoveis = $imoveis->paginate(env('PAGINATION'))->withQueryString();

        $cidades = Cidade::orderBy('nome')->get();

        return view('admin.imoveis.index', compact('imoveis', 'cidades', 'cidade_id', 'titulo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();

        $action = route('admin.imoveis.store');
        return view('admin.imoveis.form', compact('action', 'cidades', 'tipos', 'finalidades', 'proximidades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImovelRequest $request)
    {
        DB::beginTransaction();

        $enderecos = Endereco::all();
        $imovel = Imovel::create($request->all());
        $imovel->endereco()->create($request->all());

        if ($request->has('proximidades')) {

            $imovel->proximidades()->sync($request->proximidades);

        }

        DB::commit();

        $request->session()->flash('success', "Imóvel $request->nome incluído com sucesso!");
        return redirect()->route('admin.imoveis.index', compact('enderecos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);

        return view('admin.imoveis.show', compact('imovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imovel = Imovel::with(['cidade', 'endereco', 'finalidade', 'tipo', 'proximidades'])->find($id);

        $cidades = Cidade::all();
        $tipos = Tipo::all();
        $finalidades = Finalidade::all();
        $proximidades = Proximidade::all();

        $action = route('admin.imoveis.update', $imovel->id);
        return view('admin.imoveis.form', compact('imovel', 'action', 'cidades', 'tipos', 'finalidades', 'proximidades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImovelRequest $request, $id)
    {
        $imovel = Imovel::find($id);

        DB::beginTransaction();

        $imovel->update($request->all());
        $imovel->endereco->update($request->all());

        if ($request->has('proximidades')){
            $imovel->proximidades()->sync($request->proximidades);
        }

        DB::commit();

        $request->session()->flash('success', "Imóvel $request->nome atualizado com sucesso!");
        return redirect()->route('admin.imoveis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $imovel = Imovel::find($id);

        DB::beginTransaction();

            $imovel->endereco->delete();
            $imovel->delete();

        DB::commit();

        $request->session()->flash('success', "Imóvel $request->nome excluído com sucesso!");
        return redirect()->route('admin.imoveis.index');
    }
}

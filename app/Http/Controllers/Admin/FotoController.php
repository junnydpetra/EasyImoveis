<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\ImovelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\{Imovel, Foto};

use Image;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $imovel = Imovel::find($id);
        $fotos = Foto::where('imovel_id', $id)->get();
        return view('admin.imoveis.fotos.index', compact('imovel', 'fotos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $imovel = Imovel::find($id);
        return view('admin.imoveis.fotos.form', compact('imovel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        if ($request->hasFile('foto')) {
            if ($request->foto->isValid()) {

                $fotoURL = $request->foto->hashName("imoveis/$id");

                $imagem = Image::make($request->foto)->resize(1600,900);

                Storage::disk('public')->put($fotoURL, $imagem->encode());

                $foto = new Foto();
                $foto->url = $fotoURL;
                $foto->imovel_id = $id;
                $foto->save();
            }
        }

        $request->session()->flash('sucesso', 'Foto incluída!');
        return redirect()->route('admin.imoveis.fotos.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

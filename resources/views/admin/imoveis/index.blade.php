@extends('admin.layouts.main')

@section('main_content')

    <table class="highlight">
        <thead>
            <tr>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Título</th>
                <th class="right-align">Opções</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($imoveis as $imovel)
                <tr>
                    <td>{{$imovel->cidade->nome}}</td>
                    <td>{{$imovel->endereco->bairro}}</td>
                    <td>{{$imovel->titulo}}</td>
                    <td class="right-align">

                        <a href="{{route('admin.imoveis.fotos.index', $imovel->id)}}">
                            <span style="cursor: pointer">
                                <i class="material-icons green-text text-lighten-1" title="fotos">insert_photo</i>
                            </span>
                        </a>

                        <a href="{{route('admin.imoveis.show', $imovel->id)}}">
                            <span style="cursor: pointer">
                                <i class="material-icons indigo-text text-darken-2" title="visualizar">remove_red_eye</i>
                            </span>
                        </a>

                        <a href="{{route('admin.imoveis.edit', $imovel->id)}}">
                            <span style="cursor: pointer">
                                <i class="material-icons blue-text text-darken-1" title="editar">edit</i>
                            </span>
                        </a>

                        <form action="{{route('admin.imoveis.destroy', $imovel->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button style="border:0; background:transparent;" type="submit">
                                <span style="cursor: pointer">
                                    <i class="material-icons red-text text-darken-1" title="excluir">delete_forever</i>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Não há imóveis cadastrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="fixed-action-btn">
        <a href="{{route('admin.imoveis.create')}}" class="btn-floating btn-large waves-effect waves-light">
            <i class="large material-icons">add</i>
        </a>
    </div>

@endsection

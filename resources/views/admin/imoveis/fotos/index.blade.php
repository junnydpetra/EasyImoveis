 @extends('admin.layouts.main')

 @section('main_content')
        <h4>{{$imovel->titulo}}</h4>

        <section class="section">

            <div class="flex-container">

                @forelse ($fotos as $foto)

                    <div class="flex-item">

                        <span class="btn-close">
                            <form action="{{route('admin.imoveis.fotos.destroy', [$imovel->id, $foto->id])}}" method="POST"         style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button style="border:0; background:transparent;" type="submit">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-darken-1" title="excluir">delete_forever</i>
                                    </span>
                                </button>
                            </form>
                        </span>

                        <img src="{{asset("storage/$foto->url")}}" width="150" height="100">
f
                    </div>

                @empty
                    <div>Não há fotos cadastradas para este imóvel!</div>
                @endforelse

            </div>

            <div class="fixed-action-btn">
                <a href="{{route('admin.imoveis.fotos.create', $imovel->id)}}" class="btn-floating btn-large wave-effect waves-light">
                    <i class="large material-icons">add</i>
                </a>
            </div>

        </section>
 @endsection

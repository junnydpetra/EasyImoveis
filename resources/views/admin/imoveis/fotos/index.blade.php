 @extends('admin.layouts.main')

 @section('main_content')
        <h4>{{$imovel->titulo}}</h4>

        <section class="section">

            <div class="flex-container">

                @forelse ($fotos as $foto)

                    <div class="flex-item">
                        <img src="{{asset("storage/$foto->url")}}" width="150" height="100">
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

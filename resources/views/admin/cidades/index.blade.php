@extends('admin.layouts.main')

@section('main_content')

    <section>

        <table class="highlight">
            <tr>
                <th>Cidades</th>
                <th class="right-align">Opções</th>
            </tr>

            <tbody>
                @forelse ($cidades as $cidade)
                    <tr>
                        <td>{{ $cidade->nome }}</td>
                        <td class="right-align">Excluir</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não há cidades cadastradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="{{route ('admin.cidades.formAdd')}}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </section>

@endsection

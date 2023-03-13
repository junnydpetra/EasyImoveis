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
                        <td class="right-align">

                            <a href="{{route('admin.cidades.edit', $cidade->id)}}">
                                <span style="cursor: pointer">
                                    <i class="material-icons blue-text text-darken-1">edit</i>
                                </span>
                            </a>

                            <form action="{{route('admin.cidades.destroy', $cidade->id)}}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')

                                <button style="border:0; background:transparent;" type="submit">
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-darken-1">delete_forever</i>
                                    </span>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não há cidades cadastradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a href="{{route('admin.cidades.create')}}" class="btn-floating btn-large waves-effect waves-light">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </section>

@endsection

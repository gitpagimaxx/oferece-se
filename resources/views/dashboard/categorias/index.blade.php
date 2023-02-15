<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                <div class="card">
                    <div class="card-header"><b>Base de Conhecimento</b></div>

                    <div class="card-body">

                        <div class="row mb-3">
                            <div class="col">
                                <a href="{{ url(ENV('APP_URL')) }}/dashboard/categoria/criar" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
                            </div>
                        </div>
                        @if(!empty(Session::get('message')))
                            <div class="alert alert-success"> {{ Session::get('message') }}</div>
                        @endif
                        @if(!empty(Session::get('error')))
                            <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <form action="{{ url(ENV('APP_URL')) }}/dashboard/criar" method="get" class="row g-3">
                                    <div class="col-11">
                                        <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar...">
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" class="btn btn-primary mb-3">Buscar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @if(!empty($palavra))
                        <div class="row mb-2">
                            <div class="col">
                                Filtrado por <b>{{ $palavra }}</b>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Data</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($registros ?? '' as $item)
                                        <tr>
                                            <td><a href="{{ url(ENV('APP_URL')) }}/dashboard/categorias/{{ $item->id }}">{{ $registros[0]->Nome }}</a></td>    
                                            <td style="width:160px;">{{ date('d/m/Y H:i', strtotime($registros[0]->created_at)) }}</td>
                                            <td style="width:130px;">
                                                <a href="{{ url(ENV('APP_URL')) }}/dashboard/categorias/{{ $item->id }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Detalhar"><i class="fas fa-info-circle"></i>&nbsp;Visualizar</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col text-right">
                                
                            </div>
                        </div>
                        
                    </div>

                </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

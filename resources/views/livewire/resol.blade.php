<div>
    <section class = "content_header">
        <section class = "content">
            <div class ="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resol</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Protocolos a Enviar:</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body p-0">
                                    <table class="table table-striped table-bordered">
                                        <div>
                                            <thead>
                                                <tr>
                                                    <th class="text-center">N° da resolução </th>
                                                    <th class="text-center">N° do Processo </th>
                                                    <th class="text-center">Assunto</th>
                                                    <th class="text-center">Destino</th>
                                                    <th class="text-center">Data </th>
                                                    <th class="text-center">Arquivo </th>
                                                    <th class="text-center">Setor origem </th>
                                                    <th class="text-center">Autorizado </th>
                                                    @if (auth()->user()->can('Jurídico'))
                                                        <th class="text-center">Confirmar Autorização</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                        </div>
                                        <body>
                                            <tbody>
                                                @forelse ($oficio as $oficios)
                                                <livewire:resol-row :oficio="$oficios" :key="$oficios->id"/>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" class="text-center">Nenhum Registro
                                                            encontrado</td>
                                                    </tr>
                                                @endforelse
                                            <tfoot>
                                                <tr>
                                                    <td colspan="11">
                                                        <a class="btn btn-primary float-right"
                                                            href="{{ route('protocolos.create') }}">Adicionar Assunto
                                                            do oficio</a>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            </tbody>
                                        </body>
                                    </table>

                                </div>
                                {!!  $oficio->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>

</div>

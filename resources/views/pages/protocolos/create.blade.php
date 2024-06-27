@extends('adminlte::page')

@section('content')
    <section class = "content_header">
        <section class = "content">
            <div class ="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Controle de Processos</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Criação de Protocolos a Enviar:</h3>
                            </div>
                            <div class="card-body">
                                <div class="card-body p-0">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <form method="POST" action="{{ route('protocolos.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="assunto">Assunto:</label>
                                                    <textarea class="form-control @error('assunto') is-invalid @enderror" name="assunto" placeholder="Insira o Assunto aqui" id="textarea"
                                                        style="margin-bottom: 10px"></textarea>
                                                    @error('assunto')
                                                        <span class="error invalid-feedback">Por favor coloque um assunto
                                                            valido</span>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label for="numero_processo">Número processo:</label>
                                                        <input class="form-control @error('numero_processo') is-invalid @enderror numero-processo-input" name="numero_processo" placeholder="Insira o Número do Processo aqui" type="text"
                                                        style="margin-bottom: 10px" maxlength="17" />
                                                        @error('numero_processo')
                                                            <span class="error invalid-feedback">Por favor coloque um número valido
                                                            </span>
                                                        @enderror
                                                    </div>

                                                    <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                        const numeroProcessoInput = document.querySelector('.numero-processo-input');
                                                        numeroProcessoInput.addEventListener('input', function(event) {
                                                            const inputValue = event.target.value;
                                                            const formattedValue = inputValue
                                                                .replace(/\D/g, '')
                                                                .replace(/^(\d{4})(\d{6})?(\d{5})?/, '$1.$2.$3');
                                                            if (inputValue !== formattedValue) {
                                                                event.target.value = formattedValue;
                                                            }
                                                        });

                                                        numeroProcessoInput.addEventListener('keydown', function(event) {
                                                            if (event.key === 'Control' || event.key === 'v') {
                                                                event.preventDefault();
                                                            }
                                                        });
                                                    });
                                                    </script>
                                                    <div class="form-group">
                                                        <label for="assunto">Destino:</label>
                                                        <input class="form-control @error('destino') is-invalid @enderror" name="destino" placeholder="Insira o Setor de Destino aqui" type="text" style="margin-bottom: 10px"/>
                                                        @error('destino')
                                                            <span class="error invalid-feedback">Por favor coloque um Destino
                                                                valido</span>
                                                        @enderror
                                                        {{-- @dd(old("numero_processo")) --}}
                                                    <div class="form-group">
                                                        <label for="">Setor Solicitante:</label>
                                                        <input class="form-control " name="setor_nome" placeholder="Insira o Assunto aqui" type="text"
                                                    value="{{auth()->user()->role}}" readonly/>
                                                    <input name="setor_id"  type="hidden" value="{{auth()->user()->int_GrupoId}}" readonly/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tipo">Tipo:</label>
                                                        <select class="form-control" name="tipo">
                                                            <option value="">Nenhum</option>
                                                            <option value="1">Oficio</option>
                                                            <option value="2">Resoluções</option>
                                                            <option value="3">Ci</option>
                                                        </select>
                                                    </div>
                                                        <label for="">Documento:</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input @error('arquivos') is-invalid @enderror" name="arquivos">
                                                        <label class="custom-file-label" for="customFile">
                                                        </label>
                                                        @error('arquivos')
                                                        <span class="error invalid-feedback">Por favor coloque um Arquivo
                                                            valido</span>
                                                    @enderror
                                                    </div>
                                                    </div>
                                                </div>
                                        <tfoot class="border border-danger">
                                            <div>
                                                <button type="submit" class="btn btn-primary float-right ">Adicionar
                                                    Assunto</button>
                                            </div>

                                        </tfoot>
                                        </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>
@endsection

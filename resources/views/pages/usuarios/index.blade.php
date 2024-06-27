@extends('adminlte::page')
@section('content')
<section class="content-header">
<section class="content">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Usuários</h1>
            </div>
            <div class="col-sm-6">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Todos os Usuários</h3>
                </div>
                {{-- <div class="input-group input-group-sm" style="width: 350px;">
                    <input type="text" wire:model.live="search" class="form-control float-right"
                        placeholder="Pesquisar por nome do participante">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div> --}}
                <div class="card-body p-0">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">Nome</th>
                            <th class="text-center">Setor</th>
                            {{-- <th class="text-center">Ações</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                                <tr>
                                    <td class="text-center">{{$usuario->str_Nome}}</td>
                                    <td class="text-center">{{$usuario->role}}</td>
                                    {{-- <td>
                                        <a class="text-center; btn-outline-info" href=""><i
                                            class="far fa-eye"></i></a>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Nenhum Registro encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {!!  $usuarios->links() !!}
            </div>
            </div>
        </div>
    </div>
    </div>
</section>
</section>

@endsection


@if(session('message'))
<div id="flash-message" class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                Lista de usuarios
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th><i class="fa fa-user"></i> NOME</th>
                        <th><i class="fa fa-calendar"></i> Data de Vencimento</th>
                        <th><i class="fa fa-users"></i> Criado por</th>
                        <th><i class="fa fa-check-circle"></i> Status</th>
                        <th><i class="fa fa-cog"></i> Ações</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td><a href="{{ route('funcionario.perfil', ['id' => $usuario->id]) }}">{{ $usuario->name }}</a></td>
                        <td>{{ \Carbon\Carbon::parse($usuario->data_vencimento)->format('d/m/Y H:i:s') }}</td>
                        <td>{{ $usuario->created_by }}</td>
                        <td><span class="badge badge-info label-mini">{{ $usuario->status }}</span></td>
                        <td>
                            @if($usuario->is_blocked)
                            {{-- Usuário está bloqueado, mostrar botão para desbloquear --}}
                            <a href="{{ route('usuarios.desbloquear', ['id' => $usuario->id]) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-unlock"></i>
                            </a>
                            @else
                            {{-- Usuário está ativo, mostrar botão para bloquear --}}
                            <a href="{{ route('usuarios.bloquear', ['id' => $usuario->id]) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-lock"></i>
                            </a>
                            @endif
                            <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                             <a href="{{ route('plano.renovar', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i></a>
                           <form id="delete-user-{{ $usuario->id }}" action="{{ route('users.destroy', $usuario->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); 
                                if(confirm('Tem certeza que deseja deletar este usuário?')) {
                                    document.getElementById('delete-user-{{ $usuario->id }}').submit();
                                }">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>

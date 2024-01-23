@extends('layouts.base')

<!-- Formulario para enlistar todos los registros -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Usuarios admin</h2>

            <!-- Botón para agregar un usuario -->
            <a class="btn btn-success mb-4" href="{{ url('/form') }}">Agregar usuario</a>

            <!--Mensaje flash-->
            @if(session('usuarioEliminado'))
            <div class="alert alert-success">
            {{ session('usuarioEliminado')}}
            </div>
            @endif
            
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user as $user)
                    <tr>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                        <a href="{{ route('editform', $user->id) }}" Class="btn btn-primary mb-1" >
                            <i class="fas fa-pencil-alt"> </i>
                        </a>

                        <form action="{{ route('delete', $user->id)}}" method="POST">
                            @csrf @method('DELETE')

                            <button type="submit" onclick="return confirm('¿Borrar usuario?');" class="btn btn-danger"> 
                                <i class="fas fa-thash-alt"></i>
                            </button>

                        </form>
                        
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
            
            </table>

            <!-- Para generar la paginación -->
            {{ $users->links() }}
        
        </div>
    </div>
</div>
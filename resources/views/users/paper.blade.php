@extends('layout')

@section('title', "Papelera")

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('users.create') }}" class="btn btn-primary">Nuevo usuario</a>
        </p>
    </div>

    @if($users->isNotEmpty())
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de Eliminacion</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            @if($user->trashed())
                <tr>
                    <td scope="row">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->trashed() ? 'Eliminado' : 'Activo' }}</td>
                    <td>{{ $user->trashed() ? $user->deleted_at : '' }}</td> 
                    <td class="form-inline">
                        
                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link"><span class="material-symbols-outlined">delete_forever</span></button>
                            </form>
                            <form action="{{ route('user.restore', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-link">
                <span class="material-symbols-outlined">restore</span>
            </button>
        </form>
                     
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No hay usuarios registrados</p>
    @endif
@endsection

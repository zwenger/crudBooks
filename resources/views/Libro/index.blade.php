@extends('layouts.layout')
@section('content')
    <section class="content">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="pull-left"><h3>Lista de Libros</h3></div>
                    <div class="pull-right">
                        <div class="btn-group">
                            <a href="{{ route('libro.create') }}" class="btn btn-info"><i class="fa fa-plus fa-lg"></i> Añadir Libro </a>
                        </div>
                    </div>
                    <div class="table-container">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>Nombre</th>
                            <th>Resumen</th>
                            <th>No. Paginas</th>
                            <th>Edicion</th>
                            <th>Autor</th>
                            <th>Precio</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            </thead>
                            <tbody>
                                @if($libros->count())
                                @foreach($libros as $libro)
                                <tr>
                                    <td>{{ $libro->nombre }}</td>
                                    <td>{{ $libro->resumen }}</td>
                                    <td>{{ $libro->npagina }}</td>
                                    <td>{{ $libro->edicion }}</td>
                                    <td>{{ $libro->autor }}</td>
                                    <td>${{ $libro->precio }}</td>
                                    <td><a class="btn btn-primary btn-xs" href="{{action('LibroController@edit', $libro->id)}}" ><i class="fa fa-pencil fa-lg"></i></a></td>
                                    <td>
                                        <form action="{{ action('LibroController@destroy', $libro->id) }}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o fa-lg"></i> </a> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8">No hay registro!!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $libros->links() }}
            </div>
        </div>
    </section>
@endsection
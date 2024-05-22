@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        @php
        $currentDate = now()->format('M-d');   
       @endphp
        <div class="card">
            <div class="card-header">Student List</div>
            <div class="card-body">
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Añadir estudiante</a>
                <a href="{{ route('students.assist') }}" class="btn btn-warning btn-sm my-2"><i class="bi bi-plus-circle"></i> Añadir asistencia</a>
                <a href="{{ route('students.parametro')}}" class="btn btn-info btn-sm my-2"><i class="bi bi-plus-circle"></i> Parámetros</a>                
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Cumpleaños</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $student->dni }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>

                                {{ $student->birthday }}
                                

                                @if (date('d-m', strtotime($student->birthday)) === date('d-m'))

                                    <p class="btn-success">¡Hoy cumple años!</p>
                                @endif
                            
                            </td>
                            <td>{{ $student->group }}</td>
                            <td>
                                <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Ver</a>

                                    <!--<a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>-->
                                    
                                    <a href="{{ route('students.assists', $student->id) }}" class="btn btn-success btn-sm"><i class="bi bi-eye"></i> Asistencias</a>

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Student Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $students->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection
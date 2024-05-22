@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Añadir asistencia
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">


                <form action="{{ route('students.assistDni') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni">
                    </div>
                    <button type="submit" >Buscar</button>
                </form>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif




                @if(isset($student))
                    <div>
                        <h2>Student Information</h2>
                        <p><strong>ID:</strong> {{ $student->id }}</p>
                        <p><strong>First Name:</strong> {{ $student->first_name }}</p>
                        <p><strong>DNI:</strong> {{ $student->dni }}</p>
                    </div> <br>
                    <div>
                        <h2>Asistencias</h2>
                        <form action="{{ route('students.storeAssist') }}" method="POST">
                            @csrf
                            <input  type="hidden" name="student_id" value="{{ $student->id }}">
                            <button type="submit">Añadir Asistencia</button>
                        </form>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($student->assists as $assist)

                        <p>{{ $i }} -> {{ $assist->created_at}}</p>
                        @php
                        $i = $i+1; 
                        @endphp
                        @endforeach
                    </div>
                    @else
                        @if($errors->any())
                            <div class="alert alert-danger">
                                No hay alumnos con ese DNI
                            </div>
                        @endif
                    
                @endif


            </div>
        </div>
    </div>    
</div>
    
@endsection
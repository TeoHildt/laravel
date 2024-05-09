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
                <form action="{{ route('students.check') }}" method="post">
                    @csrf



                    <div class="mb-3 row">
                        <label for="student_dni" class="col-md-4 col-form-label text-md-end text-start">DNI: </label>
                        <div class="col-md-6">
                          <input type="text" id="student_dni" name="student_dni">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Añadir asistencia">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection
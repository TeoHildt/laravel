@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Configurar parámetros
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('students.parametro') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="dni" class="col-md-4 col-form-label text-md-end text-start">Dias de clase</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}">
                            @if ($errors->has('dni'))
                                <span class="text-danger">{{ $errors->first('dni') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end text-start">Porcentaje para promocionar</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end text-start">Porcentaje para regularizar </label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                    </div>



                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Guardar">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection
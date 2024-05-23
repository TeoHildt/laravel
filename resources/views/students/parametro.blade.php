@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Product
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>  
            </div>
            <div class="card-body">
                <form action="{{ route('students.parametro1') }}" method="post">
                    @csrf
                    
                    <input type="hidden" value="1" name="id">
                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"> Días de clase totales:</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('code') is-invalid @enderror" id="total_clases" name="total_clases" value="">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"> Porcentaje de promoción: </label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('name') is-invalid @enderror" id="promocion" name="promocion" value="">

                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"> Porcentaje de regularización: </label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="regularizacion" name="regularizacion" value="">
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
@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Asistencias de {{$student->first_name}} {{$student->last_name}}
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
     
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
        </div>
    </div>    
</div>
    
@endsection
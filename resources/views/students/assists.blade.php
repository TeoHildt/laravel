@extends('students.layouts')

@section('content')

@php

function calcularStudent($total, $asistencias, $prom, $reg)
{
    
    $porcentaje = ($asistencias / $total) * 100;

    
    if ($porcentaje >= $prom) {
        $condition = "Promocionado";
    } elseif ($porcentaje >= $reg) {
        $condition = "Regular";
    } else {
        $condition = "Libre";
    }

    return $condition;
}



@endphp


<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Condición de {{$student->first_name}} {{$student->last_name}}
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
                <div class="float-end">
                    <a href="{{ route('students.exportPDF', $student->id) }}" class="btn btn-primary btn-sm">&larr; Descargar</a>
                </div>
            </div>
            <br>
            <br>
            
            @php
            $cantidad =  $student->assists->count();
            $porcentaje = $cantidad*100;
            $porcentaje = $porcentaje / $parametro->total_clases;
            $condicion = calcularStudent($parametro->total_clases, $cantidad, $parametro->promocion, $parametro->regularizacion)
            @endphp
            
            <div class="card-body">
            Días de clase: {{$parametro->total_clases}} <br>
            Porcentaje de asistencia: {{$porcentaje}}%<br>

                

            Condición: {{$condicion}}<br>
            
            <br>

            Asistencias: {{ $student->assists->count() }}
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
@extends('students.layouts')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Assist Information
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                @foreach ($student as $item)
                    <fieldset>
                        <div>{{ $item->assists }}</div>
                    </fieldset>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection
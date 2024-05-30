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
            <div class="card-header">Log List</div>

            <div class="float-end">
                <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
            </div>

            <div class="card-body">                
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acción</th>
                        <th scope="col">IP</th>
                        <th scope="col">Navegador</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $log->user_id }}</td>
                            <td>{{ $log->created_at }}</td>
                            <td>{{ $log->action }}</td>
                            <td>{{ $log->ip }}</td>
                            <td>{{ $log->browser }}</td>
                            
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Log Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  

            </div>
        </div>
    </div>    
</div>
    
@endsection
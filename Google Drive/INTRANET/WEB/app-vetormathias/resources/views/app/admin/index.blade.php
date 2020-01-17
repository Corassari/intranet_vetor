@extends('layouts.admin')
@section('content')
@include('layouts.headers.admin')
<div class="container">
    <div class="container-fluid mt--8">
        <div class="card">
            <div class="card-header">
                <h4>Configurador</h4>
            </div>
            <div class="card-body">
                
            <a href="{{ route('admin.user')}}">Usuários</a>
            </div>
        </div>
    </div>
</div>
@endsection
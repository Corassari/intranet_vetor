@extends('layouts.admin')
@section('content')
@include('layouts.headers.admin')
<div class="">
    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col-md-2">
                <div class="card bg-secondary">
                    <div class="card-header bg-transparent py-3">
                        <h4 class="text-center"><i class="fa fa-cogs"></i></h4>
                    </div>
                    <!-- List group -->
                    <a class="btn btn-md btn-outline btn-block" href="{{ route('admin.user.create') }}">NOVO</a> 
                </div>
            </div>

            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div id="userList"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
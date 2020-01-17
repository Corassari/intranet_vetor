@extends('layouts.home')
@section('content')
<div class="container container-fluid">
    <div class="p-3">
        <div class="row">
            <div class="col-md-6 p-2">
                <h4>Ambientes</h4>
                @isset($environment)
                    @foreach ($environment as $env)
                    <a href="{{ route(strtolower(trim($env->ENV_ROUTE_NAME)))}}" class="btn btn-facebook btn-icon my-2">
                        <span class="btn-inner--text">{{ $env->ENV_TITLE }}</span>
                        </a>
                    @endforeach          
                @endif        
            </div>
            <!-- <div class="col-md-4">
                <div class="card card-stats">
            
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                <span class="h2 font-weight-bold mb-0">350,897</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>




            </div>

            <div class="col-md-4">

                <div class="card card-stats">
                  
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total traffic</h5>
                                <span class="h2 font-weight-bold mb-0">350,897</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                    <i class="ni ni-active-40"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>
@endsection
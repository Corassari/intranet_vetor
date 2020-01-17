@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 mt-3">
            <a href="{{ route('fw-sup-order-winery') }}" class="btn btn-primary btn-block">
                FOLLOW-UP
            </a>
            <a href="{{ route('fw-sup-order-winery','all=true') }}" class="btn btn-primary btn-block">
                PROCESSADOS
            </a>
            <form action="{{route('fw-sup-order-winery-store')}}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-warning btn-block mt-2">
                    IMPORTAR
                </button>
            </form>
        </div>
        <div class="col-md-10">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3">
                <span class="alert-icon"><i class="fa fa-check-circle"></i></span>
                <strong>OK! </strong>{{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show  mt-3">
                <span class="alert-icon"><i class="fa fa-exclamation-triangle"></i></span>
               <strong>OPS! </strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
            </div>
            @endif
            <div class="card mt-3">
                <div class="card-body px-1">
                    @if(count($dados)==0)
                    <p class="text-center"><i class="fa fa-times-circle"></i> NENHUM PEDIDO PENDENTE</p>
                    @else
                    <!-- List group -->
                    <ul class="list-group list-group-flush list my--3">

                        @foreach ($dados as $infos)
                        <form action="{{ route("fw-sup-order-winery-setorder",$infos->OD_ID)}}" method="POST">
                            {{ csrf_field() }}
                            <li class="list-group-item px-0 py-1">
                                <div class="row align-items-center">
                                    <div class="col-md-2 text-center">
                                        <!-- Avatar -->
                                        <a href="#" class="h5 text-primary">
                                            <strong>{{ $infos->OD_NUM }}</strong><br>
                                            <small class="text-muted">PESAGEM{{ $infos->OD_NPESAGEM }}</small>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="mb-0">
                                            <a href="#!">{{ $infos->OD_PROD_NOME }}</a><br>
                                            <small class="font-italic">
                                                {{ $infos->OD_PROD_LOGRA }},
                                                {{ $infos->OD_PROD_NRO }} -
                                                {{ $infos->OD_PROD_BAIRRO }}
                                            </small>
                                        </h5>
                                    </div>
                                    <div class="col-md-3 alert alert-secondary m-0 px-3 py-2">
                                        <h5 class="mb-0">{{ $infos->OD_PRODUTO }}: <small>{{ $infos->OD_DESC }}</small>
                                        </h5>
                                        <small>Unitário R$ {{ number_format($infos->OD_VALUNIT,2,',','.') }}</small>
                                    </div>
                                    <div class="col-md-2">
                                        <ul class="list-unstyled" style="font-size:10px">
                                            <li><strong>P. Bruto: </strong>{{ $infos->OD_PBRUTO }}</li>
                                            <li><strong>P. Tara: </strong>{{ $infos->OD_PTARA }}</li>
                                            <li><strong>P. Líquido: </strong>{{ $infos->OD_PLIQUID }}</li>
                                        </ul>
                                    </div>

                                    <div class="col-md-2">
                                        @if(request()->get('all'))
                                        <small>PEDIDO</small>
                                        <h3>{{ $infos->OD_PEDIDO }}</h3>
                                        @else
                                        <button type="submit" class="btn btn-sm btn-success"><i
                                                class="fa fa-check-circle"></i></button>
                                        @endif
                                    </div>
                            </li>
                        </form>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
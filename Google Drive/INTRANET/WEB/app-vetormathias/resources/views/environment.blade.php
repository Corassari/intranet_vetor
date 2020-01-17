@extends('layouts.app')
@section('content')
<div class="container-fluid">
    @if(isset($env_category))

        <div class="row">
            <div class="col-md-12">
                @if(count($env_category) >0 )            
                    @foreach ($env_category as $e_category)
                        <!-- Title -->
                        <div class="jumbotron p-2">
                        <p class="mb-3 pl-1 ">{{ $e_category->ENV_ITEM_CATEGORY }}</p>
                        @if(isset($env_menu))
                            @foreach ($env_menu as $e_menu)
                                @if($e_menu->ENV_ITEM_CATEGORY == $e_category->ENV_ITEM_CATEGORY )
                                <a class="btn btn-neutral btn-sm m-1"
                                    href="{{ Route::has(strtolower($e_menu->ENV_ITEM_ROUTE)) ?  route(strtolower($e_menu->ENV_ITEM_ROUTE)) : '#'}}">{{ $e_menu->ENV_ITEM_DESC }}</a>
                                @endif
                            @endforeach  
                        </div>                
                        @else
                            <p class="text-center p-7">Nenhum menu para a sessão</p>
                        @endif
                    @endforeach
                @else
                    <p class="text-center p-7">Nenhum menu para o APP</p>
                @endif
            </div><!-- end.col-md-12 -->
               
    @else
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 mt-5">
                <small class="text-uppercase font-weight-bold">Suprimentos</small>
            </div>

            <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab"
                        href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Solicitação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2"
                        role="tab" aria-controls="tabs-text-2" aria-selected="false">Pedido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3"
                        role="tab" aria-controls="tabs-text-3" aria-selected="false">Nota
                        Fiscal</a>
                </li>
            </ul>
        </div><!-- end.col-md -->
        <div class="col-md-6">
            <div class="mb-3 mt-5">
                <small class="text-uppercase font-weight-bold">Financeiro</small>
            </div>
            <button class="btn btn-1 btn-outline-default" type="button">Contas a Pagar</button>
        </div><!-- end.col-md -->
    </div><!-- end.row -->

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 mt-5">
                <small class="text-uppercase font-weight-bold">Recursos Humanos</small>
            </div>

            <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab"
                        href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Solicitação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2"
                        role="tab" aria-controls="tabs-text-2" aria-selected="false">Pedido</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3"
                        role="tab" aria-controls="tabs-text-3" aria-selected="false">Nota
                        Fiscal</a>
                </li>
            </ul>
        </div><!-- end.col-md -->
        <div class="col-md-6">
            <div class="mb-3 mt-5">
                <small class="text-uppercase font-weight-bold">Cadastro</small>
            </div>
            <ul class="nav nav-pills nav-fill flex-column flex-sm-row" id="tabs-text" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab"
                        href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2"
                        role="tab" aria-controls="tabs-text-2" aria-selected="false">Fornecedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2"
                        role="tab" aria-controls="tabs-text-2" aria-selected="false">Centro
                        de Custo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2"
                        role="tab" aria-controls="tabs-text-2" aria-selected="false">Aprovadores</a>
                </li>
            </ul>
        </div><!-- end.col-md -->
    </div><!-- end.row -->
    @endif

</div><!-- end.container -->
@endsection
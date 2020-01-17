@extends('app.prestcontas.app')
@section('name_app','PrestContas')
@section('content')
    @include('layouts.headers.prestcontas')
    
     <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-lg-6">
            <div class="card bg-gradient-primary">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col">
                                <img src="https://argon-dashboard-pro-laravel.herokuapp.com/argon/img/icons/cards/mastercard.png" alt="Image placeholder">
                            </div>
                            <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <small class="text-white font-weight-bold mr-3">Make default</small>
                                    <div>
                                        <label class="custom-toggle  custom-toggle-white">
                                <input type="checkbox" checked="">
                                <span class="custom-toggle-slider rounded-circle" data-label-off="No" data-label-on="Yes"></span>
                                </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <form role="form" class="form-primary">
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Name on card" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-credit-card"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Card number" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="MM/YY" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="CCV" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-block btn-info">Save new card</button>
                            </form>
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Histórico</h3>
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                            <div class="timeline-block">
                                <span class="timeline-step badge-success">
                            <i class="fa fa-check"></i>
                            </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">#000001 - Felipe Lima</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i class="fas fa-clock mr-1"></i>Aprovado em 10/08/2019</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">Viagem para São Paulo para assuntos comer....</h6>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <span class="timeline-step badge-warning">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">#000002 - Felipe Lima</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i class="fas fa-clock mr-1"></i>Em Andamento</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">Viagem para São Paulo para assuntos comer....</h6>
                                </div>
                            </div>
                            <div class="timeline-block">
                                <span class="timeline-step badge-success">
                                    <i class="fa fa-check"></i>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">#000003 - João Vitor</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i class="fas fa-clock mr-1"></i>Aprovado HOJE</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">Viagem para São Paulo para assuntos comer....</h6>
                                </div>
                            </div>

                            <div class="timeline-block">
                                <span class="timeline-step badge-success">
                                    <i class="fa fa-check"></i>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">#000005 - João Vitor</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i class="fas fa-clock mr-1"></i>Aprovado HOJE</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">Viagem para São Paulo para assuntos comer....</h6>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->          





        
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
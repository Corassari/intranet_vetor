@extends('layouts.admin')
@section('content')
@include('layouts.headers.admin')
<!-- Page content -->
<div class="container">



    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-4 order-xl-2">

                <div class="card card-profile">
                    <img src="{{ asset('argon')}}/img/theme/bg-header-home.jpg" alt="Image placeholder"
                        class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon')}}/img/avatar/avatar.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <!--<a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>-->
                        </div>
                    </div>
                    <div class="card-body pt-4">
                        <div class="text-center">
                            <h5 class="h3">
                                {{trim($dados->USR_NAME)}}<span class="font-weight-light">, 27</span>
                            </h5>
                            <!--
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>
                            </div>-->
                        </div>
                    </div>
                </div>
                <!-- Progress track -->
            </div>
            <div class="col-xl-8 order-xl-1">
                @if (session('success'))
                <div class="alert alert-success mt--6 alert-dismissible fade show">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text">{{ session('success') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <form action="{{route('admin.user.update',$dados->USR_ID )}}" method="POST">
                        <div class="card-body">

                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <h6 class="heading-small text-muted mb-4">Alterar Usuário</h6>
                            @include('app.admin.user._form')



                            <div class="row justify-content-center">
                                <div class="col jumbotron p-4">
                                    <div class="d-flex ">
                                        <small class="font-weight-bold mr-3 text-muted">ATIVO</small>
                                        <div>
                                            <label class="custom-toggle">
                                                <input type="checkbox" {{ $dados->USR_STATUS == 'L'? 'checked':'' }}
                                                    name="USR_STATUS">
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="NÃO"
                                                    data-label-on="SIM"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-light" type="reset">Limpar</button>
                            <button class="btn btn-primary" type="submit">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>
</div>
</div><!--  end.container-->

@endsection
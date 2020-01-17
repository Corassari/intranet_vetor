@extends('layouts.admin')
@section('content')
@include('layouts.headers.admin')
<!-- Page content -->
<div class="container">
    <div class="container-fluid mt--6">
        <div class="row justify-content-center">

            <div class="col-xl-8">
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
                    <div class="card-body">


                        <form action="{{route('admin.user.store')}}" method="POST">
                            {{ csrf_field() }}
                            <h6 class="heading-small text-muted mb-4"><i class="fa fa-plus-circle"></i> Adicionar
                                Usuário</h6>
                            @include('app.admin.user._form')
                            <div class="text-right">
                                <button class="btn btn-light" type="reset">Limpar</button>
                                <button class="btn btn-primary" type="submit">Novo</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>
</div>
</div><!--  end.container-->

@endsection
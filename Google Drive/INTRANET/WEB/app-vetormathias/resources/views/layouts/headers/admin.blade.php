<div class="header bg-img-admin  pb-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Configurador</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>                  
                  <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
            <a href="{{ route('admin')}}" class="btn btn-sm btn-neutral"> <i class="fa fa-cog"></i> Configurador</a>
            <a href="{{ route('home') }}" class="btn btn-sm btn-neutral">Home</a>
            <a href="{{ route('auth.logout') }}" class="btn btn-sm btn-light">Sair</a>
            </div>
          </div>       
          
        </div>
      </div>
    </div>
</div>

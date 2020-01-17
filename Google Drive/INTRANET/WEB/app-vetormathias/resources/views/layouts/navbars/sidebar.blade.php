<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
  <div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('argon')}}/img/brand/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
          <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar-inner">
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true"
              aria-controls="navbar-dashboards">
              <i class="ni ni-shop text-primary"></i>
              <span class="nav-link-text">Ambientes</span>
            </a>
            <div class="collapse" id="navbar-dashboards" style="">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="{{ route('env.sup')}}" class="nav-link">Suprimentos</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('env.fin') }}" class="nav-link">Financeiro</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('env.rh') }}" class="nav-link">Recursos Humanos</a>
                </li>
              </ul>
            </div>
          </li>

          {{-- Loop para Menu do [Ambiente] --}}
          @if(isset($env_category))
          {{-- Listar categorias [Ambiente] --}}
           @if(count($env_category)>0)
            @foreach ($env_category as $e_category)
            <li class="nav-item">
            <a class="nav-link" href="#navbar-env-{{ strtolower($e_category->ENV_ITEM_CATEGORY)}}" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
              <i class="ni ni-archive-2 text-green" aria-hidden="true"></i>
              <span class="nav-link-text">{{ $e_category->ENV_ITEM_CATEGORY }}</span>
              </a>
               @if(isset($env_menu))
                 {{-- Listar itens categorias [Ambiente] --}}
                 @if(count($env_menu)>0)
                   @foreach($env_menu as $e_menu)
                    @if($e_menu->ENV_ITEM_CATEGORY == $e_category->ENV_ITEM_CATEGORY )
                        <div class="collapse" id="navbar-env-{{ strtolower($e_category->ENV_ITEM_CATEGORY)}}" style="">
                          <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a href="{{ Route::has(strtolower($e_menu->ENV_ITEM_ROUTE)) ?  route(strtolower($e_menu->ENV_ITEM_ROUTE)) : '#'}}" class="nav-link">{{ $e_menu->ENV_ITEM_DESC }}</a>
                            </li>
                          </ul>
                        </div>
                      @endif
                   @endforeach
                 @endif
               @endif 
              </li><!-- end.li -->   
            @endforeach             
           @endif
         @endif
        </ul>
      </div>
    </div>
  </div>
</nav>
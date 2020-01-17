<?php

namespace Intranet\Http\Middleware\App;
use Illuminate\Support\Facades\Route;
use Intranet\App\Admin\Environment;

use Closure;

class CheckEnvironment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        /*--------------------------------
        remover prefixo do URI
        por padrao vem "/prefixo"
        ---------------------------------*/
        $route = Route::current()->uri;
        
        #environment
        $environment = new Environment();
        $environment->setRoute($route);
     
        #inf Envoronment
        $env_main = $environment->validEnvAccess();
        

        if(!$env_main){
            return redirect()->route('http.response',['cod'=>'401']);
        }

        return $next($request);
    }
}

<?php

namespace Intranet\Http\Middleware\App;

use Closure;

class CheckLogin
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
        
        //dd($request);
        #verificando se a sessao existe
        if($request->session()->has('USER_ID') && $request->session()->has('USER_NAME')){
            
            #verificando se a sessao nao esta vazia
            if(empty($request->session()->get('USER_ID'))){
                return redirect()->route('auth.login');
            }else{
               //return  redirect('/');
            }          

        }else{
          return redirect()->route('auth.login');
        }
        return $next($request);
    }
}

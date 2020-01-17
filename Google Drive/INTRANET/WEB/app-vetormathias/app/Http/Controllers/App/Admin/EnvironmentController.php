<?php

namespace Intranet\Http\Controllers\App\Admin;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Intranet\App\Admin\Environment;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $prefix = Route::current()->action['prefix'];
        /*--------------------------------
        remover prefixo do URI
        por padrao vem "/prefixo"
        ---------------------------------*/
        $route = Route::current()->uri;
        
        #environment
        $environment = new Environment();
        $environment->setRoute($route);
        //$environment->setPrefix($prefix);

        #inf Envoronment
        $env_main     = $environment->getDataEnvironment();
        $env_menu     = $environment->listMenu();
        $env_category = $environment->listCategory();

        return view('environment',compact('env_main','env_category','env_menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

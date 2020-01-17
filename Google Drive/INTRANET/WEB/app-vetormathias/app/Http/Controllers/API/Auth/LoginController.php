<?php

namespace Intranet\Http\Controllers\API\Auth;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\App\Auth\Login;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {        
        

        
        #-------------------------------------------------------------------------------
        #DADOS RECEBIDOS
        #-------------------------------------------------------------------------------
        $mail = trim(strtolower($request->login));
        $pass = md5(trim($request->pass)); 

        #-------------------------------------------------------------------------------
        #VALIDAR LOGIN
        #-------------------------------------------------------------------------------  
        $appLogin = new Login();
        $appLogin->cMail = $mail;
        $appLogin->cPass = $pass;

        
        if($appLogin->valid()){
            //criar sessoes
            //$request->session()->put('USER_ID',123);
            //$request->session()->put('USER_MAIL','Felipe Corassari');

            $arr['result'] = true;
            $arr['msg'] = 'Login realizado com sucesso';
        }else{
            //enviar mensagem de erro
            $arr['result'] = false;
            $arr['msg'] = 'Dados inválidos, verifique Login e Senha';
        }    

        return response()->json($arr);              

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

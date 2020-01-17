<?php

namespace Intranet\Http\Controllers\App\Auth;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\App\Auth\Login;
use Intranet\App\Admin\User;

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
        $mail = trim(strtoupper($request->mail));
        $pass = md5(trim($request->pass)); 

        #-------------------------------------------------------------------------------
        #VALIDAR LOGIN
        #-------------------------------------------------------------------------------  
        $appLogin = new Login();
        $appLogin->_mail = $mail;
        $appLogin->_pass = $pass;
        
      
       // dd($appLogin->valid());
        if($appLogin->valid()){
            #search user          
            $data = $appLogin->getData();

            //echo 'valido';
          
            #make sessions
            $request->session()->put('USER_ID',$data->USR_ID);
            $request->session()->put('USER_NAME',$data->USR_NAME);
            $request->session()->put('USER_ADMIN',$data->USR_ADMIN);
            $request->session()->put('USER_MAIL',$data->USR_MAIL);

            $arr['result'] = true;
            $arr['msg'] = 'Login realizado com sucesso';
        }else{
            #send error message
            $arr['result'] = false;
            $arr['msg'] = 'Dados inválidos, verifique as informações de Login e Senha';
        }    

        return response()->json($arr);              

    }

    public function logout(Request $request){

        $request->session()->flush();
        return redirect()->route('auth.login');

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

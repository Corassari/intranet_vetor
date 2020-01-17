<?php

namespace Intranet\App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    
    protected $table = 'SYS_USERS';
    protected $connection = 'sql_intranet';
    protected $primaryKey = 'USR_ID';
    public $timestamps = false;

    /**
     * Funcao para realizar os Filtros para Banco de dados
     *
     * @param [array] $request
     * @return void
     * @author Felipe Corassari
     * @since 16/12/2019
     */
    public function setFilter($request){

    }

    /**
     * Function list from Data Base
     * @return [array] $dados
     */

    public function listUser(){
        $dados = User::where([
            ['D_E_L','']
        ])->get();

        return $dados;
    }

    public function alterUser($request,$id){
        
        $user = User::find($id);
        $user->USR_NAME = strtoupper($request->USR_NAME);
        $user->USR_MAIL = strtoupper($request->USR_MAIL);
        $user->USR_LOGIN = strtoupper($request->USR_LOGIN);
        $user->USR_PASS = strlen($request->USR_PASS)==32 ?$request->USR_PASS : md5($request->USR_PASS);
        $user->USR_STATUS = ($request->USR_STATUS =='on'? 'L':'B');
        $user->save();

        return $user;
    }
    public function addUser($request){
        
        $user = new User();
            
        $user->USR_NAME = strtoupper($request->USR_NAME);
        $user->USR_MAIL = strtoupper($request->USR_MAIL);
        $user->USR_LOGIN = strtoupper($request->USR_LOGIN);
        $user->USR_PASS = md5($request->USR_PASS);
        $user->save();

        return $user;
    }

}

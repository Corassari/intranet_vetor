<?php

namespace Intranet\App\Auth;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    public $_mail;
    public $_pass;

    protected $table = 'SYS_USERS';
    protected $connection = 'sql_intranet';

    /**
     * Funcao para validar Login 
     *
     * @return void
     */
    public function valid(){
       return  Login::where([
            ['D_E_L',''],
            ['USR_PASS',$this->_pass],
            ['USR_MAIL',$this->_mail]
        ])->exists();

        //return $res;
               
    }

    /**
     * Function for capture login information
     *
     * @param [string] $_mail
     * @param [string] $_pass
     * @return [object] $dados;
     */
    public function getData(){
        $dados = Login::where([
            ['D_E_L',''],
            ['USR_MAIL',$this->_mail],
            ['USR_PASS',$this->_pass]
        ])->first();

        return $dados;
    }
    
}
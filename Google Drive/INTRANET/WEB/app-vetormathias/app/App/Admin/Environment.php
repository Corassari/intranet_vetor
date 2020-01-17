<?php

namespace Intranet\App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Environment extends Model
{
    public $_route;
    //public $_prefix;
    public $_category;
    public $_user;

    protected $table = 'SYS_ENV_MAIN';
    protected $connection = 'sql_intranet';

    public function __construct(){
        $this->_user = session('USER_ID');
    }

        /**
     * Function list all environemnts
     * @author Felipe Corassari
     * @since 1.0.0 - 02/01/2019
     * @return [array] $query
     */
    public function listAll(){
        $query = Environment::where([          
            ['D_E_L',''],
            ['ENV_APP_NAME','ENVIRONMENT']
        ])
        ->distinct('ENV_TITLE')
        ->get();

        return $query;        
    }

    /**
     * Function list all environemnts da rota
     * @author Felipe Corassari
     * @since 1.0.0 - 02/01/2019
     * @return [array] $query
     */
    public function listByRoute(){
        $query = Environment::where([
            ['ENV_ROUTE',$this->_route],
            ['D_E_L','']
        ])->get();

        return $query;        
    }

/**
 * Function search infos of Environment
 * @author Felipe Corassari
 * @since 1.0.0 - 02/01/2019
 * @return [object]
 */
    public function getDataEnvironment(){
        $query = Environment::where([
            ['ENV_ROUTE',$this->_route],
            ['D_E_L','']
        ])->first();

        return $query;   
    }

/**
 * Function validates if environment has lock
 * @author Felipe Corassari
 * @since 1.0.0 - 02/01/2019
 * @return void
 */
    public function validEnvAccess(){
        #validates if environment has lock
        $validBloq =  Environment::where([
            ['ENV_ROUTE',$this->_route],
            ['D_E_L',''],
            ['ENV_BLOQ','S']
        ])->first();
  

        if($validBloq){           
            $query = DB::connection($this->connection)    
            ->table('SYS_ENV_ACCESS')
            ->select('ENV_ACCESS_ID')
            ->where([ 
                ['ENV_ACCESS_IDENV',$validBloq->ENV_ID], 
                ['ENV_ACCESS_IDUSER',$this->_user],   
                ['D_E_L','']  
            ])->exists();

            return $query;              
        }else{
            return true;
        }
        

      
    }

    /**
     * Funcao para setar a variavel $uri;
     * @author Felipe Corassari
     * @since 10/12/2019
     * @param [String] $uri
     * @return void
     */

    public function setRoute($route){
        $this->_route = strtoupper($route);
    }


    /**
     * Funcao para setar a variavel $prefix
     * @author Felipe Corassari
     * @since 10/12/2019
     * @param [String] $prefix
     * @return void
     */
    public function setPrefix($prefix){
        $this->_prefix = strtoupper(str_replace('/','',$prefix));
    }

    public function listCategory(){
        $ls = DB::connection('sql_intranet')
            ->table('SYS_ENV_ITEM AS ENV_ITEM')
            ->join('SYS_ENV_MAIN AS ENV_MAIN', 'ENV_ID', '=', 'ID_ENVIRONMENT')
            ->select('ENV_ITEM_CATEGORY')
            ->where([
                ['ENV_ROUTE',$this->_route],
                ['ENV_ITEM.D_E_L',''],
                ['ENV_MAIN.D_E_L','']
            ])
            ->groupBy('ENV_ITEM_CATEGORY')
            ->get();

            return $ls;
    }


    public function listMenu(){
        $ls = DB::connection('sql_intranet')
            ->table('SYS_ENV_ITEM AS ENV_ITEM')
            ->join('SYS_ENV_MAIN AS ENV_MAIN', 'ENV_ID', '=', 'ID_ENVIRONMENT')
            ->select('ENV_ITEM_DESC', 'ENV_ITEM_URL', 'ENV_ITEM_ROUTE','ENV_ITEM_CATEGORY')
            ->where([
                ['ENV_ROUTE',$this->_route],                
                ['ENV_ITEM.D_E_L',''],
                ['ENV_MAIN.D_E_L','']
            ])->get();

            return $ls;
    }
}

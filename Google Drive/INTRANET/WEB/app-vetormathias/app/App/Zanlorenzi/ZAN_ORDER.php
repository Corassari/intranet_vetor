<?php

namespace Intranet\App\Zanlorenzi;

use Illuminate\Database\Eloquent\Model;

class ZAN_ORDER extends Model
{
    protected $table = 'app_custom.ZAN_ORDER';
    protected $primaryKey = 'OD_ID';
    protected $connection = 'sql_intranet';
    public $timestamps  = false;


    /**
     * Function list All Data from ZAN_ORDER table
     *
     * @return void
     */
    public function list(){        
        return ZAN_ORDER::where([
            ['D_E_L',''],
            ['OD_PEDIDO','']
        ])->get();
    }
    /**
     * Function list All Data from ZAN_ORDER table
     *
     * @return void
     */
    public function listAll(){        
        return ZAN_ORDER::where([
            ['D_E_L',''],
            ['OD_PEDIDO','<>','']
        ])->get();
    }

    public function checkUniqOrder ($_nota){
        if($_nota == 'null' || $_nota == null){
            return false;
        }else{
            return ZAN_ORDER::where('OD_NUM',$_nota)->exists();
        }
        
    }

    public static function newLote(){
        return str_pad((ZAN_ORDER::max('OD_LOTE')+1),6,'0',STR_PAD_LEFT);
    }
}

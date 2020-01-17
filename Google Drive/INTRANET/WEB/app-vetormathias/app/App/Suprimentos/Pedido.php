<?php

/**
 * TABELAS DO PROGRAMA
 * SC7 - PEDIDOS DE COMPRAS
 * SC1 - SOLICITACAO DE COMPRAS
 * CTT - CENTRO DE CUSTO
 * SA2 - FORNECEDORES
 * 
 */


namespace Intranet\App\Suprimentos;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $table = 'SC7'; //tabela principal
    protected $empresa = '010';  //grupo de tabelas do sistema 
    protected $filial = '';  
    protected $connection = 'sql_vetor';
    public $filters;

    #Colunas visiveis (ELOQUENTE)
    protected $visible = [
                        'C7_NUM'
                        ,'C7_EMISSAO'
                        ,'C7_APROV'
                        ,'C7_FORNECE'
                        ,'C7_LOJA'  
                    ];
             

    /**
     * Definir nome da tabela principal (default: SC7010)
     *
     * @param [String] $cTable
     * @return void
     */
    public function setEmpresa($cEmpresa){
        $this->empresa = $cEmpresa;
        //atualizar nomes das tabelas.
        $this->set_tables();

        //dd($this->empresa);
    }

    public function setFilters($request){
        $arrfilters = array();
        $arrfilters[]= $request->APROVADOR? ['C7_APROV',$request->APROVADOR]:'';
        $arrfilters[]= $request->TESTE? ['C7_APROV',$request->TESTE]:'';


        $this->filters=array();
        foreach($arrfilters as $filt){
            //dd($filt);
            if(!empty($filt)){
                array_push($this->filters,$filt);
            }
        }

        dd($this->filters);
    }

    /**
     * Funcao para atualizar os nomes das tabelas de acordo com cada empresa
     * @author Felipe Corassari
     * @return void
     */
    private function set_tables(){
        $this->table = 'SC7'.$this->empresa;
    }
    
                    
    /**
     * Funcao para listar pedidos de compras
     * @since 08/11/2019
     * @author Felipe Corassari de Lima
     * @version 1.0.0
     * @return array 
     */
    public function listPedido(){
        //dd($this->filters[0]);
        return DB::table('SC7'.$this->empresa.' AS SC7')
            ->join('SA2010 AS SA2',[
                ['A2_COD',  '=', 'C7_FORNECE'],
                ['A2_LOJA', '=' , 'C7_LOJA']
            ] ) 
            /*->join('CTT010 AS CTT',[
                ['CTT_CUSTO','C7_CC']
            ])     */      
            ->select('C7_NUM'            
            ,'A2_NREDUZ'
            ,'A2_NOME'
            ,'C7_APROV'
            ,'C7_COND'
            ,'A2_CGC'
            //,'CTT_CUSTO'
            //,'CTT_DESC01'
            ,'A2_COD'
            ,'C7_EMISSAO'
            ,'A2_LOJA')
            ->where([
                ['C7_RESIDUO',''],
                ['C7_ENCER',''],
                ['SC7.D_E_L_E_T_',''],
                ['SA2.D_E_L_E_T_',''],
                //['CTT.D_E_L_E_T_',''],
                ['C7_CONAPRO','B'],
               $this->filters
            ])
            ->distinct('C7_NUM')
            ->get();
    }

    /**
     * Funcao - Listar Solicitação de compra do Pedido de Compra
     * @author Felipe Corassari
     * @since 08/11/2019
     * @version 1.0.0
     * @param String $nPedido
     * @return array
     */

     public function listSC($nPedido){
         return Pedido::where([
            ['C7_NUM','=',$nPedido],
            ['C7_ENCER','=',''],
            ['C7_RESIDUO','=',''],
            ['D_E_L_E_T_','=','']
         ]);
     }

    /**
     * Função - get Total do Pedido de compra
     * @author Felipe Corassari
     * @since 12/11/2019
     * @version 1.0.0
     * @param [String] $nPedido
     * @return float
     */
     public function getTotalPedido($nPedido){
        return Pedido::where([
            ['C7_NUM','=',$nPedido],
            ['C7_ENCER','=',''],
            ['C7_RESIDUO','=',''],
            ['D_E_L_E_T_','=','']
        ])->sum('C7_TOTAL');
     }

     /**
      * Função - get Informações do PEDIDO DE COMPRA
      *
      * @param [String] $nPedido
      * @return void
      */
     public function getPedido($nPedido){
        return Pedido::where([
            ['C7_NUM','=',$nPedido],
            ['C7_ENCER','=',''],
            ['C7_RESIDUO','=',''],
            ['D_E_L_E_T_','=','']
        ])->get();
     }
    
}

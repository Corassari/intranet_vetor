<?php

namespace Intranet\Http\Controllers\API\Suprimentos;


use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\APP\Suprimentos\Pedido;

class PedidoController extends Controller
{

    private $usrProtheus;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    
    public function index(Request $request)
    {  
    #PEDIDO DE COMPRA
    $ped = new Pedido(); 
    
    //dd();
    
    #ITENS DO PEDIDO
    $arr = array();

    //dd($request->EMPRESA);
    $ped->setEmpresa($request->EMPRESA);
    $ped->setFilters($request);
 
    $listPedido = $ped->listPedido();
        //dd($listPedido);
    if(count($listPedido)<=0){
        $arr['result'] = false;
        $arr['message'] = 'Nenhum dado encontrado';
    }else{
        $arr['RESULT'] = true;
  
        $cont = 0;
        foreach($listPedido as $ls){

            #TOTAL DO PEDIDO DE COMPRA
            $nTotalPedido = $ped->getTotalPedido(trim($ls->C7_NUM));

            #OBSERVACAO DO PEDIDO    
            $cObsPedido = $ped->getPedido(trim($ls->C7_NUM))[0]->C7_OBSM;
            
            #FORNECEDOR
            $arr['DATA'][$cont]['FORNECEDOR']['DESCRICAO']= trim($ls->A2_NREDUZ);
            $arr['DATA'][$cont]['FORNECEDOR']['RAZAO']= trim($ls->A2_NOME);
            $arr['DATA'][$cont]['FORNECEDOR']['CNPJ'] = trim($ls->A2_CGC);
            $arr['DATA'][$cont]['FORNECEDOR']['CODIGO'] = trim($ls->A2_COD);
            $arr['DATA'][$cont]['FORNECEDOR']['LOJA'] = trim($ls->A2_LOJA);

            #PEDIDO
            $arr['DATA'][$cont]['PEDIDO']['NUM'] = trim($ls->C7_NUM);
            $arr['DATA'][$cont]['PEDIDO']['APROVADOR'] = trim($ls->C7_APROV);
            $arr['DATA'][$cont]['PEDIDO']['TOTAL'] = number_format($nTotalPedido,2,',','.');
            $arr['DATA'][$cont]['PEDIDO']['EMISSAO'] = trim($ls->C7_EMISSAO);
            $arr['DATA'][$cont]['PEDIDO']['CONDICAO'] = trim($ls->C7_COND);
            $arr['DATA'][$cont]['PEDIDO']['OBS'] = trim(utf8_encode($cObsPedido));

            #CC
            //$arr['DATA'][$cont]['CC']['COD'] = trim($ls->CTT_CUSTO);
            //$arr['DATA'][$cont]['CC']['DESCRICAO'] = trim($ls->CTT_DESC01);

            #SOLICITACAO
            //$arr['DATA'][$cont]['CC']['DESCRICAO'] = '023456';       
            
            #contador
            $cont++;
            
        }
    }

    //return json_encode($arr);

    return response()->json($arr);
       
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
     * @param  \Intranet\APP\Suprimentos\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Intranet\APP\Suprimentos\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Intranet\APP\Suprimentos\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}

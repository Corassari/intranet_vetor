<?php

namespace Intranet\Http\Controllers\App\Zanlorenzi;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;
use Intranet\App\Zanlorenzi\ZAN_ORDER;

class OrderWineryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order = new ZAN_ORDER;
        
        //view inicial

        if($request->all){
            #retornar todos itens com pedido
            $dados = $order->listAll();
            return view('app.follow-up.supplies.order-winery',compact('dados'));
        }else{

            #retornar somente para aprovacao
            $dados = $order->list();
            return view('app.follow-up.supplies.order-winery',compact('dados'));
        }
        

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

     
        
        $url = 'http://45.228.20.171:9000/api/pesagens?dataInicial=2020-01-01&dataFinal=2020-01-30';
        //$aDados = ['dataInicial' => '2020-01-01', 'dataFinal' => '2020-01-15'];
        
        $username = 'milani';
        $password = 'gaucha202';

        //$sHttpBuildQuery = http_build_query($aDados);

        //  Initiate curl
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,trim($url));
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $sHttpBuildQuery );
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password" );
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC );
        
        // Execute
        $result  =curl_exec($ch);
        //echo phpinfo();

        //exit();
        $resInfo = curl_getinfo($ch);
        // Closing
        curl_close($ch);
        //dd($result);

        $_oDados = json_decode($result);
        $_nLote = ZAN_ORDER::newLote();
        
        if($resInfo['http_code']=='0'){
           dd('recurso indisponivel');
        }else{
            foreach($_oDados->order as $infos){
                $order = new ZAN_ORDER;
                $_nota = str_pad($infos->notaProdutor,9,'0',STR_PAD_LEFT);
                if(!$order->checkUniqOrder($_nota)){
    
                    //DADOS PEDIDO/NF
                    $order->OD_LOTE = $_nLote;
                    $order->OD_NUM = $_nota;
                    $order->OD_EMISSAO = $infos->dataHoraPesagem;
                    $order->OD_SERIE = strlen($infos->serieNotaProdutor)==0 ? ' ':$infos->serieNotaProdutor;
                    $order->OD_CHAVE = $infos->chaveAcessoNfeProdutor? $infos->chaveAcessoNfeProdutor : '0';
                    $order->OD_PROD_COD = $infos->cadastroViticola;
                    $order->OD_NPESAGEM = $infos->numeroPesagem;
                    $order->OD_SITPESAGEM = strtoupper($infos->situacaoPesagem);
    
                    //DADOS PORNECEDOR
                    $order->OD_PROD_CGC= $infos->produtor->cnpjCpfProdutor;
                    $order->OD_PROD_IE= $infos->produtor->inscricaoEstadualProdutor;
                    $order->OD_PROD_NOME= strtoupper($infos->produtor->nomeProdutor);
                    $order->OD_PROD_CEP= $infos->produtor->cepProdutor;
                    $order->OD_PROD_BAIRRO= strtoupper($infos->produtor->bairroProdutor);
                    $order->OD_PROD_NRO= $infos->produtor->numeroEnderecoProdutor;
                    $order->OD_PROD_LOGRA= strtoupper($infos->produtor->logradouroProdutor);
                    $order->OD_PROD_CODIBGE= $infos->produtor->ibgeCidadeProdutor;
    
                    //PRODUTO
                    $order->OD_PBRUTO = $infos->produto->pesoBruto;
                    $order->OD_PTARA = $infos->produto->pesoTara;
                    $order->OD_PLIQUID = $infos->produto->pesoLiquido;
                    $order->OD_PRODUTO = $infos->produto->codigoProduto;
                    $order->OD_DESC = strtoupper($infos->produto->descricaoProduto);
                    $order->OD_VALUNIT = $infos->produto->valorUnitario;
                    $order->save();
                }
            }
        }        
        return redirect()->route('fw-sup-order-winery');        

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

    public function setOrderProtheus(Request $request){


        //validar fornecedor



        $order = new ZAN_ORDER;
        $data = $order::find($request->id);
        //dd($data);

        //HEADER
        $infos['CNPJ'] = $data->OD_PROD_CGC;
        $infos['CONTATO'] = $data->OD_PROD_NOME;
        $infos['CONDICAO'] = '001';
        //ITENS
        $infos['ITENS'][0]['PRODUTO'] = '000001';
        $infos['ITENS'][0]['TES'] = '001';
        $infos['ITENS'][0]['CCUSTO'] = '001';
        $infos['ITENS'][0]['APROVADOR'] = '000001';
        $infos['ITENS'][0]['QUANTIDADE'] = (float)$data->OD_PLIQUID;
        $infos['ITENS'][0]['PRECO'] = (float)$data->OD_VALUNIT;

        $json = json_encode($infos);
        
        /*-------------------------------------------------------------
        modelo
                {
                    "CNPJ":"06794161966",
                    "CONTATO":"FELIPE LIMA",
                    "CONDICAO":"001",
                    "ITENS":[
                        {
                            "PRODUTO":"000001",
                            "TES":"001",
                            "CCUSTO":"001",
                            "APROVADOR":"000001",
                            "QUANTIDADE":1.2,
                            "PRECO":152.53
                        }
                    
                    ]
                }
        -------------------------------------------------------------*/

        $url = 'http://localhost:1072/rest/INTRA_MATA120_A';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(        
            'Content-Type: application/json',        
            'Content-Length: ' . strlen($json))        
        );

        
        $jsonRet = curl_exec($ch);
        $jsonInf = curl_getinfo($ch);
        $jsonErr = curl_errno($ch);

        // Check if any error occured
        if($jsonInf['http_code']<>0){              
             $ret = json_decode($jsonRet);

             if($jsonInf['http_code']==400){
                $_status = 'error';
                $_msg = $ret->errorMessage;
             }else{
                //gravar numero do pedido na NF  do produtor
                $_status = 'success';
                $_msg = $ret->msg;

                $data->OD_PEDIDO = $ret->pedido;
                $data->save();
             }
        }else{
            $_status = 'error';
            $_msg = 'WebService desabilitado: '. $url;
        }

        curl_close($ch);
       

        return redirect()->route('fw-sup-order-winery')->with($_status,$_msg);
    }
}

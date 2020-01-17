<?php

namespace Intranet\Http\Controllers\App;

use Illuminate\Http\Request;
use Intranet\Http\Controllers\Controller;

class HttpResponseController extends Controller
{
  
    private $cDesc;
    private $cMessage;
    private $nCod; //404 - 403 - 500 ...
    private $cColorClass; //danger - warning ...

    /**
     * Funcao para set o codigo do erro HTTP
     *
     * @param [int] $nCod
     * @author Felipe Corassari 
     * @since 1.0.0 - 01/01/2020
     * @return void
     */

    public function setCod($nCod){
        $this->nCod = $nCod;
    }  

    /**
     * Funcao para retornar a view de erro HTTP
     *
     * @param Request $request
     * @author Felipe Corassari 
     * @since 1.0.0 - 01/01/2020
     * @return void
     */
    public function responseView(Request $request){
       
        if(!empty($request->cod)){

            $this->nCod = $request->cod;

            switch($this->nCod){
                case '404':
                    $this->cDesc = 'Página não encontrada';
                    $this->cColorClass = 'default';
                    $this->cMessage = 'Esse erro acontece quando o endereço no navegador não existe '
                    .'ou foi de alguma maneira excluído. Entre em contato com administrador do sistema '
                    .'para mais informações.';
                break;
                case '401':
                    $this->cDesc = 'Não Autorizado';
                    $this->cColorClass = 'danger';
                    $this->cMessage = 'Essa página é de uso restrito e seu perfil não possui permissão, '
                    .' solicite ao administrador do sistema para obter acesso'; 
                break; 
                case '403':
                    $this->cDesc = 'Proibido';
                    $this->cColorClass = 'danger';
                    $this->cMessage = 'Essa página é de acesso exclusivo aos '
                    .'desenvolvedores e administradores do sistema'; 
                break;  
                
                default:              
                    $this->cDesc = 'Codigo de Erro desconhecido';
                    $this->cColorClass = 'info';
                    $this->cMessage = 'O código do erro não foi encontrado em nossa base de dados '
                    .'Entre em contato com o administrador do sistema';                   
                break;  
            
            }
        }else{        
            $this->nCod = '204';
            $this->cDesc = 'Nenhum conteúdo';
            $this->cColorClass = 'info';
            $this->cMessage = 'O código do erro não possui informação';
        }
        $param['cod'] = $this->nCod;
        $param['description'] = $this->cDesc;
        $param['class'] = $this->cColorClass;
        $param['message'] = $this->cMessage;

        $param = (object) $param;   
       
        return view('app.httpResponse',compact('param'));
    }
}

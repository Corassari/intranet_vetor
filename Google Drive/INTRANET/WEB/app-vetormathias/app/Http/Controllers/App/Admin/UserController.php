<?php

namespace Intranet\Http\Controllers\App\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Intranet\Http\Requests\App\Admin\UserRequest;
use Intranet\Http\Controllers\Controller;
use Intranet\App\Admin\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $request)
    {
        return view('app.admin.user.index');
    }

    /**
     * List users for method Post
     * @author Felipe Corassari
     * @since 1.0.0 - 03/01/2019
     * @return [Array] $dados
     */
    public function list(){
        $users = new User();
        $dados = $users->listUser();

        #thead
        $arr['header'][] = 'cod';
        $arr['header'][] = 'nome';
        $arr['header'][] = 'e-mail';
        $arr['header'][] = 'status';
        $arr['header'][] = 'acoes';

        foreach($dados as $i=>$user){

            #tbody
            $arr['body'][$i]['index'] = $i;
            $arr['body'][$i]['content']=[
                $user->USR_ID,
                $user->USR_NAME,
                $user->USR_MAIL,
                $user->USR_STATUS
            ];


            #actions
            $arr['action'][$i][0]['desc']='EDITAR';
            $arr['action'][$i][0]['ico']='fa fa-editar';
            $arr['action'][$i][0]['class']='fa fa-editar';
            $arr['action'][$i][0]['href']= (route('admin.user.edit').'/'.$user->USR_ID);
         
            
           /* $arr['action'][$i][1]['desc']='Remover';
            $arr['action'][$i][1]['ico']='fa fa-editar';
            $arr['action'][$i][1]['class']='fa fa-editar';

                       
            $arr['action'][$i][2]['desc']='Novo';
            $arr['action'][$i][2]['ico']='fa fa-plus';
            $arr['action'][$i][2]['class']='fa fa-editar';*/
            
/*
            $arr['body'][$i]['actions'][$i]['desc']= 'Remover';
            $arr['body'][$i]['actions'][$i]['ico']= 'fa fa-times';
            $arr['body'][$i]['actions'][$i]['index']= $i;*/
        };
        return response()->json($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $update = new User();
        try{
            $update->addUser($request);  
            return redirect()->back()->withSuccess('Usuario criado com sucesso');   
        }catch(Exception $e){
            report($e);
        }
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
        $dados = User::find($id);     

        return view('app.admin.user.edit',compact('dados'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        
        $update = new User();
        try{
            $dados = $update->alterUser($request,$id);
            return redirect()->back()->withSuccess('Dados alterados com sucesso');  
        }catch(Exception $e){
            dd($e);
        }


      
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

<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMensagem = Mensagem::all();
        return view('mensagem.list',['mensagem' => $listaMensagem]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view ('mensagem.create');


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
      

         $messages = array(
            'titulo.required' => 'É obrigatório um título para a atividade',
            'texto.required' => 'É obrigatória uma descrição para a atividade',
            'autor.required' => 'É obrigatório o cadastro do autor',
        );
        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('mensagens/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_mensagem = new Mensagem();
        $obj_mensagem->titulo =       $request['titulo'];
        $obj_mensagem->texto = $request['texto'];
        $obj_mensagem->autor = $request['autor'];
        $obj_mensagem->save();
        return redirect('/mensagens')->with('success', 'mensagem criada com sucesso!!');
//
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        $mensagem = mensagem::find($id);
        return view('mensagem.show', ['mensagem'=> $mensagem]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atividade  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        


        $obj_mensagem= Mensagem::find($id);
        return view('mensagem.edit',['mensagem' => $obj_mensagem]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
//faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'titulo.required' => 'É obrigatório um título para a atividade',
            'texto.required' => 'É obrigatória uma descrição para a atividade',
            'autor.required' => 'É obrigatório o cadastro do autor',
        );
        //vetor com as especificações de validações
        $regras = array(
            'titulo' => 'required|string|max:255',
            'texto' => 'required',
            'autor' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("mensagens/$id/edit")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_atividade = Mensagem::findOrFail($id);
        $obj_atividade->titulo =       $request['titulo'];
        $obj_atividade->texto = $request['texto'];
        $obj_atividade->autor= $request['autor'];
        $obj_atividade->save();

        return redirect('/mensagens')->with('success', 'Mensagem alterada com sucesso!!');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensagem  $mensagem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         
        $obj_mensagem = Mensagem::findOrFail($id);
        $obj_mensagem->delete($id);
        return redirect ('/mensagens') -> with ('sucess', 'mensagem excluida com sucesso!!!');
        
    }


public function delete($id)
{

    $obj_Mensagem= Mensagem::findOrFail($id);
    return view('mensagem.delete', ['mensagem'=>$obj_Mensagem]);
    
}



}


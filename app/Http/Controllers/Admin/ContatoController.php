<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contato;
use App\Cliente;
use App\Telefone;

class ContatoController extends Controller
{
     
    public function adicionar($id)
    {
        $cliente = Cliente::find($id);
        //$telefone = $cliente->contatos($id)->telefones();
        
        return view('admin.contatos.adicionar', compact('cliente'));
    }

    public function salvar(Request $request, $id)
    {
        $contato = new Contato;
        
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->celular = $request->input('celular');
        $contato->cargo = $request->input('cargo');

        Cliente::find($id)->addContato($contato);
        \Session::flash('mensagem',['msg'=>'Contato adicionado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.clientes.detalhe',$id);
    }

    public function editar($id)
    {
        $contato = Contato::find($id);     
        if(!$contato)
        {
            \Session::flash('flash_message',['msg'=>'Não existe esse contato!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.clientes.detalhe', $contato->cliente->id);
        }
        return view('admin.contatos.editar', compact('contato'));
    }

    public function atualizar(Request $request, $id)
    {
        $contato = Contato::find($id);
        $contato->update($request->all());

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.clientes.detalhe', $contato->cliente->id);
    }

    public function deletar($id)
    {
        
        $hcontatos = Contato::find($id);

        $contato= Contato::find($id);
                
        if($hcontatos->hcontatos->count()){
            
            
            $msg = "Não é possível deletar esse CONTATO, pois ele possui (".$hcontatos->hcontatos->count().") histórico de contato(s) que não podem ser apagado(s).";

            
            \Session::flash('mensagem',['msg'=>$msg,'class'=>'alert alert-danger alert-dismissible']);

            return redirect()->route('admin.clientes.detalhe', $contato->cliente->id);
        }
        
        $contato->delete();
        
        \Session::flash('mensagem',['msg'=>'Contato deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
        return redirect()->route('admin.clientes.detalhe', $contato->cliente->id);

    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transportadora;
use App\Cliente;
use App\Bairro;
use App\Cidade;
use App\Estado;

class TransportadoraController extends Controller
{
    public function adicionar($id)
    {
        $cliente = Cliente::find($id);
        //$telefone = $cliente->contatos($id)->telefones();
        $bairros = Bairro::all();
        $cidades = Cidade::all();
        $estados = Estado::all();
        
        return view('admin.transportadoras.adicionar', compact('cliente','bairros','cidades','estados'));
    }


    public function salvar(Request $request, $id)
    {
        $transportadora = new Transportadora;
        
        $bairros = Bairro::all();
        $cidades = Cidade::all();
        $estados = Estado::all();

        $transportadora->nome = $request->input('nome');
        $transportadora->endereco = $request->input('endereco');
        $transportadora->telefone = $request->input('telefone');
        $transportadora->bairro_id = $request->input('bairro_id');
        $transportadora->cidade_id = $request->input('cidade_id');
        $transportadora->cep = $request->input('cep');
        $transportadora->estado_id = $request->input('estado_id');
        

        Cliente::find($id)->addTransportadora($transportadora);
        
        \Session::flash('mensagem',['msg'=>'Transportadora adicionada com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.clientes.detalhe',$id);
    }

    public function editar($id)
    {
        $transportadora= Transportadora::find($id);
        $bairros = Bairro::all();
        $cidades = Cidade::all();
        $estados = Estado::all();
        
        if(!$transportadora)
        {
            \Session::flash('flash_message',['msg'=>'Não existe essa transportadora','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.clientes.detalhe', $transportadora->cliente->id);
        }

        return view('admin.transportadoras.editar', compact('transportadora','bairros','cidades','estados'));
    }

    public function atualizar(Request $request, $id)
    {
        $transportadora = Transportadora::find($id);
        $transportadora->update($request->all());

       /* $contato->nome = $dados['nome'];
        $contato->email = $dados['email'];
        $contato->telefone = $dados['telefone'];
        $contato->celular = $dados['celular'];
        $contato->update();*/

        \Session::flash('mensagem',['msg'=>'Transportadora atualizada com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.clientes.detalhe', $transportadora->cliente->id);
    }

    public function deletar($id)
    {
        
        $transportadora= Transportadora::find($id);

        
        $transportadora->delete();
        
        \Session::flash('mensagem',['msg'=>'Transportadora deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
        return redirect()->route('admin.clientes.detalhe', $transportadora->cliente->id);

    }
}

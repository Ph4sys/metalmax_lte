<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contato;
use App\HistoricoContato;
use App\Pedido;


class HistoricoContatoController extends Controller
{
    public function index($id)
    {
        $tam = 10;
        //$hcontatos = HistoricoContato::paginate(10);
        $contato = Contato::find($id);
        $cliente = $contato->cliente;

        $hcontatos = $contato->hcontatos()->orderBy('created_at','desc')->get();
        $cotacoes = $contato->cotacoes()->orderBy('created_at','desc')->paginate($tam);
        $pedidos = $contato->pedidos()->orderBy('created_at','desc')->paginate($tam);

        //dd(Contato::getDateTimezone($hcontatos[0]->created_at));
        //dd($hcontatos);
        //dd($cotacoes->count());
        
        if(!$contato)
        {
            \Session::flash('flash_message',['msg'=>'Não existe esse contato!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.clientes.detalhe', $contato);
        }
        return view('admin.hcontatos.index', compact('pedidos','hcontatos','contato','cliente','cotacoes'));
    }

    public function mostrarItens($valor){
        $hcontatos = $contato->hcontatos()->orderBy('created_at','desc')->paginate($valor);
    }

    public function adicionar($id)
    {
        $contato = Contato::find($id);
        $cliente = $contato->cliente;
        return view('admin.hcontatos.adicionar', compact('contato','cliente'));
    }

    public function salvar(Request $request, $id)
    {
        $hcontato = new HistoricoContato;
      
        $hcontato->contato_id = $request->input('contato_id');
        $hcontato->nome_contato_metal = $request->input('nome_contato_metal');
        $hcontato->descricao_contato = $request->input('descricao_contato');
        
        //dd($request->input('contato_id'));
        Contato::find($id)->addHContato($hcontato);
        
        \Session::flash('mensagem',['msg'=>'Contato adicionado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.hcontatos',$id);
    }

    public function editar($id)
    {
        $hcontato = HistoricoContato::find($id);
        $contato = Contato::find($hcontato->contato_id);
        //dd($hcontato->descricao_contato);

        return view('admin.hcontatos.editar', compact('hcontato','contato'));
    }

    public function atualizar(Request $request, $id)
    {
        $hcontato = HistoricoContato::find($id);
       
        $hcontato->nome_contato_metal = $request->input('nome_contato_metal');
        $hcontato->descricao_contato = $request->input('descricao_contato');

        $hcontato->update();
       // $hcontato->update($request->all());
        $idcontato = $hcontato->contato_id;

        //dd($hcontato);
       /* $contato->nome = $dados['nome'];
        $contato->email = $dados['email'];
        $contato->telefone = $dados['telefone'];
        $contato->celular = $dados['celular'];
        $contato->update();*/

        \Session::flash('mensagem',['msg'=>'Histórico atualizado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.hcontatos', $idcontato);
    }

    public function deletar($id)
    {
        
        $hcontato= HistoricoContato::find($id);
        $hcontato->delete();
        
        \Session::flash('mensagem',['msg'=>'Histórico Contato deletado com sucesso!','class'=>'alert alert-danger alert-dismissible']);
        
        return redirect()->route('admin.hcontatos', $hcontato->contato_id);

    }
}

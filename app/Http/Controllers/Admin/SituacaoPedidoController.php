<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SituacaoPedido;
use App\Pedido;

class SituacaoPedidoController extends Controller
{
   
	public function index()
    {
        $registros = SituacaoPedido::orderBy('situacao_pedido')->paginate(10);
        return view('admin.situacoes_pedido.index',compact('registros'));
    }
 
    public function adicionar()
    {
        return view('admin.situacoes_pedido.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new SituacaoPedido();
        $registro->situacao_pedido = $dados['situacao'];
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.situacoes_pedido');
        
    }

    public function editar($id)
    {
        $registro = SituacaoPedido::find($id);
        return view('admin.situacoes_pedido.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = SituacaoPedido::find($id);
        $dados = $request->all();

		$registro->situacao_pedido = $dados['situacao'];
       
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.situacoes_pedido');
    }

    public function deletar($id)
    {
        
        if(Pedido::where('situacao_pedido_id','=',$id)->count()){
            
            $msg = "Não é possível deletar essa situação! Esses situações (";
            $pedidos = Pedido::where('situacao_pedido_id','=',$id)->get();

            foreach ($pedidos as $pedido) {
                $msg .= "id:".$pedido->id." ";
            }
            $msg .= ") estão relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'alert alert-success alert-dismissible']);
            return redirect()->route('admin.situacoes_pedido');
        }

        SituacaoPedido::find($id)->delete();
        
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
        return redirect()->route('admin.situacoes_pedido');

    }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Contato;
use App\Cotacao;
use App\ItemCotacao;
use App\Pedido;
use App\SituacaoPedido;

class PedidoController extends Controller
{
    public function index($id)
    {
        //$hcontatos = HistoricoContato::paginate(10);
        $contato = Contato::find($id);
        $cliente = $contato->cliente;
        $hcontatos = $contato->hcontatos;
        $cotacoes = $contato->cotacoes;
        //dd($hcontatos);

        //dd($cotacoes->count());
        
        if(!$contato)
        {
            \Session::flash('flash_message',['msg'=>'Não existe esse contato!','class'=>'alert alert-danger alert-dismissible']);
            return redirect()->route('admin.clientes.detalhe', $contato);
        }

        return view('admin.hcontatos.index', compact('hcontatos','contato','cliente','cotacoes'));
    }
    
    public function detalhe($id)
    {
        $pedido= Pedido::find($id);

        $contato = Contato::find($pedido->contato_id);
        
        //$cliente = Cliente::find($contato->id);

        //$cliente = $contato->cliente()->get();

        $cliente = Cliente::find($contato->cliente->id);
        $cotacao = Cotacao::find($pedido->cotacao_id);
        $itens_cotacao = $cotacao->itensCotacao()->get();
        $situacoes = SituacaoPedido::orderBy('situacao_pedido')->get();

        //dd($cliente->nome);
        //dd($situacoes[0]->situacao_pedido);
        //dd($cliente->situacao->situacao_id);

        return view('admin.pedidos.detalhe', compact('pedido','cliente', 'contato','cotacao','itens_cotacao','situacoes'));

    }

    public function adicionar($id)
    {
        $cotacao= Cotacao::find($id);
        $itens_cotacao = $cotacao->itensCotacao;
        $situacoes = SituacaoPedido::all();
        $soma = 0;
        $contato = Contato::find($cotacao->contato_id);
        $cliente = Cliente::find($contato->cliente_id);
               
        $pedido = new Pedido();
        $pedido->numero_pedido = $this->getNextPedidoNumber();
        $pedido->qtd_itens = count($itens_cotacao);

        //dd($itens_cotacao[0]->valor);
        
        for($x=0; $x<$pedido->qtd_itens; $x++)
        {
            $soma += $itens_cotacao[$x]->valor;
        }

        $pedido->valor_pedido = $soma;
       
        return view('admin.pedidos.adicionar', compact('cotacao','contato','cliente','itens_cotacao','pedido', 'situacoes'));
    }

    public function salvar(Request $request, $idCotacao)
    {
        $pedido = new Pedido;
        
        $pedido->numero_pedido = $request->input('numero_pedido');
        $pedido->cotacao_id = $idCotacao;
        $pedido->contato_id = $request->input('contato_id');
        $pedido->numero_nf = $request->input('numero_nf');
        $pedido->situacao_pedido_id = $request->input('situacao_pedido');
        $pedido->valor_pedido = $request->input('valor_total');
        $pedido->qtd_itens = $request->input('qtd_itens');

        //dd($pedido);

        $pedido->save();

        \Session::flash('mensagem',['msg'=>'Contato adicionado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.hcontatos',$pedido->contato_id);
    }

    public function editar($id)
    {
        $pedido = Pedido::find($id);
        $cotacao = Cotacao::find($pedido->cotacao_id);
        $itens_cotacao = $cotacao->itensCotacao;
        $contato = Contato::find($pedido->contato_id);
        $situacoes = SituacaoPedido::all();

        return view('admin.pedidos.editar', compact('pedido', 'cotacao', 'contato', 'itens_cotacao', 'situacoes'));
    }

    public function atualizar(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        $pedido->numero_pedido = $request->input('numero_pedido');
        $pedido->cotacao_id = $request->input('cotacao_id');
        $pedido->contato_id = $request->input('contato_id');
        $pedido->numero_nf = $request->input('numero_nf');
        $pedido->situacao_pedido_id = $request->input('situacao_pedido');
        $pedido->valor_pedido = $request->input('valor_total');
        $pedido->qtd_itens = $request->input('qtd_itens');

        //dd($pedido);

        $pedido->update($request->all());

        //dd($request->item_desc[0]);
        //$cotacao->itensCotacao()->saveMany($request->all());
        //$cotacao->itensCotacao->update($request->all());

        \Session::flash('mensagem',['msg'=>'Pedido atualizada com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.hcontatos', $pedido->contato_id);
    }
    //Function

    public static function getNextPedidoNumber()
    {
        // Get the last created order
        $lastNumber = Pedido::orderBy('created_at', 'desc')->first();

        if ( ! $lastNumber )
            // We get here if there is no order at all
            // If there is no number set it to 0, which will be 1 at the end.

            $number = 0;
        else 
            $number = substr($lastNumber->numero_pedido, 5);

        // If we have ORD000001 in the database then we only want the number
        // So the substr returns this 000001

        // Add the string in front and higher up the number.
        // the %05d part makes sure that there are always 6 numbers in the string.
        // so it adds the missing zero's when needed.
     
        return "P". date('Y') . sprintf('%06d', intval($number) + 1);
    }
}


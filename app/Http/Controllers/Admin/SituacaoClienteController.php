<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SituacaoCliente;
use App\Cliente;

class SituacaoClienteController extends Controller
{
   public function index()
    {
        $registros = SituacaoCliente::orderBy('situacao')->paginate(5);
        return view('admin.situacoes.index',compact('registros'));
    }
 
    public function adicionar()
    {
        return view('admin.situacoes.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new SituacaoCliente();
        $registro->situacao = $dados['situacao'];
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.situacoes');
        
    }

    public function editar($id)
    {
        $registro = SituacaoCliente::find($id);
        return view('admin.situacoes.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = SituacaoCliente::find($id);
        $dados = $request->all();

		$registro->situacao = $dados['situacao'];
       
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.situacoes');
    }

    public function deletar($id)
    {
        
        if(Cliente::where('situacao_id','=',$id)->count()){
            
            $msg = "Não é possível deletar essa cidade! Esses clientes (";
            $clientes = Cliente::where('situacao_id','=',$id)->get();

            foreach ($clientes as $cliente) {
                $msg .= "id:".$cliente->id." ";
            }
            $msg .= ") estão relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'alert alert-success alert-dismissible']);
            return redirect()->route('admin.situacoes');
        }

        SituacaoCliente::find($id)->delete();
        
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
        return redirect()->route('admin.situacoes');

    }
}

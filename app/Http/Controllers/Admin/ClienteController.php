<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\ClasseCliente;
use App\SituacaoCliente;
use App\Contato;
use App\Bairro;
use App\Cidade;
use App\Estado;
use App\Telefone;
use App\Transportadora;

class ClienteController extends Controller
{
    public function index()
    {
        $registros = Cliente::orderBy('nome')->paginate(10);

        $classes = ClasseCliente::orderBy('classe')->get();
        $situacoes = SituacaoCliente::orderBy('situacao')->get();;
        $cidades = Cidade::orderBy('nome')->get();

        $paginacao = true;

        return view('admin.clientes.index',compact('registros','classes','situacoes','cidades','paginacao'));
    }

    public function busca( Request $request)
    {
        $busca =  $request->all();
        
        $classes = ClasseCliente::orderBy('classe')->get();
        $situacoes = SituacaoCliente::orderBy('situacao')->get();;
        $cidades = Cidade::orderBy('nome')->get();

        $paginacao = false;

        if($busca['classe_id'] == 'todos'){
            $testeClasse = [
                ['classe_id','<>',null]
            ];
        }else{
            $testeClasse = [
                ['classe_id','=',$busca['classe_id']]
            ];
        }

        if($busca['situacao_id'] == 'todos'){
            $testeSituacao = [
                ['situacao_id','<>',null]
            ];
        }else{
            $testeSituacao = [
                ['situacao_id','=',$busca['situacao_id']]
            ];
        }

        if($busca['cidade_id'] == 'todos'){
            $testeCidade = [
                ['cidade_id','<>',null]
            ];
        }else{
            $testeCidade = [
                ['cidade_id','=',$busca['cidade_id']]
            ];
        }

        If($busca['nome'] != ''){
            $testeNome = [
                ['nome','like','%'.$busca['nome'].'%']
            ];
        }else{
            $testeNome = [
                ['nome','<>',null]
            ];
        }
        
        If($busca['cnpj'] != ''){
            $testecnpj = [
                ['cnpj','like','%'.$busca['cnpj'].'%']
            ];
        }else{
            $testecnpj = [
                ['cnpj','<>',null]
            ];
        }

        $registros = Cliente::where($testeClasse)
                    ->where($testeSituacao)
                    ->where($testeCidade)
                    ->where($testeNome)
                    ->where($testecnpj)
                    ->orderBy('nome')->get();
        
        return view('admin.clientes.busca', compact('registros','busca','classes','situacoes','cidades','paginacao'));
    }
 
    public function detalhe($id)
    {
        $cliente = Cliente::find($id);
        //$transportadoras= $cliente->transportadoras;
       
        //$transportadoras = $cliente->transportadoras()->orderBy('created_at','desc')->paginate(1);
        $transportadoras = $cliente->transportadoras;
        //$contatos = $cliente->contatos()->orderBy('created_at','desc')->paginate(2);
        $contatos = $cliente->contatos;

        
        /*
        $transportadoras= DB::Table('transportadoras')
            ->where('cliente_id',$id)
            ->join('bairros','transportadoras.bairro_id','=','bairros.id')
            ->select('transportadoras.*','bairros.nome')
            ->get();*/
        
        //$contatos = DB::Table('contatos')->where('cliente_id',$id)->orderBy('created_at','desc')->paginate(2);
      
        //$transportadora = Transportadora::find('1');
        //dd($transportadora->bairro);

        return view('admin.clientes.detalhe', compact('cliente','contatos','transportadoras'));

    }
    public function adicionar()
    {
        $classes = ClasseCliente::all();
        $situacoes = SituacaoCliente::all();
        $bairros = Bairro::all();
        $cidades = Cidade::all();
        $estados = Estado::all();

        return view('admin.clientes.adicionar', compact('classes','situacoes','bairros','cidades','estados'));
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new Cliente();
        $registro->nome = $dados['nome'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->responsavel = $dados['responsavel'];
        $registro->inscricao = $dados['inscricao'];
        $registro->cnpj = $dados['cnpj'];
        //$registro->credito = $dados['credito'];
        $get_valor = $dados['credito'];
        $registro->credito = $this->moeda($get_valor);


        $registro->classe_id = $dados['classe_id'];
        $registro->situacao_id = $dados['situacao_id'];
        $registro->cidade_id = $dados['cidade_id'];
        $registro->bairro_id = $dados['bairro_id'];
        $registro->estado_id = $dados['estado_id'];
        $registro->tipo_envio = $dados['tipo_envio'];
        $registro->observacao = $dados['observacao'];

        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.clientes');
        
    }

    public function editar($id)
    {
        $registro = Cliente::find($id);
        
        $classes = ClasseCliente::all();
        $contatos = Contato::all();
        $situacoes = SituacaoCliente::all();
        $bairros = Bairro::all();
        $cidades = Cidade::all();
        $estados = Estado::all();
        
        return view('admin.clientes.editar', compact('registro','classes','situacoes','bairros','cidades','estados','contatos'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = Cliente::find($id);
        $dados = $request->all();

        $registro->nome = $dados['nome'];
        $registro->endereco = $dados['endereco'];
        $registro->cep = $dados['cep'];
        $registro->responsavel = $dados['responsavel'];
        $registro->inscricao = $dados['inscricao'];
        $registro->cnpj = $dados['cnpj'];
        //$registro->credito = floatval($dados['credito']);
        $get_valor = $dados['credito'];
        $registro->credito = $this->moeda($get_valor);
        //dd($registro->credito);
        $registro->classe_id = $dados['classe_id'];
        $registro->situacao_id = $dados['situacao_id'];
        $registro->cidade_id = $dados['cidade_id'];
        $registro->bairro_id = $dados['bairro_id'];
        $registro->estado_id = $dados['estado_id'];
        $registro->tipo_envio = $dados['tipo_envio'];
        $registro->observacao = $dados['observacao'];

		$registro->nome = $dados['nome'];
        //dd($registro->credito);
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.clientes');
    }

    public function deletar($id)
    {
        /*
        if(Cliente::where('cidade_id','=',$id)->count()){
            
            $msg = "Não é possível deletar essa cidade! Esses clientes (";
            $clientes = Cliente::where('cidade_id','=',$id)->get();

            foreach ($clientes as $cliente) {
                $msg .= "id:".$cliente->id." ";
            }
            $msg .= ") estão relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'alert alert-success alert-dismissible']);
            return redirect()->route('admin.clientes');
        }*/

        Cliente::find($id)->delete();
        
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
        return redirect()->route('admin.clientes');

    }

    function moeda($get_valor) {
        $source = array('.', ',');
        $replace = array('', '.');
        $valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
        return $valor; //retorna o valor formatado para gravar no banco
    }
}
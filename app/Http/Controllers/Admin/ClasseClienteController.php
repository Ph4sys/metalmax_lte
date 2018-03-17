<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClasseCliente;
use App\Cliente;

class ClasseClienteController extends Controller
{
    public function index()
    {
        $registros = ClasseCliente::orderBy('classe')->paginate(10);
        return view('admin.classes.index',compact('registros'));
    }
 
    public function adicionar()
    {
        return view('admin.classes.adicionar');
    }

    public function salvar(Request $request)
    {
        $dados = $request->all();

        $registro = new ClasseCliente();
        $registro->classe = $dados['classe'];
        $registro->save();

        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.classes');
        
    }

    public function editar($id)
    {
        $registro = ClasseCliente::find($id);
        return view('admin.classes.editar', compact('registro'));
    }

    public function atualizar(Request $request, $id)
    {
        $registro = ClasseCliente::find($id);
        $dados = $request->all();

		$registro->classe = $dados['classe'];
       
        $registro->update();

        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.classes');
    }

    public function deletar($id)
    {

        if(Cliente::where('classe_id','=',$id)->count()){
            
            $msg = "Não é possível deletar essa cidade! Esses clientes (";
            $clientes = Cliente::where('classe_id','=',$id)->get();

            foreach ($clientes as $cliente) {
                $msg .= "id:".$cliente->id." ";
            }
            $msg .= ") estão relacionados.";

            \Session::flash('mensagem',['msg'=>$msg,'class'=>'alert alert-success alert-dismissible']);
            return redirect()->route('admin.classes');
        }

        ClasseCliente::find($id)->delete();
        
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
        return redirect()->route('admin.classes');

    }
}

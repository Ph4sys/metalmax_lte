<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Cliente;
use App\Contato;
use App\Cotacao;
use App\ItemCotacao;


class CotacaoController extends Controller
{
    
    public function detalhe($id)
    {
        $cotacao= Cotacao::find($id);
        $contato = Contato::find($cotacao->contato->id);
        $cliente = Cliente::find($contato->cliente_id);

        $itens_cotacao = $cotacao->itensCotacao;
        
        return view('admin.cotacoes.detalhe', compact( 'cliente', 'contato','cotacao','itens_cotacao'));

    }

    public function adicionar($id)
    {
        $contato = Contato::find($id);
        $cliente = $contato->cliente;
        $itens_cotacao = new ItemCotacao;

        return view('admin.cotacoes.adicionar', compact('contato','cliente','itens_cotacao'));
    }

    public function salvar(Request $request, $id)
    {
        $cotacao = new Cotacao;
       
        $numero = $this->getNextCotationNumber();

        $cotacao->numero_cotacao = $numero;
        $cotacao->contato_id = $id;
        $cotacao->nome_contato_metal = $request->input('nome_contato_metal');
        //$cotacao->descricao_cotacao = $request->input('descricao_cotacao');
        $cotacao->tolerancia = $request->input('tolerancia');
        $cotacao->observacao = $request->input('observacao');

        //dd(date_default_timezone_get());

        $cotacao->save();

        $dados = $request->input('dados');
        $num= count($dados)/4;

        $array_div= array_chunk($dados, 4);

//        $teste= $this->moeda('129,900');
//        dd($teste);

        for($i=0; $i<$num;$i++){
            
            $this->insertItem($array_div[$i], $cotacao);
        }

        //Cliente::find($id)->addContato($contcotacaoato);
        
        \Session::flash('mensagem',['msg'=>'Contato adicionado com sucesso!','class'=>'alert alert-success alert-dismissible']);

        return redirect()->route('admin.hcontatos',$id);
    }

    public function editar($id)
    {
        $cotacao = Cotacao::find($id);
        $contato = $cotacao->contato;
        //dd($cotacao->tolerancia);
        $itens_cotacao = $cotacao->itensCotacao;

        for($i = 0; $i<count($itens_cotacao); $i++){ 
            $itens_cotacao[$i]->valor = number_format($itens_cotacao[$i]->valor, 2, ',', '.');
        }

        //dd($itens_cotacao); //dd($cotacao->contato->id);  //dd($cotacao->contato->cliente->id);

        return view('admin.cotacoes.editar', compact('cotacao','itens_cotacao', 'contato'));
    }

    public function atualizar(Request $request, $id)
    {
        $cotacao = Cotacao::find($id);
        $itens_cotacao = $cotacao->ItensCotacao()->get();

        //dd($itens_cotacao[1]->id);

        $cotacao->tolerancia = $request->input('tolerancia');
        $cotacao->observacao = $request->input('observacao');

        //Faz update cotação
        $cotacao->update();

        //Prepara update dos itens da cotação

        $numItens = sizeof($itens_cotacao);
        $dados = $request->input('dados');
        $numItensForm = count($dados)/4;
        
        //dd($dados);
        $array_div= array_chunk($dados, 4);
        
        //dd($array_div);

        if( $numItens == $numItensForm ){
        
            for($i=0; $i<$numItens; $i++)
            {
                $this->updateItem($array_div[$i], $itens_cotacao[$i]);
            }

            \Session::flash('mensagem',['msg'=>'Cotação atualizada com sucesso!','class'=>'alert alert-success alert-dismissible']);

        } elseif ( $numItens > $numItensForm ){
       
            for($idx=0; $idx<$numItens; $idx++)
            { 
                if ( $idx < ($numItensForm))
                {
                    //dd(($numItens - $numItensForm)-1, $numItens);
                    $this->updateItem($array_div[$idx], $itens_cotacao[$idx]);

                } else {
                    
                    //dd($itens_cotacao[$idx]->id, $idx);
                    
                    ItemCotacao::find($itens_cotacao[$idx]->id)->delete();
                     
                }

               \Session::flash('mensagem',['msg'=>'Cotação atualizada e item deletado com sucesso!','class'=>'alert alert-success alert-dismissible']);
            }
        } else {
            
            for($id=0; $id<$numItensForm; $id++)
            {
                if( $id < $numItens )
                {
                    $this->updateItem($array_div[$id], $itens_cotacao[$id]);
                } else {
                    $this->insertItem($array_div[$id], $cotacao);
                }
                
            }

            \Session::flash('mensagem',['msg'=>'Cotação atualizada e item inserido com sucesso!','class'=>'alert alert-success alert-dismissible']);

        }

        return redirect()->route('admin.hcontatos', $cotacao->contato->id);
    }


    //Functions

    function teste($var){

        return $var;
    }
    
    public static function updateItem($array_div, $icotacao){
                
        $icotacao->item_desc = $array_div['0'];
        $icotacao->quantidade = $array_div['1'];
        $icotacao->unidade = $array_div['2'];
       // $icotacao->valor = $array_div['3'];
        
        $source = array('.', ',');
        $replace = array('', '.');
        
        //$icotacao->valor = $this->moeda($get_valor);

        $icotacao->valor = str_replace($source, $replace, $array_div['3']);

        $icotacao->update();
    }

    public static function insertItem($array_div, $cotacao){
                
        $icotacao = new ItemCotacao();

        $icotacao->item_desc = $array_div['0'];
        $icotacao->quantidade = $array_div['1'];
        $icotacao->unidade = $array_div['2'];
        //$icotacao->valor = $array_div['3'];
        //$gt_valor = $array_div['3'];
        //$icotacao->valor = $this->teste($gt_valor);
        //dd($icotacao->valor);

        $source = array('.', ',');
        $replace = array('', '.');
        
        //$icotacao->valor = $this->moeda($get_valor);

        $icotacao->valor = str_replace($source, $replace, $array_div['3']);
        $cotacao->addItemCotacao($icotacao);
     
    }
    
    
    public static function getNextCotationNumber()
	{
	    // Get the last created order
	    $lastNumber = Cotacao::orderBy('created_at', 'desc')->first();

	    if ( ! $lastNumber )
	        // We get here if there is no order at all
	        // If there is no number set it to 0, which will be 1 at the end.

	        $number = 0;
	    else 
	        $number = substr($lastNumber->numero_cotacao, 4);

	    // If we have ORD000001 in the database then we only want the number
	    // So the substr returns this 000001

	    // Add the string in front and higher up the number.
	    // the %05d part makes sure that there are always 6 numbers in the string.
	    // so it adds the missing zero's when needed.
	 
	    return date('Y') . sprintf('%06d', intval($number) + 1);
	}

   

}

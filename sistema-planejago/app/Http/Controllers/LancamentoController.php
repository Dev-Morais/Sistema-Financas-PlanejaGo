<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lancamento;
use Carbon\Carbon;

class LancamentoController extends Controller
{
    public function index () {
        $lancamentos = Lancamento::with(['categoria', 'tipoLancamento'])
            ->where('user_id', auth()->id())
            ->orderBy('data_vencimento', 'asc')
            ->get();

        return view('lancamentos.home', compact('lancamentos'));
    }

    public function criaDespesa (Request $request) {

        $dadosValidados = $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric|min:0',
            'status' => 'required|in:true,false',
            'categoria' => 'required|integer',
            'frequencia' => 'required|integer',
            'dataCriacao' => 'required|date',
            'dataVencimento' => 'required|date|after_or_equal:dataCriacao',
        ]);

        Lancamento::create([
            'descricao'           => $dadosValidados['descricao'],
            'valor'               => $dadosValidados['valor'],
            'status_pago'         => $dadosValidados['status'] === 'true' ? true : false,
            'data_criacao'        => $dadosValidados['dataCriacao'],
            'data_vencimento'     => $dadosValidados['dataVencimento'],
            
            // Relacionamentos 
            'categoria_id'        => $dadosValidados['categoria'],
            'frequencia_id'       => $dadosValidados['frequencia'],
            'tipo_lancamento_id'  => 1, // Despesa
            'user_id'             => auth()->id(),

            // Logs
            'log_data_inclusao'   => Carbon::now(),
            'log_data_alteracao'  => Carbon::now(),
            'log_versao_registro' => 1, 
        ]);

        return redirect()->route('user.lancamentos')->with('sucesso', 'Despesa registrada com sucesso!');
    }

    public function atualizarStatus(Request $request, $id)
    {
        $lancamento = Lancamento::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $lancamento->status_pago = $request->status; 
        $lancamento->save();

        return response()->json(['success' => true]);
    }


    public function criaReceita(Request $request) 
    {
        $dadosValidados = $request->validate([
            'descricao'   => 'required|string|max:255',
            'valor'       => 'required|numeric|min:0',
            'categoria'   => 'required|integer',
            'frequencia'  => 'required|integer',
            'dataCriacao' => 'required|date',
        ]);

        Lancamento::create([
            'descricao'           => $dadosValidados['descricao'],
            'valor'               => $dadosValidados['valor'],
            'data_criacao'        => $dadosValidados['dataCriacao'],
            
            // Relacionamentos 
            'categoria_id'        => $dadosValidados['categoria'],
            'frequencia_id'       => $dadosValidados['frequencia'],
            'tipo_lancamento_id'  => 2, // 2 = Receita
            'user_id'             => auth()->id(),

            // Logs
            'log_data_inclusao'   => Carbon::now(),
            'log_data_alteracao'  => Carbon::now(),
            'log_versao_registro' => 1, 
        ]);

        return redirect()->route('user.lancamentos')->with('sucesso', 'Receita registrada com sucesso!');
    }



}

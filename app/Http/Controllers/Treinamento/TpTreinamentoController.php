<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\TpTreinamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class TpTreinamentoController extends Controller{

    public function index()
    {
        return view('treinamento.tptreinamentos.index');  
             
            }
    public function getdata()
    {
        $tptreinamentos = \App\Models\Treinamento\TpTreinamento::all(); 
        

        return Datatables::of($tptreinamentos)
        ->addColumn('action', function ($tptreinamento) {
                return '<a href="tptreinamentos/'.$tptreinamento->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    <a href="#" class="btn btn-xs btn-danger delete" id="'.$tptreinamento->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->removeColumn('password')
                    ->make(true);
            }
    function destroy(Request $request)
    {
        $tptreinamento = TpTreinamento::find($request->input('id'));
        if($tptreinamento->delete())
        {
            echo 'Tipo de Treinamento deletado com Sucesso';
        }
    }

    public function store(Request $request)
    {
        request()->validate([
            'nome_tptreinamento' => 'required',
        ]);

        TpTreinamento::create($request->all());

        return redirect()->route('tptreinamentos.index')
                    ->with('success', 'Tipo de Treinamento cadastrado com sucesso!');

    }


    public function show(TpTreinamento $tptreinamento)
    {
        return view('treinamento.tptreinamentos.show',compact('tptreinamento'));
    }

    public function edit(TpTreinamento $tptreinamento)
    {
        return view('treinamento.tptreinamentos.edit',compact('tptreinamento'));
    }

    public function update(Request $request, TpTreinamento $tptreinamento)
    {
        request()->validate([
            'nome_tptreinamento' => 'required',
        ]);

        $tptreinamento->update($request->all());

        return redirect()->route('tptreinamentos.index')
                    ->with('success', 'Tipo de Treinamento Atualizado com Sucesso!');
    }


}

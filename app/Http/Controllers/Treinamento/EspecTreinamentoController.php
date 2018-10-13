<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\EspecTreinamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class EspecTreinamentoController extends Controller{
            public function index()
                {
                  return view('treinamento.espectreinamentos.index');  
             
            }
            public function getdata()
            {
                $espectreinamentos = \App\Models\Treinamento\EspecTreinamento::all(); 
        
                return Datatables::of($espectreinamentos)
                    ->addColumn('action', function ($espectreinamento) {
                        return '<a href="espectreinamentos/'.$espectreinamento->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a href="#" class="btn btn-xs btn-danger delete" id="'.$espectreinamento->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->removeColumn('password')
                    ->make(true);
            }

            function destroy(Request $request)
            {
                $espectreinamento = EspecTreinamento::find($request->input('id'));
                if($espectreinamento->delete())
                {
                    echo 'Especificação de Treinamento deletado com sucesso!';
                }
            }

    public function store(Request $request)
        {
            request()->validate([
                'nome_espectreinamento' => 'required',
        ]);
            EspecTreinamento::create($request->all());

            return redirect()->route('espectreinamentos.index')
                    ->with('success', 'Especificação de Treinamento cadastrado com sucesso!');
    }
    
    public function show(EspecTreinamento $espectreinamento)
        {
            return view('treinamento.espectreinamentos.show',compact('espectreinamento'));
    }

    public function edit(EspecTreinamento $espectreinamento)
        {
            return view('treinamento.espectreinamentos.edit',compact('espectreinamento'));
    }

    public function update(Request $request, EspecTreinamento $espectreinamento)
    {
            request()->validate([
            'nome_espectreinamento' => 'required',
        ]);
            $espectreinamento->update($request->all());

            return redirect()->route('espectreinamentos.index')
                    ->with('success', 'Especificação de Treinamento atualizado com sucesso!');
    }           
}



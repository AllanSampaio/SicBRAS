<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class DepartamentoController extends Controller{
            public function index()
                {
                  return view('treinamento.departamentos.index');  
             
            }
            public function getdata()
            {
                $departamentos = \App\Models\Treinamento\Departamento::all(); 


                return Datatables::of($departamentos)
                    ->addColumn('action', function ($departamento) {
                        return '<a href="departamentos/'.$departamento->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a href="#" class="btn btn-xs btn-danger delete" id="'.$departamento->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->removeColumn('password')
                    ->make(true);
            }
    function destroy(Request $request)
    {
        $departamento = Departamento::find($request->input('id'));
        if($departamento->delete())
        {
            echo 'Departamento deletado com sucesso!';
        }
    }

    public function store(Request $request)
        {
            request()->validate([
                'nome_departamento' => 'required',
        ]);
            Departamento::create($request->all());

            return redirect()->route('departamentos.index')
                    ->with('success', 'Departamento cadastrado com sucesso!');
    }
    
    public function show(Departamento $departamento)
        {
            return view('treinamento.departamentos.show',compact('departamento'));
    }

    public function edit(Departamento $departamento)
        {
            return view('treinamento.departamentos.edit',compact('departamento'));
    }

    public function update(Request $request, Departamento $departamento)
    {
            request()->validate([
            'nome_departamento' => 'required',
        ]);
            $departamento->update($request->all());

            return redirect()->route('departamentos.index')
                    ->with('success', 'Departamento atualizado com sucesso!');
    }           
}



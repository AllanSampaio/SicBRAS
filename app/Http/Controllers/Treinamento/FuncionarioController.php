<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;


class FuncionarioController extends Controller{
    public function index()
        {
            return view('treinamento.funcionarios.index');  
             
    }
    
    public function getdata()
        {
            $funcionarios = \App\Models\Treinamento\Funcionario::all(); 
                
                return Datatables::of($funcionarios)
                    ->addColumn('action', function ($funcionario) {
                        return '<a href="funcionarios/'.$funcionario->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                <a href="#" class="btn btn-xs btn-danger delete" id="'.$funcionario->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->removeColumn('password')
                    ->make(true);
    }

    function destroy(Request $request)
    {
        $funcionario = Funcionario::find($request->input('id'));
        if($funcionario->delete())
        {
            echo 'Funcionário deletado com sucesso!';
        }
    }

    public function store(Request $request)
        {
            request()->validate([
                'nome_funcionario' => 'required',
        ]);
            Funcionario::create($request->all());

            return redirect()->route('funcionarios.index')
                    ->with('success', 'Funcionário cadastrado com sucesso!');
    } 

    public function show(Funcionario $funcionario)
    {
        return view('treinamento.funcionarios.show',compact('funcionario'));
    }

    public function edit(Funcionario $funcionario)
    {
        return view('treinamento.funcionarios.edit',compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        request()->validate([
            'nome_funcionario' => 'required',
        ]);


        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')
                    ->with('success', 'Funcionário atualizado com sucesso!');
    }

}

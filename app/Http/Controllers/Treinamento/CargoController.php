<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\Cargo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CargoController extends Controller{
    public function index()
    {
        return view('treinamento.cargos.index');  
             
            }
    public function getdata()
    {
        $cargos = \App\Models\Treinamento\Cargo::all(); 
        

        return Datatables::of($cargos)
        ->addColumn('action', function ($cargo) {
        return '<a href="cargos/'.$cargo->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="#" class="btn btn-xs btn-danger delete" id="'.$cargo->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->removeColumn('password')
                    ->make(true);
            }
    function destroy(Request $request)
    {
        $cargo = Cargo::find($request->input('id'));
        if($cargo->delete())
        {
            echo 'Cargo deletado com sucesso!';
        }
    }

    public function store(Request $request)
        {
            request()->validate([
                'nome_cargo' => 'required',
        ]);
            Cargo::create($request->all());

            return redirect()->route('cargos.index')
                    ->with('success', 'Cargo cadastrado com sucesso!');
    }
    
    public function show(Cargo $cargo)
        {
            return view('treinamento.cargos.show',compact('cargo'));
    }

    public function edit(Cargo $cargo)
        {
            return view('treinamento.cargos.edit',compact('cargo'));
    }

    public function update(Request $request, Cargo $cargo)
    {
            request()->validate([
            'nome_cargo' => 'required',
        ]);
            $cargo->update($request->all());

            return redirect()->route('cargos.index')
                    ->with('success', 'Cargo atualizado com sucesso!');
    }           
    



}



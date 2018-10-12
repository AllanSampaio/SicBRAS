<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\Curso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CursoController extends Controller{
    public function index()
    {
        return view('treinamento.cursos.index');  
             
            }
    public function getdata()
    {
        $cursos = \App\Models\Treinamento\Curso::all();
        

        return Datatables::of($cursos)
        ->addColumn('action', function ($curso) {
        return '<a href="cursos/'.$curso->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <a href="#" class="btn btn-xs btn-danger delete" id="'.$curso->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                    })
                    ->editColumn('id', 'ID: {{$id}}')
                    ->removeColumn('password')
                    ->make(true);
            }
    function destroy(Request $request)
    {
        $curso = Curso::find($request->input('id'));
        if($curso->delete())
        {
            echo 'Curso deletado com Sucesso';
        }
    }

    public function store(Request $request)
        {
            request()->validate([
                'nome_curso' => 'required',
        ]);
            Curso::create($request->all());

            return redirect()->route('cursos.index')
                    ->with('success', 'Curso cadastrado com sucesso!');
    }
    
    public function show(Curso $curso)
        {
            return view('treinamento.cursos.show',compact('curso'));
    }

    public function edit(Curso $curso)
        {
            return view('treinamento.cursos.edit',compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
            request()->validate([
            'nome_curso' => 'required',
        ]);
            $curso->update($request->all());

            return redirect()->route('cursos.index')
                    ->with('success', 'Curso Atualizado com Sucesso!');
    }           
    



}



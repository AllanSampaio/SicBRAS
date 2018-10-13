<?php

namespace App\Http\Controllers\Treinamento;

use App\Models\Treinamento\Cetor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class CetorController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('treinamento.cetors.index');  
     
    }

    public function getdata()
    {
        $cetors = \App\Models\Treinamento\Cetor::all(); 

        return Datatables::of($cetors)
            ->addColumn('action', function ($cetor) {
                return '<a href="cetors/'.$cetor->id.'/edit " class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger delete" id="'.$cetor->id.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->removeColumn('password')
            ->make(true);
    }
    
    function destroy(Request $request)
    {
        $cetor = Cetor::find($request->input('id'));
        if($cetor->delete())
        {
            echo 'Setor deletado com sucesso!';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nome_cetor' => 'required',
        ]);

        Cetor::create($request->all());

        return redirect()->route('cetors.index')
                    ->with('success', 'Setor cadastrado com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cetor  $cetor
     * @return \Illuminate\Http\Response
     */
    public function show(Cetor $cetor)
    {
        return view('treinamento.cetors.show',compact('cetor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cetor  $cetor
     * @return \Illuminate\Http\Response
     */
    public function edit(Cetor $cetor)
    {
        return view('treinamento.cetors.edit',compact('cetor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cetor  $cetor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cetor $cetor)
    {
        request()->validate([
            'nome_cetor' => 'required',
        ]);


        $cetor->update($request->all());

        return redirect()->route('cetors.index')
                    ->with('success', 'Setor atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cetor  $cetor
     * @return \Illuminate\Http\Response
     */

}

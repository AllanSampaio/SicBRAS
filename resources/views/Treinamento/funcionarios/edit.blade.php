@extends('adminlte::page')

@section('title', 'Módulo de Treinamento')

@section('content_header')
<div id="conteudo" style="margin-top: -30px;">
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-12 col-xs-6">
          <!-- small box -->
          <center>
          <div class="small-box" style="background:#007a64; color: white">
            <div class="inner">
              <center><h2>Editor de Dados do Funcionário</h2></center>              
                <h4>
                    <div align="right">
                    <a class="btn btn-primary" href="{{ route('funcionarios.index') }}">Voltar</a>
                    </div>
                </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="box box-success" style="position: relative; left: 0px; top: 0px;">
</div>
@stop


@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>OPA!</strong>Houve um Problema na entrada de Dados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('funcionarios.update',$funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome_funcionario" value="{{ $funcionario->nome_funcionario }}" class="form-control" placeholder="Digite aqui o novo nome" maxlength="80">
                </div>
                
                <div class="form-group">
                    <strong>Matrícula:</strong>
                    <input type="number" max="99999"  name="matricula" value="{{ $funcionario->matricula }}" class="form-control" placeholder="Digite aqui a nova matrícula">
                </div>
                
                <div class="form-group">
                        <strong>Ele é instrutor?</strong>
                            <select name="instrutor" class="form-control" required="ON">
                            <option>{{ $funcionario->instrutor }}</option>
                            <option value="Sim">Sim</option>
                            <option value="Nao">Não</option>
                            <select>   
                </div>

                <div class="form-group">
                        <strong>Situação do Colaborador?</strong>
                            <select name="situacao" class="form-control" required="ON">
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                            <select>   
                </div>

                <div class="row">
                        <div class="col-md-4">
                            <strong>Selecione o Cargo</strong>
                            <select name="cargos_id" class="form-control" required="ON">
                            <option value="{{ $funcionario->cargo->id }}"> {{ $funcionario->cargo->nome_cargo }} </option>
                            @foreach ($classcargo_array as $cargos_id)
                                <option value="{{$cargos_id->id}}" > {{$cargos_id->nome_cargo}}</option>
                            @endforeach 
                            </select>    

                        </div>
                        
                       <div class="col-md-4">
                            <strong>Selecione o Setor</strong>
                            <select name="cetors_id" class="form-control" required="ON">
                            <option value="{{ $funcionario->cetor->id }}">{{ $funcionario->cetor->nome_cetor }} </option>
                            @foreach ($classcetor_array as $cetors_id)
                                <option value="{{$cetors_id->id}}" > {{$cetors_id->nome_cetor}}</option>
                            @endforeach     
                            </select>   

                        </div> 
                     
                        <div class="col-md-4">
                            <strong>Selecione o Departamento</strong>
                            <select name="departamentos_id" class="form-control" required="ON">
                            <option value="{{ $funcionario->departamento->id }}"> {{ $funcionario->departamento->nome_departamento }} </option>
                            @foreach ($classdepartamento_array as $departamentos_id)
                                 <option value="{{$departamentos_id->id}}" > {{$departamentos_id->nome_departamento}}</option>
                            @endforeach               
                            </select>   
                        </div>
                    </div>
            


                    <br>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>


    </form>


@endsection
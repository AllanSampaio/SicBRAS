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
              <center><h2>Editor de Nome da Tabela Treinamento</h2></center>              
                <h4>
                    <div align="right">
                    <a class="btn btn-primary" href="{{ route('cursos.index') }}">Voltar</a>
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


    <form action="{{ route('cursos.update',$curso->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Digite um novo Nome para o Treinamento abaixo:</strong>
                    <br><br>
                    <input type="text" name="nome_curso" value="{{ $curso->nome_curso }}" class="form-control" placeholder="Digite aqui o novo nome">
                </div>
                
             


            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>


    </form>


@endsection
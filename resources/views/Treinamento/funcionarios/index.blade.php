@extends('adminlte::page')

@section('title', 'Módulo de Treinamento')

@section('content_header')
<div id="conteudo" style="margin-top: -30px;">
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-12 col-xs-12">
          <!-- small box -->
          <center>
          <div class="small-box" style="background:#007a64; color: white">
            <div class="inner">
              <center><h2>Gerenciador de Funcionario</h2></center>              
                <h4>
                    <div align="right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="      .bd-example-modal-lg">Incluir Funcionário</button>
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
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <br><br><br><br><br><br><br><br><br><br>
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                <form action="{{ route('funcionarios.store') }}" method="POST">
                    @csrf
                        <div class="container box box-success">
                        <br>
                    <div class="row">
                            <div class="col-md-4">
                                <strong>Nome do Novo Funcionário:</strong>
                                    <input type="text" name="nome_funcionario" class="form-control" placeholder="Digite o nome..." required="ON">
                            </div>
                 
                            <div class="col-md-4">
                                <strong>Matricula do Novo Funcionário:</strong>
                                    <input type="text" name="matricula" class="form-control" placeholder="Digite o nome..." required="ON">
                            </div>
                 
                            <div class="col-md-4">
                                <strong>Ele é instrutor?</strong>
                                    <select name="instrutor" class="form-control" required="ON">
                                    <option value="">Clique aqui</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                    <select>   
                            </div>
                    </div>

                <br>

                    <div class="row">
                        <div class="col-md-4">
                            <strong>Selecione o Cargo</strong>
                            <select name="cargos_id" class="form-control" required="ON">
                            <option value="">Clique aqui</option>
                            
                            @foreach ($classcargo_array as $cargos_id)
                                <option value="{{$cargos_id->id}}" > {{$cargos_id->nome_cargo}}</option>
                            @endforeach 
                            </select>    

                        </div>
                        
                       <div class="col-md-4">
                            <strong>Selecione o Setor</strong>
                            <select name="cetors_id" class="form-control" required="ON">
                            <option value="">Clique aqui</option>
                            @foreach ($classcetor_array as $cetors_id)
                                <option value="{{$cetors_id->id}}" > {{$cetors_id->nome_cetor}}</option>
                            @endforeach     
                            </select>   

                        </div> 
                     
                        <div class="col-md-4">
                            <strong>Selecione o Departamento</strong>
                            <select name="departamentos_id" class="form-control" required="ON">
                            <option value="">Clique aqui</option>
                            @foreach ($classdepartamento_array as $departamentos_id)
                                 <option value="{{$departamentos_id->id}}" > {{$departamentos_id->nome_departamento}}</option>
                            @endforeach               
                            </select>   
                        </div>
                    </div> 

                    <br>


                    <br>
                    <div class="row">
                        <div class="col-md-12">
                    <div class="form-group">
                        <strong>Situação do Colaborador?</strong>
                            <select name="situacao" class="form-control" required="ON">
                         
                            <option value="Ativo">Ativo</option>
                            
                            <select>   
                    </div>
                    </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-4">
                        </div> 

                        <div class="col-md-4">
                        <center><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></center>
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-sic btn-success btn-block btn-flat ">Enviar</button>
                        </div>
                    </div>
                    <br>
                </form>
                </div>   
              </div>
            </div>
            </div> 
        </div>
        </div>
    </div>

    <head>
        <script src="js/jquery.min.js" type="text/javascript"></script>

        <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>      
        <link  href="css/dataTables.bootstrap.min.css" rel="stylesheet"></link>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>     
    </head>

    <table id="funcionarios_table" class="table table-bordered" style="width:100%">
        <thead>
        <tr>
            <th width="10px"><center>Matricula</center></th>
            <th><center>Nome</center></th>
            <th><center>Instrutor</center></th>
            <th><center>Cargo</center></th>
            <th><center>Setor</center></th>
            <th><center>Departamento</center></th>
            <th width="20px"><center>Situação</center></th>
            <th width="115px"><center>Ações</center></th>
        </tr>
        </thead>
    </table>

    <!--Centralização das variáveis do datatable-->
    <style type="text/css">
        .uniqueClassName {
        text-align: center;
    }
    /*Adicionar: , className: "uniqueClassName" após a variável;
    </style>

<script type="text/javascript">
    $(document).ready(function(){
         $('#funcionarios_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":"{{ route('funcionario.getdata') }}",
            "columns":[
                { "data":  "matricula", className: "uniqueClassName" },
                { "data":  "nome_funcionario", className: "uniqueClassName"},
                { "data":  "instrutor", className: "uniqueClassName"},
                { "data":  "cargos_id", className: "uniqueClassName"},
                { "data":  "cetors_id", className: "uniqueClassName"},
                { "data":  "departamentos_id", className: "uniqueClassName"},
                { "data":  "situacao", className: "uniqueClassName"},
                { "data":  "action", orderable:false, searchable: false, className: "uniqueClassName"}

            ],
            "language":{
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página — <b>Tabela</b>: Funcionários",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    }
                }            
         });    
    });

$(document).on('click', '.delete', function(){
        var id = $(this).attr('id');
        if(confirm("Tem certeza que deseja deletar este funcionário?"))
        {
            $.ajax({
                url:"{{route('funcionario.destroy')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#funcionarios_table').DataTable().ajax.reload();
                }
            })
        }
        else
        {
            return false;
        }
    }); 


</script>
@endsection




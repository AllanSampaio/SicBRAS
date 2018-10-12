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
              <center><h2>Gerenciador de Departamentos</h2></center>              
                <h4>
                    <div align="right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="     .bd-example-modal-lg" >Incluir Departamento</button>
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
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                <form action="{{ route('departamentos.store') }}" method="POST">
                    @csrf
                    <div class="container box box-success">        
                        <br>
                    <div class="row">
                            <div class="col-md-4">
                                <strong>Nome do Novo Departamento:</strong>
                                <input type="text" name="nome_departamento" class="form-control" placeholder="Digite o nome..." required="ON">
                            </div>
                            <div class="col-md-4">
                                <strong> </strong>
                                <center><button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></center>
                            </div>
                            <div class="col-md-4">
                                <strong> </strong>
                                <button type="submit" class="btn btn-sic btn-success btn-block btn-flat ">Enviar</button>
                        </div>
                        </div>
                        <br>
                    </div>
                </form>
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

    <table id="departamentos_table" class="table table-bordered" style="width:100%">
        <thead>
        <tr>
            <th><center>N°</center></th>
            <th><center>Nome do Departamento</center></th>            
            <th><center>Ações</center></th>            
            
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
         $('#departamentos_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax":"{{ route('departamento.getdata') }}",
            "columns":[
                { "data":  "id", className: "uniqueClassName" },
                { "data":  "nome_departamento", className: "uniqueClassName"},
                { "data": "action", orderable:false, searchable: false, className: "uniqueClassName"}

            ],
            "language":{
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página — <b>Tabela</b>: Departamentos",
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
        if(confirm("Tem certeza que deseja deletar este Departamento?"))
        {
            $.ajax({
                url:"{{route('departamento.destroy')}}",
                mehtod:"get",
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    $('#departamentos_table').DataTable().ajax.reload();
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
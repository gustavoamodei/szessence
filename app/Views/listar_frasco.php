<div class="container">
        <div class=" pt-4  col-12">
        <?php $session = \Config\Services::session(); ?>
        <?php if($session->getFlashdata('msg')){?>
                
                
                <div class="alert alert-success alert-dismissible col-md-12 col-12 ">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Sucesso!</h5>
                       <?=$session->getFlashdata('msg');?>
                </div>
                <?php } ?>
                <?php if($session->getFlashdata('erro')){?>
                
            
                <div class="alert alert-danger alert-dismissible col-md-12 col-12  ">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Error!</h5>
                       <?=$session->getFlashdata('erro');?>
                </div>
                <?php } ?>
            <div id="alert_red">
                        
            </div>
            
            <a href="<?= base_url('cadastro_frasco')?>" class="btn btn-success mb-3">Cadastrar</a>
            <h5 class="align-self-center d-flex justify-content-center">Frascos<h5>
            <table class=" table table table-bordered table-hover" id="table_frasco">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php  foreach($query as $frasco){ ?>
                                <tr>
                                    <td><?=$frasco['id']?></td>
                                    <td><?=$frasco['nome']?></td>
                                    <td><?=number_format($frasco['valor'], 2 , ",", "."); ?></td>
                                    <td><?=$frasco['descricao']?></td>
                                    <td>
                                        <a href="<?=base_url('edit_frasco/'.$frasco['id'])?>" class="btn btn-primary">Editar</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeletar">
                                            Excluir
                                        </button>
                                    </td>
                                </tr>
                            <?php }?>
                        
                </tbody>
            </table>
        </div>
    </div>
        <!-- Modal excluir -->
    <div class="modal fade" id="modalDeletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja Excluir?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja Excluir Este registro de ID:<span id="id_frasco"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletar">Apagar!</button>
                </div>
            </div>
        </div>
    </div>
  
<script>
    $(document).ready( function (){
        $('#table_frasco').DataTable(
                {"bJQueryUI": true,
                    "oLanguage": {
                        "sProcessing":   "Processando...",
                        "sLengthMenu":   "Mostrar _MENU_ registros",
                        "sZeroRecords":  "Não foram encontrados resultados",
                        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                        "sInfoFiltered": "",
                        "sInfoPostFix":  "",
                        "sSearch":       "Buscar:",
                        "sUrl":          "",
                        "oPaginate": {
                            "sFirst":    "Primeiro",
                            "sPrevious": "Anterior",
                            "sNext":     "Seguinte",
                            "sLast":     "Último"
                        }
                    },"order" : [ [ 0, 'desc' ] ],
                    
                });
        });



        $(document).on("mouseenter click","#table_frasco>tbody>tr",function(){
        let dados = $('#table_frasco').DataTable().row(this).data();
        $("#id_frasco").text(dados[0]);
    });


    $("#deletar").click(function(){
        var id=$("#id_frasco").text();
      
        $.ajax({
                type:"post",
                url:'<?=base_url()?>/delete_frasco',
                data:{id:id},
                success:function(){
                    $('#alert_red').html( 
                            `<div class="alert alert-success alert-dismissible col-md-4 col-4 float-right ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                        Frasco Deletado com sucesso!!
                        </div>  `).fadeIn(1000).delay(1000).fadeOut(1000);
                    //id=0;
                    var delay=1000; //1 seconds
                    setTimeout(function(){
                        history.go(0);
        //your code to be executed after 1 seconds
                    },delay);
    
                    
        },error:function(){
                    
                $('#alert_red').html( 
                `<div class="alert alert-danger alert-dismissible col-md-4 col-4 float-right ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                erro!!
                </div>  `).fadeIn(3000).delay(2000).fadeOut(4000);
                $(".alert-danger").css("background-color","red");
                        }
        });
            
    });
</script>
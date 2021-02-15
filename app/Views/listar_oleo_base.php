<div class="container">
    <div class="row align-self-center d-flex justify-content-center">
        <div class=" pt-4 col-md-12">
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
            
            <a href="<?= base_url('cadastro_oleo_base')?>" class="btn btn-success mb-3">Cadastrar</a>
            <h5 class="align-self-center d-flex justify-content-center">Óleos Base<h5>
            <div class="table-responsive">
                <table class=" table table-sm table-bordered table-hover" id="table_oleo_base">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">ml agora</th>
                        <th scope="col">ml antes</th>
                        <th scope="col">Preço Ml</th>
                        <th scope="col">Valor compra</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php  foreach($query as $ob){ ?>
                                    <tr>
                                        <td><?=$ob['id']?></td>
                                        <td><?=$ob['nome']?></td>
                                        <td><?=$ob['ml'] ?></td>
                                        <td><?=$ob['ml_antes'] ?></td>
                                        <td><?=number_format($ob['preco_ml'], 2 , ",", "."); ?></td>
                                        <td><?=number_format($ob['valor_compra'], 2 , ",", ".");?></td>
                                        <td><?=date('d/m/Y',strtotime($ob['validade']))?></td>
                                        <td>
                                            <a href="<?= base_url('edit_oleo_base/'.$ob['id']) ?>" class="btn btn-primary">Editar</a>
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
                    Deseja Excluir Este registro de ID:<span id="id_ob"></span>?
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
        $('#table_oleo_base').DataTable(
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



        $(document).on("mouseenter click","#table_oleo_base>tbody>tr",function(){
        let dados = $('#table_oleo_base').DataTable().row(this).data();
        $("#id_ob").text(dados[0]);
    });


    $("#deletar").click(function(){
        var id=$("#id_ob").text();
      
        $.ajax({
                type:"post",
                url:'<?=base_url()?>/delete_oleo_base',
                data:{id:id},
                success:function(){
                    $('#alert_red').html( 
                            `<div class="alert alert-success alert-dismissible col-md-4 col-4 float-right ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                        Óleo Base Deletado com sucesso!!
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
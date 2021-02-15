
<div class="container">
    <div class="row align-self-center d-flex justify-content-center">
        <div class="pt-4  col-12 col-md-12">
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
            <a href="<?= base_url('simulacao')?>" class="btn btn-success mb-3">Nova simulção</a>
            <h5 class="align-self-center d-flex justify-content-center">Orçamentos<h5>
            <div class="table-responsive">
                <table class=" table table table-bordered table-hover table-striped  " id="table_orcamento">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">frasco nome</th>
                        <th scope="col">frasco valor</th>
                        <th scope="col">acessorio nome</th>
                        <th scope="col">acessorio valor</th>
                        <th scope="col"> preço parcial</th>
                       
                        <th scope="col"> margem lucro</th>
                        <th scope="col"> total</th>
                        <th scope="col"> data</th>
                        <th scope="col">ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php  foreach($query as $data){ ?>
                                    <tr>
                                        <td><?=$data['simulacao_id']?></td>
                                        <td><?=$data['cliente_n']?></td>
                                        <td><?=$data['frasco_nome'] ?></td>
                                        <td><?=number_format($data['frasco_valor'], 2 , ",", "."); ?></td>
                                        <td><?=$data['acessorio_nome'] ?></td>
                                        <td><?=number_format($data['acessorio_valor'], 2 , ",", ".");?></td>
                                        <td><?=number_format($data['pp'], 2 , ",", ".");?></td>
                                        <td><?=number_format($data['ml'], 2 , ",", ".");?></td>
                                        <td><?=number_format($data['t'], 2 , ",", ".");?></td>
                                        <td><?=date('d/m/Y',strtotime($data['dt']))?></td>
                                        <td class="form-check form-check-inline">
                                        <div>
                                        <button type="button" class="btn btn-success " id="modalDetalhe" data-toggle="modal" data-target=".bd-example-modal-lg">Detalhes</button>
                                            <a href="<?= base_url('edit_orcamento/'.$data['simulacao_id']) ?>" class="btn btn-primary col-12 ">Editar</a>
                                        </div>
                                        <div>    
                                            <a href="<?= base_url('copiar_orcamento/'.$data['simulacao_id']) ?>" class="btn btn-warning  ">Copiar</a>
                                            <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#modalDeletar">
                                                Excluir
                                            </button>
                                        </div>
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
                    Deseja Excluir Este registro de ID:<span id="id_orcamento"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="deletar">Apagar!</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal grande -->
   

        <div class="modal fade bd-example-modal-lg" id="modalDetalhe" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="myLargeModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="align-self-center d-flex justify-content-center">Detalhes do Orçamento</h5>
                    <div class="row align-self-center d-flex justify-content-center mt-4"> 
                        <div class="col-md-4 col"> 
                            <span id="id_orcamento" style="display:none"></span>
                            <div id="dob1">
                                <label ><b>Óleo base: </b></label>
                                <span id="ob"></span>
                                <label><b>Ml de Óleo base: </b></label>
                                <span id="mlob"></span> 
                            </div>
                            <br>
                            <div id="dob2">
                                <label ><b>Óleo base2: </b></label>
                                <span id="ob2"></span>
                                <label><b>Ml de Óleo base2: </b></label>
                                <span id="mlob2"></span> 
                            </div>
                            <br>
                            <div id="doe1ml%">                           
                                <label><b>ml Óleo Essencial : </b></label>
                                <span id="mloe1"></span>
                                <label><b>ml % Óleo Essencial: </b></label>
                                <span id="mloe11"></span>
                                
                            </div>
                            <br>
                            <div id="doe1">                           
                                <label><b>Óleo Essencial 1: </b></label>
                                <span id="oe1"></span>
                                <label><b>Gotas Óleo Essencial 1: </b></label>
                                <span id="ge1"></span>
                                
                            </div>
                            <br>
                            <div  id="doe2">
                                <label><b>Óleo Essencial 2: </b></label>
                                <span id="oe2"></span>
                                <label><b>Gotas Óleo Essencial 2: </b></label>
                                <span id="ge2"></span>
                            </div>
                            <br>
                           
                
                        </div>
                        <div class="col-md-4 col"> 
                            
                            <span id="id_orcamento" style="display:none"></span>
                            <div  id="doe3">
                                <label><b>Óleo Essencial 3: </b></label>
                                <span id="oe3"></span>
                                <label><b>Gotas Óleo Essencial 3: </b></label>
                                <span id="ge3"></span>
                            </div>
                            <br>
                            <div  id="doe4">
                                <label><b>Óleo Essencial 4: </b></label>
                                <span id="oe4">óleo maluco</span>
                               <label><b>Gotas Óleo Essencial 4: </b></label>
                                <span id="ge4"></span>
                                
                            </div>
                            <br>
                            <div  id="doe5">
                                <label><b>Óleo Essencial 5: </b></label>
                                <span id="oe5">óleo maluco</span>
                                <label><b>Gotas Óleo Essencial 5: </b></label>
                                <span id="ge5"></span>
                            </div>
                            <br>
                            <div  id="doe6">
                                <label><b>Óleo Essencial 6: </b></label>
                                <span id="oe6">óleo maluco</span>
                                <label><b>Gotas Óleo Essencial 6: </b></label>
                                <span id="ge6"></span>
                            </div>
                           <br>
                            <div  id="doe6">
                                <label><b>Lucro % </b></label>
                                <span id="lucro">óleo maluco</span>
                                <br>
                                <label><b>Simulação </b></label>
                                <span id="ns"></span>
                            </div>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
  
<script>
    $(document).ready( function (){
        $('#table_orcamento').DataTable(
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



        $(document).on("mouseenter click","#table_orcamento>tbody>tr",function(){
            let dados = $('#table_orcamento').DataTable().row(this).data();
            $("#id_orcamento").text(dados[0]);
         });

    $('.bd-example-modal-lg').on('show.bs.modal', function (e) {
           
        var id=$("#id_orcamento").text();
       
           $.ajax({
                   type: "post",
                   url: '<?= base_url()?>/Simulacao_controller/orcamento_by_id',
                   data:{id:id},
                   dataType:' json ',
                   success: function(data) {
                    if(data.oleo_essencial1 === ""){
                        data.oleo_essencial1 = " - ";
                        data.ge1 = " - ";
                     }  
                     if(data.oleo_essencial2 === ""){
                        data.oleo_essencial2 = " - ";
                        data.ge2 = " - ";
                     }
                     if(data.oleo_essencial3 === ""){
                        data.oleo_essencial3 = " - ";
                        data.ge3 = " - ";
                     }
                     if(data.oleo_essencial4 === ""){
                        data.oleo_essencial4 = " - ";
                        data.ge4 = " - ";
                     }
                     if(data.oleo_essencial5 === ""){
                        data.oleo_essencial5 = " - ";
                        data.ge5 = " - ";
                     }
                     if(data.oleo_essencial6 === ""){
                        data.oleo_essencial6 = " - ";
                        data.ge6 = " - ";
                     }if(data.nome_oleo_base2 == " "){
                        data.nome_oleo_base2 = " - ";
                        data.ml_oleo_base2 = " - ";
                     }
                    $("#ob").text(data.nome);
                    $("#mlob").text(data.ml_oleo_base);
                    $("#oe1").text(data.oleo_essencial1);
                    $("#ge1").text(data.ge1);
                    $("#oe2").text(data.oleo_essencial2);
                    $("#ge2").text(data.ge2);
                    $("#oe3").text(data.oleo_essencial3);
                    $("#ge3").text(data.ge3);
                    $("#oe4").text(data.oleo_essencial4);
                    $("#ge4").text(data.ge4);
                    $("#oe5").text(data.oleo_essencial5);
                    $("#ge5").text(data.ge5);
                    $("#oe6").text(data.oleo_essencial6);
                    $("#ge6").text(data.ge6);
                    $("#mlob2").text(data.ml_oleo_base2);
                    $("#ob2").text(data.nome_oleo_base2);
                    $("#mloe1").text(data.ml_o_essencial);
                    $("#mloe11").text(data.mloe_por_cento);
                    $("#lucro").text(data.lucro);
                    $("#ns").text(data.nome_simulacao);

                   }, error: function(){
                       alert('Ocorreu um erro parece que não há conexão com a internet');
                       
                   }
           });           
       });

    $("#deletar").click(function(){
        var id=$("#id_orcamento").text();
      
        $.ajax({
                type:"post",
                url:'<?=base_url()?>/delete_orcamento',
                data:{id:id},
                success:function(){
                    $('#alert_red').html( 
                            `<div class="alert alert-success alert-dismissible col-md-4 col-4 float-right ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                        Orçamento Deletado com sucesso!!
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
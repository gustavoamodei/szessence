
<div class="container">
        <div class="pt-4  col-12 col-md-12">
     
            
            <h5 class="align-self-center d-flex justify-content-center">Tabela Óleos<h5>
            <div class="table-responsive">
                <table class=" table table table-bordered table-hover" id="table_orcamento">
                    <thead class="thead-dark">
                        <tr>
                        
                        <th scope="col">nome</th>
                        <th scope="col">ml</th>
                        <th scope="col">gotas_total</th>
                        <th scope="col">gotas_ml</th>
                        <th scope="col">valor</th>
                        <th scope="col">preço gota</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php  foreach($query as $data){ ?>
                                    <tr>
                                        
                                        <td><?=$data['nome']?></td>
                                        <td><?=$data['ml'] ?></td>
                                        <td><?=$data['gotas_total'] ?></td>
                                        <td><?=$data['gotas/ml'] ?></td>
                                        <td><?=$data['Valor'] ?></td>
                                        <td><?=$data['preco_por_gotas'] ?></td>
                                        
                                    </tr>
                                <?php }?>
                            
                    </tbody>
                </table>
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
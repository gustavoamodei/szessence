
<div class="container">
        <div class="pt-4  col-12 col-md-12">
     
            
            <h5 class="align-self-center d-flex justify-content-center">Tabela Frasco/Acessórios<h5>
            <table class=" table table table-bordered table-hover" id="table_orcamento">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">DESCRIÇÃO DO FRASCO</th>
                    <th scope="col">PREÇO/ UNIDADE (R$)</th>
                    <th scope="col">ACESSÓRIOS</th>
                    <th scope="col">PREÇO/ UNIDADE (R$)</th>
                  
                    </tr>
                </thead>
                <tbody>
                    
                        <?php  foreach($query as $data){ ?>
                                <tr>
                                    <td><?=$data['COL 1']?></td>
                                    <td><?=$data['COL 2']?></td>
                                    <td><?=$data['COL 5'] ?></td>
                                    <td><?=$data['COL 6'] ?></td>
                                </tr>
                            <?php }?>
                        
                </tbody>
            </table>
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
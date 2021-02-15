<?php
  use App\Models\Simulacao_Model;
  use App\Models\Oessencial_model;

    if(isset($simulacao['simulacao_id'])){
      
        $model= new Simulacao_Model();
        $data3 =[
       'oess'=>$model->get_oe_by_id($simulacao['id_oleo_essencial1']),
       'oess2'=>$model->get_oe_by_id($simulacao['id_oleo_essencial2']),
       'oess3'=>$model->get_oe_by_id($simulacao['id_oleo_essencial3']),
       'oess4'=>$model->get_oe_by_id($simulacao['id_oleo_essencial4']),
       'oess5'=>$model->get_oe_by_id($simulacao['id_oleo_essencial5']),
       'oess6'=>$model->get_oe_by_id($simulacao['id_oleo_essencial6']),
       'obase2'=>$model->get_oleo_base_by_id($simulacao['id_oleo_base2']),
        ];
    }

?>
<?php if(isset($simulacao['simulacao_id'])){?>
    
    <form method="post" name="frmAdd" action="<?php echo site_url('calculo');?>">
        <h5 class="align-self-center d-flex justify-content-center mt-5">Cópia de Simulação </h5>
    
        <div class="row  align-self-center d-flex justify-content-center">
            <div class="col-10 col-md-4">
                
                <div class="form-group">
                    <label>Nome Da Simulação</label>
                    <input type="text" name="nome_simulacao" class="form-control" value="<?=$simulacao['nome_simulacao']?>">
                </div>
            
                <div class="form-group">
                    
                    <label> Ml de Óleo Essencial</label>
                    <input type="number"  class="form-control" name="ml_o_essencial" value="<?=$simulacao['ml_o_essencial']?>" id="ml_o_essencial" min="0" max="1000" required>
                    
                </div>
                <div class="form-group"> 
                    <label> % Ml De Óleo Essencial</label> 
                    <input type="text"  placeholder="0 a 100" pattern="[0-9.]+$" class="form-control" value="<?=$simulacao['mloe_por_cento']?>"  name="mloe_por_cento" id="mloe_por_cento" required>
                </div>
                <div class="form-group"> 
                    <label> Total de Gotas de Óleo Essencial:</label>
                    <input type="number"  class="form-control" name="total_gotas_oe" id="total_gotas_oe" value="0" readonly >
                    <span id="erro_gotas_distribuidas"></span> <span id="erro_gotas_distribuidas2"></span>
                </div>
                <div class="form-group">
                    <label> Frasco</label>
                    <select id="select" class="custom-select" name="frasco" id="frasco" required>
                    <option value="<?=$simulacao['id_frasco']." - ".$simulacao['frasco_valor']?>" selected><?= "Frasco: ".$simulacao['frasco_nome'] ?></option>
                        <?php foreach($query3 as $frasco){?>
                            <option value="<?=$frasco['id']." - ".$frasco['valor']?>"><?= "Frasco: ".$frasco['nome'] ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Óleo base</label>
                    <select  class="custom-select" name="oleo_base" id="oleo_base" required>
                    <option value="<?=$simulacao['id_oleo_base']." - ".$simulacao['preco_ml']." - ".$simulacao['nome_oleo_base'] ?>" selected><?= "Óleo Base/ml: ".$simulacao['nome_oleo_base']." / ".$simulacao['ml'] ?></option>
                        <?php foreach($query4 as $ob){?>
                            <option value="<?=$ob['id']." - ".$ob['preco_ml']." - ".$ob['nome']?>"><?= "Óleo Base/ml: ".$ob['nome']." / ".$ob['ml'] ?></option>
                        <?php } ?>  
                    </select> 
                </div>
                <div class="form-group">
                    <label> Ml de Óleo base</label>
                    <input type="number"  class="form-control" name="ml_oleo_base" id="ml_oleo_base" min="0" max="1000" value="<?=$simulacao['ml_ob']?>" required>
                    <span id="msgmlob"></span>
                </div>
                <div class="form-group">
                    <label> Óleo base 2</label>
                    <select  class="custom-select" name="oleo_base2" id="oleo_base2">
                    <option value="<?=$data3['obase2']['id']." - ".$data3['obase2']['preco_ml']." - ".$data3['obase2']['nome'] ?>" selected><?= "Óleo Base/ml: ".$data3['obase2']['nome']." / ".$data3['obase2']['ml'] ?></option>
                        <?php foreach($query4 as $ob){?>
                            <option value="<?=$ob['id']." - ".$ob['preco_ml']." - ".$ob['nome']?>"><?= "Óleo Base/ml: ".$ob['nome']." / ".$ob['ml'] ?></option>
                        <?php } ?>  
                    </select> 
                </div>
                <div class="form-group">
                    <label> Ml de Óleo base 2</label>
                    <input type="number"  class="form-control" name="ml_oleo_base2" id="ml_oleo_base2" min="0" max="1000" value="<?=$simulacao['ml_ob2']?>">
                    <span id="msgmlob2"></span>
                </div>
                <div class="form-group">
                <label>Óleo Essencial 1</label>
                    <select id="oe1" class="custom-select" name="oleo_essencial_1" id="Essencial_1">
                    <option value="<?=$simulacao['id_oleo_essencial1']." - ".$data3['oess']['preco_gota']." - ".$simulacao['oleo_essencial1']?>"selected><?= "Óleo Essencial/gotas: ".$simulacao['oleo_essencial1']." - ".$data3['oess']['total_gotas'] ?></option>
                        <?php foreach($query5 as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['preco_gota']." - ".$cliente['nome']?>"><?= "Óleo Essencial/gotas: ".$cliente['nome']." - ".$cliente['total_gotas'] ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Gota de Óleo Essencial 1</label>
                    <input type="number"  class="form-control" name="gota_essencial_1" value="<?=$simulacao['ge11']?>" min="0" max="1000" id="goe1" required>
                    <span id="msggoe1"></span>
                </div>
                <div class="form-group">
                    <label>Óleo Essencial 2</label>
                    <select id="oe2" class="custom-select" name="oleo_essencial_2" id="Essencial_2">
                    <option value="<?=$simulacao['id_oleo_essencial2']." - ".$data3['oess2']['preco_gota']." - ".$simulacao['oleo_essencial2']?>"selected><?= "Óleo Essencial/gotas: ".$simulacao['oleo_essencial2']." - ".$data3['oess2']['total_gotas'] ?></option>
                        <?php foreach($query5 as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['preco_gota']." - ".$cliente['nome']?>"><?= "Óleo Essencial/gotas: ".$cliente['nome']." - ".$cliente['total_gotas'] ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Gota de Óleo Essencial 2</label>
                    <input type="number"  class="form-control" name="gota_essencial_2" min="0" max="1000" value="<?=$simulacao['ge22']?>" id="goe2">
                    <span id="msggoe2"></span>     
                </div>
                
            </div><!-- coluna 1 --> 

            <div class="col-10 col-md-4">        
                <div class="form-group">
                    <label>Óleo Essencial 3</label>
                    <select id="oe3" class="custom-select" name="oleo_essencial_3">
                    <option value="<?=$simulacao['id_oleo_essencial3']." - ".$data3['oess3']['preco_gota']." - ".$simulacao['oleo_essencial3']?>"selected><?= "Óleo Essencial/gotas: ".$simulacao['oleo_essencial3']." - ".$data3['oess3']['total_gotas'] ?></option>
                   
                        <?php foreach($query5 as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['preco_gota']." - ".$cliente['nome']?>"><?= "Óleo Essencial/gotas: ".$cliente['nome']." - ".$cliente['total_gotas'] ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Gota de Óleo Essencial 3</label>
                    <input type="number"  class="form-control" name="gota_essencial_3" min="0" value="<?=$simulacao['ge33']?>" max="1000" id="goe3">
                    <span id="msggoe3"></span>
                </div>
                <div class="form-group">
                    <label>Óleo Essencial 4</label>
                    <select id="oe4" class="custom-select" name="oleo_essencial_4">
                    <option value="<?=$simulacao['id_oleo_essencial4']." - ".$data3['oess4']['preco_gota']." - ".$simulacao['oleo_essencial4']?>"selected><?= "Óleo Essencial/gotas: ".$simulacao['oleo_essencial4']." - ".$data3['oess4']['total_gotas'] ?></option>
                        <?php foreach($query5 as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['preco_gota']." - ".$cliente['nome']?>"><?= "Óleo Essencial/gotas: ".$cliente['nome']." - ".$cliente['total_gotas'] ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Gota de Óleo Essencial 4</label>
                    <input type="number"  class="form-control" name="gota_essencial_4" min="0" max="1000" value="<?=$simulacao['ge44']?>" id="goe4">
                    <span id="msggoe4"></span>
                </div>
                <div class="form-group">
                    <label>Óleo Essencial 5</label>
                    <select id="oe5" class="custom-select" name="oleo_essencial_5">
                    <option value="<?=$simulacao['id_oleo_essencial5']." - ".$data3['oess5']['preco_gota']." - ".$simulacao['oleo_essencial4']?>"selected><?= "Óleo Essencial/gotas: ".$simulacao['oleo_essencial4']." - ".$data3['oess5']['total_gotas'] ?></option>
                        <?php foreach($query5 as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['preco_gota']." - ".$cliente['nome']?>"><?= "Óleo Essencial/gotas: ".$cliente['nome']." - ".$cliente['total_gotas'] ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Gota de Óleo Essencial 5</label>
                    <input type="number"  class="form-control" name="gota_essencial_5" min="0" max="1000" value="<?=$simulacao['ge55']?>" id="goe5">
                    <span id="msggoe5"></span>
                </div>
                <div class="form-group">
                    <label>Óleo Essencial 6</label>
                    <select id="oe6" class="custom-select" name="oleo_essencial_6"   >
                        <option value="<?=$simulacao['id_oleo_essencial6']." - ".$data3['oess6']['preco_gota']." - ".$simulacao['oleo_essencial6']?>"selected><?= "Óleo Essencial/gotas: ".$simulacao['oleo_essencial6']." - ".$data3['oess6']['total_gotas'] ?></option>
                        <option value=""  selected>Escolher...</option>
                        <?php foreach($query5 as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['preco_gota']." - ".$cliente['nome']?>"><?= "Óleo Essencial/gotas: ".$cliente['nome']." - ".$cliente['total_gotas']  ?></option>
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Gota de Óleo Essencial 6</label>
                    <input type="number"  class="form-control" name="gota_essencial_6" min="0" max="1000" value="<?=$simulacao['ge66']?>" id="goe6">
                    <span id="msggoe6"></span>
                </div>
                <div class="form-group">
                    <label>lucro %</label>
                    <input type="number"  class="form-control" name="porcentagem_lucro" value="<?=$simulacao['l']?>" min="1" max="1000" required>
                </div> 
                <div class="form-group">
                    <label> Acessório</label>
                    <select id="select" class="custom-select" name="acessorio" id="acessorio">
                    <option value="<?= $simulacao['id_acessorio']." - ".$simulacao['acessorio_valor']?>" selected><?= "Acessorio: ".$simulacao['acessorio_nome']?></option>
                        <?php foreach($query2 as $acessorio){?>
                            <option value="<?=$acessorio['id']." - ".$acessorio['valor']?>"><?= "Acessorio: ".$acessorio['nome']?></option>
                            
                        <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Cliente</label>
                    <select id="select" class="custom-select" name="cliente">
                             <option value="<?= $simulacao['id_cliente']." - ".$simulacao['cliente_n'] ?>"  selected><?= "Cliente: ".$simulacao['id_cliente']." - ".$simulacao['cliente_n']?></option>
                            <?php foreach($query as $cliente){?>
                            <option value="<?=$cliente['id']." - ".$cliente['nome']?>"><?= "Cliente: ".$cliente['id']." - ".$cliente['nome'] ?></option>
                                
                            <?php } ?>  
                    </select>
                </div>
                <div class="form-group">
                    <label> Data do Orçamento</label>
                    <input type="date" class="form-control"   name="validade" value="<?=$simulacao['dt']?>"  required>
                </div>
               
            </div><!-- coluna 2 --> 
            <div class="row col-md-6">
                
                <button type="submit" class="btn btn-primary  btn-block " id="btn">Calcular</button>
            </div> 
                
          
            </div>  
            </div>
            <label id="#display"></label>
           
        </div> <!-- row --> 
    </form>

    <?php }else{ ?>            
    <h3>sem orçamentos!</h3>

    <?php } ?>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#total_gotas_oe').css('background-color','white');
        $('#mloe_por_cento').focus();
        $('#btn').on("click",function(){
            
            var total_ml = $('#oleo_base option:selected').text();
            var ml_faltante = total_ml.split(' / ').valueOf();
            var ml = parseInt($('#ml_oleo_base').val());
            

            if(ml >  ml_faltante[1]){
                
                $('#msgmlob').text("sem gotas de óleo base 1 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msgmlob').text("")
            }


            var total_ml2 = $('#oleo_base2 option:selected').text();
            var ml_faltante2 = total_ml2.split(' / ').valueOf();
            var ml2 = parseInt($('#ml_oleo_base2').val());
            

            if(ml2 >  ml_faltante2[1]){
                
                $('#msgmlob2').text("sem gotas de óleo base 2 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msgmlob2').text("")
            }
            
            
            var total_gotas = $('#oe1 option:selected').text();
            var tg=total_gotas.split(' - ').valueOf();
            var gotas = parseInt($('#goe1').val());
            

            if(gotas >  tg[1]){
                
                $('#msggoe1').text("sem gotas de oleo essencial 1 suficiente.").css("color","red");
                
                event.preventDefault();
            }else{
                $('#msggoe1').text("")
            }
            var total_gotas2 = $('#oe2 option:selected').text();
            var tg2=total_gotas2.split(' - ').valueOf();
            var gotas2 = parseInt($('#goe2').val());
            

            if(gotas2 >  tg2[1]){
                
                $('#msggoe2').text("sem gotas de oleo essencial 2 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msggoe2').text("")
            }
            var total_gotas3 = $('#oe3 option:selected').text();
            var tg3=total_gotas3.split(' - ').valueOf();
            var gotas3 = parseInt($('#goe3').val());
            

            if(gotas3 >  tg3[1]){
                
                $('#msggoe3').text("sem gotas de oleo essencial 3 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msggoe3').text("")
            }
            var total_gotas4 = $('#oe4 option:selected').text();
            var tg4=total_gotas4.split(' - ').valueOf();
            var gotas4 = parseInt($('#goe4').val());
            

            if(gotas4 >  tg4[1]){
                
                $('#msggoe4').text("sem gotas de oleo essencial 4 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msggoe4').text("")
            }
            var total_gotas5 = $('#oe5 option:selected').text();
            var tg5=total_gotas5.split(' - ').valueOf();
            var gotas5 = parseInt($('#goe5').val());
            

            if(gotas5 >  tg5[1]){
                
                $('#msggoe5').text("sem gotas de oleo essencial 5 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msggoe5').text("")
            }
            var total_gotas6 = $('#oe6 option:selected').text();
            var tg6=total_gotas6.split(' - ').valueOf();
            var gotas6 = parseInt($('#goe6').val());
            

            if(gotas6 >  tg6[1]){
                
                $("#msggoe6").text("sem gotas de oleo essencial 6 suficiente.").css("color","red");
                event.preventDefault();
            }else{
                $('#msggoe6').text("")
            }
            var calculo_total_gotas =$("#total_gotas_oe").val()  ===""? 0:parseInt($('#total_gotas_oe').val());
            


            var gotas = $('#goe1').val();
            var gotas2 = $('#goe2').val() ===""? 0:$('#goe2').val();
            var gotas3 = $('#goe3').val() ===""? 0:$('#goe3').val();;
            var gotas4 = $('#goe4').val() ===""? 0:$('#goe4').val(); ;
            var gotas5 = $('#goe5').val() ===""? 0:$('#goe5').val();;
            var gotas6 = $('#goe6').val() ===""? 0:$('#goe6').val();;
        

    var gotas_input = (parseInt(gotas) + parseInt(gotas2) + parseInt(gotas3) + parseInt(gotas4)+parseInt(gotas5)+parseInt(gotas6)) ;
            if(calculo_total_gotas < gotas_input){
               // alert("total de gotas  colocadas  = "+gotas_input+ " total de gotas  estimadas =" +calculo_total_gotas   );
               var  falta = calculo_total_gotas - gotas_input ;
              // alert("colocar : " +falta+ " gotas" );
              if(falta < 0){
                    aux= " Retirar ";
                    txt = " G.Eestimadas: "+ calculo_total_gotas + " / G.Adicionadas: "+ gotas_input  ;
                    $("#erro_gotas_distribuidas").text(txt).css('color',"red");
                    $("#erro_gotas_distribuidas2").text(aux+Math.abs(falta)+ " /  G.Faltantes").css('color',"red");
                    
                    $('#total_gotas_oe').focus();
                   
                    event.preventDefault();
                }
                
            }if(calculo_total_gotas > gotas_input){
                var  falta = calculo_total_gotas - gotas_input ;
                if((falta > 0)){
                    aux= " Colocar ";
                    txt = " G.Eestimadas: "+ calculo_total_gotas + " / G.Adicionadas: "+ gotas_input  ;
                    $("#erro_gotas_distribuidas").text(txt).css('color',"red");
                    $("#erro_gotas_distribuidas2").text(aux+Math.abs(falta)+ " /  G.Faltantes").css('color',"red");
                    $("#total_gotas_oe").focus();
                    event.preventDefault();
                }
                
            }   
            
        });
        
        
        $("#mloe_por_cento").on('change',function(){
            var ml_oe= $("#ml_o_essencial").val();
            var porcentage_oe = $("#mloe_por_cento").val();
            
            var total_gotas = porcentage_oe * 24;
            $("#total_gotas_oe").val(total_gotas);


        });
        $("#mloe_por_cento").on('blur',function(){
            var ml_oe= $("#ml_o_essencial").val();
            var porcentage_oe = $("#mloe_por_cento").val();
            
            var total_gotas = porcentage_oe * 24;
            $("#total_gotas_oe").val(total_gotas);


        });
    });
</script>
<?php
//echo $nome_frasco;
//echo"<br>"; echo"<br>"; echo"<br>";
$data_cliente = explode(" - ",$cliente);
 //echo "nome cliente = ".  $data_cliente[1] ;
 //echo"<br>";
 //echo var_dump($acessorio);
 $data_acessorio = explode(" - ", $acessorio);
 //echo "acessorio valor = ". $data_acessorio[1]; // piece1
 //echo"<br>";
 $data_frasco = explode(" - ", $frasco);
 //echo "frasco valor = ".  $data_frasco[1];
 //echo"<br>";
 $valor_oleo_base = explode(" - ", $oleo_base);
 $valor_oleo_base2 = explode(" - ", $oleo_base2);
 //echo "oleo base valor = ". $valor_oleo_base[1];
 //echo"<br>";
 //echo "quantidade de ml oleo base = ". $ml_oleo_base;
 //echo"<br>";
 $oleo_essencial_1 = explode(" - ",  $oleo_essencial_1);
 //echo "oleo essencial 1 = ". $oleo_essencial_1[2];
 //echo"<br>";
 //echo "quantidade de gota oleo essencial 1 = ".$gota_essencial_1;
 //echo"<br>";
 
 $oleo_essencial_2 = explode(" - ",  $oleo_essencial_2);
 //echo "oleo essencial 2 = ". $oleo_essencial_2[1];
// echo"<br>";
 //echo "quantidade de gota oleo essencial 2 = ".$gota_essencial_1;$gota_essencial_2;
 //echo"<br>";
 $oleo_essencial_3 = explode(" - ",  $oleo_essencial_3);
 //echo "oleo essencial 3 = ".$oleo_essencial_3[1];
 //echo"<br>";
 //echo "quantidade de gota oleo essencial 3 = ".$gota_essencial_3;
 //echo"<br>";
 $oleo_essencial_4 = explode(" - ",  $oleo_essencial_4);
 //echo" oleo essencial 4 = ". $oleo_essencial_4[1];
 //echo"<br>";
 //echo "quantidade de gota oleo essencial 4 = ".$gota_essencial_4;
 //echo"<br>";
 $oleo_essencial_5 = explode(" - ",  $oleo_essencial_5);
 //echo "oleo essencial 5 = ".$oleo_essencial_5[1];
 //echo"<br>";
 //echo "quantidade de gota oleo essencial 5 = ".$gota_essencial_5;
 //echo"<br>";
 $oleo_essencial_6 = explode(" - ",  $oleo_essencial_6);
 //echo "oleo essencial 6 = ".$oleo_essencial_6[1];
 //echo"<br>";
 //echo "quantidade de gota oleo essencial 6 = ".$gota_essencial_6;
 //echo"<br>";
 //echo "porcentagem de lucro preenchida por mim " .$porcentagem_lucro."%";
 //echo"<br>";
 //echo"=================================================";
    
    $preco_parcial = ((float)$valor_oleo_base[1] * (float)$ml_oleo_base)+((float)$valor_oleo_base2[1] * (float)$ml_oleo_base2) + ((float)$oleo_essencial_1[1] * (float)$gota_essencial_1)
    +((float)$oleo_essencial_2[1] * (float)$gota_essencial_2)+((float)$oleo_essencial_3[1] * (float)$gota_essencial_3)
    +((float)$oleo_essencial_4[1] * (float)$gota_essencial_4)+((float)$oleo_essencial_5[1] * (float)$gota_essencial_5)
    +((float)$oleo_essencial_6[1] * (float)$gota_essencial_6)
    + ((float)$data_acessorio[1] + (float)$data_frasco[1]);
    //echo"<br>";
    //echo "preço parcial = ". $preco_parcial;
    $margem_lucro = ($preco_parcial * ($porcentagem_lucro/100));
    //echo"<br>";
    //echo "margem lucro = ". $margem_lucro;
    //echo"<br>";
    $preco_total= $preco_parcial+$margem_lucro;
    //echo "preço total= ". $preco_total;

 ?>
 

<!DOCTYPE html>
<html>
    <head>
        <title>Cálculo</title>
    </head>

    <body>
        <div class="container">
            <form method="post"  action="<?php echo site_url('store_simulacao');?>">
                    <div class="row align-self-center d-flex justify-content-center mt-4"> 
                        <div class="col-md-10 col"> 
                            <div class="card text-center">
                                <div class="card-header">
                                Data: <?= date('d/m/Y',strtotime($validade))?>
                                </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Orçamento</h5>
                                        <label><b>Nome do Cliente:</b> </label>
                                        <span id="no_cliente" ><?=$data_cliente[1] == "" ? "-" : $data_cliente[1]?></span>
                                        <br>
                                        <label><b>Nome da Simulação:</b> </label>
                                        <span id="nome_simulacao" ><?=$nome_simulacao?></span>
                                        <input type="hidden" name="nome_simulacao" value="<?=$nome_simulacao?>">
                                        <input type="hidden" name="oleo_essencial1" value="<?=$oleo_essencial_1[2];?>">
                                        <input type="hidden" name="oleo_essencial2" value="<?=$oleo_essencial_2[2];?>">
                                        <input type="hidden" name="oleo_essencial3" value="<?=$oleo_essencial_3[2];?>">
                                        <input type="hidden" name="oleo_essencial4" value="<?=$oleo_essencial_4[2];?>">
                                        <input type="hidden" name="oleo_essencial5" value="<?=$oleo_essencial_5[2];?>">
                                        <input type="hidden" name="oleo_essencial6" value="<?=$oleo_essencial_6[2];?>">
                                        
                                        <input type="hidden" name="id_cliente" value="<?=(int)$data_cliente[0] == "" ? 4:$data_cliente[0]?>">
                                        <input type="hidden" name="data" value="<?=$validade?>">
                                        </br>
                                        <label><b>Ml Óleo Essencial:</b> </label>
                                        <span ><?=$ml_o_essencial?></span>
                                        <input type="hidden" name="ml_o_essencial" value="<?=$ml_o_essencial?>">
                                        <br>
                                        <label><b>Ml Óleo Essencial:</b> </label>
                                        <span ><?=$mloe_por_cento?></span>
                                        <input type="hidden" name="mloe_por_cento" value="<?=$mloe_por_cento?>">
                                        <br>
                                        <label><b>Nome Frasco:</b> </label>
                                        <span><?=$nome_frasco.'- R$ '. number_format($data_frasco[1], 2 , ",", ".");?></span>
                                        </br>
                                        <input type="hidden" name="id_frasco" value="<?=$data_frasco[0]?>">
                                        <label><b>Nome Acessorio: </b></label>
                                        <span><?=$nome_acessorio.'- R$ '. number_format($data_acessorio[1], 2 , ",", ".")?></span>
                                        </br>
                                        <input type="hidden" name="id_acessorio" value="<?=$data_acessorio[0]?>">
                                        <label><b>Óleo base: </b></label>
                                        <span><?=$valor_oleo_base[2].' - R$ '.number_format($valor_oleo_base[1], 2 , ",", ".")?></span>
                                        <input type="hidden" name="nome_oleo_base" value="<?=$valor_oleo_base[2]?>">
                                        </br>
                                        <input type="hidden" name="id_oleo_base" value="<?=$valor_oleo_base[0]?>">
                                        <label><b>Ml de Óleo base: </b></label>
                                        <span><?=$ml_oleo_base?></span>
                                        </br>
                                        <input type="hidden" name="ml_oleo_base" value="<?=$ml_oleo_base?>">
                                        
                                        <label><b>Óleo base 2: </b></label>
                                        <span><?=$valor_oleo_base2[2].' - R$ '.number_format($valor_oleo_base2[1], 2 , ",", ".")?></span>
                                        <input type="hidden" name="nome_oleo_base2" value="<?=$valor_oleo_base2[2]?>">
                                        <br>

                                        <input type="hidden" name="id_oleo_base2" value="<?=$valor_oleo_base2[0]?>">
                                        <label><b>Ml de Óleo base 2: </b></label>
                                        <span><?=$ml_oleo_base2?></span>
                                        
                                        <input type="hidden" name="ml_oleo_base2" value="<?=$ml_oleo_base2?>">

                                        <br>
                                        <label><b>Óleo Essencial1: </b></label>
                                        <span><?=$oleo_essencial_1[2].' - R$ '.number_format($oleo_essencial_1[1], 2 , ",", ".")." - Gotas: ".$gota_essencial_1 ?></span>
                                        </br>
                                        <input type="hidden" name="id_oleo_essencial1" value="<?=$oleo_essencial_1[0]?>">
                                        <?php if($oleo_essencial_2[0] != "0"){ ?>
                                        <label><b>Óleo Essencial2: </b></label>
                                        <span><?=$oleo_essencial_2[2].' - R$ '.number_format($oleo_essencial_2[1], 2 , ",", ".")." - Gotas: ".$gota_essencial_2 ?></span>
                                        </br>
                                        <input type="hidden" name="id_oleo_essencial2" value="<?=$oleo_essencial_2[0]?>">
                                        <?php } ?>
                                        <?php if($oleo_essencial_3[0] != "0"){ ?>
                                        <label><b>Óleo Essencial3: </b></label>
                                        <span><?=$oleo_essencial_3[2].' - R$ '.number_format($oleo_essencial_3[1], 2 , ",", ".")." - Gotas: ".$gota_essencial_3 ?></span>
                                        </br>
                                        <input type="hidden" name="id_oleo_essencial3" value="<?=$oleo_essencial_3[0]?>">
                                        <?php } ?>
                                        <?php if($oleo_essencial_4[0] != "0"){ ?>
                                        <label><b>Óleo Essencial4: </b></label>
                                        <span><?=$oleo_essencial_4[2].' - R$ '.number_format($oleo_essencial_4[1], 2 , ",", ".")." - Gotas: ".$gota_essencial_4 ?></span>
                                        </br>
                                        <input type="hidden" name="id_oleo_essencial4" value="<?=$oleo_essencial_4[0]?>">
                                        <?php } ?>
                                        <?php if($oleo_essencial_5[0] != "0"){ ?>
                                        <label><b>Óleo Essencial5: </b></label>
                                        <span><?=$oleo_essencial_5[2].' - R$ '.number_format($oleo_essencial_5[1], 2 , ",", ".")." - Gotas: ".$gota_essencial_5 ?></span>
                                        </br>
                                        <input type="hidden" name="id_oleo_essencial5" value="<?=$oleo_essencial_5[0]?>">
                                        <?php } ?>
                                        <?php if($oleo_essencial_6[0] != "0"){ ?>
                                        <label><b>Óleo Essencial6: </b></label>
                                        <span><?=$oleo_essencial_6[2].' - R$ '.number_format($oleo_essencial_6[1], 2 , ",", ".")." - Gotas: ".$gota_essencial_6 ?></span>
                                        
                                        <input type="hidden" name="id_oleo_essencial6" value="<?=$oleo_essencial_6[0]?>">

                                        </br>
                                        <?php } ?>
                                        <label><b>Preço parcial: </b></label>
                                        <span><?=' - R$ '.number_format($preco_parcial, 2 , ",", ".")?></span>
                                        </br>
                                        <input type="hidden" name="preco_parcial" value="<?=$preco_parcial?>">
                                        <input type="hidden" name="margem_lucro" value="<?=$margem_lucro?>">
                                        <label><b>Margem de lucro: </b></label>
                                        <span><?=' - R$ '.number_format($margem_lucro, 2 , ",", ".")?></span>
                                        </br>
                                        <label><b>Lucro %:</b> </label>
                                        <span><?=$porcentagem_lucro?></span>
                                        </br>
                                        <label><b>Preço Total:</b> </label>
                                        <span><?=' - R$ '.number_format($preco_total, 2 , ",", ".")?></span>
                                        </br>
                                        <input type="hidden" name="preco_total" value="<?=$preco_total?>">
                                        <input type="hidden" name="ge1" value="<?=$gota_essencial_1?>">
                                        <input type="hidden" name="ge2" value="<?=$gota_essencial_2?>">
                                        <input type="hidden" name="ge3" value="<?=$gota_essencial_3?>">
                                        <input type="hidden" name="ge4" value="<?=$gota_essencial_4?>">
                                        <input type="hidden" name="ge5" value="<?=$gota_essencial_5?>">
                                        <input type="hidden" name="ge6" value="<?=$gota_essencial_6?>">
                                        <input type="hidden" name="lucro" value="<?=$porcentagem_lucro?>">
                                        <input type="hidden" name="id" value="<?=$id?>">
                                       

                                        <button type="submit" class="btn btn-primary  " id="btn">Gravar</button>
                                    </div>
                                    <div class="card-footer ">
                                        Szessence
                                    </div>
                            </div> 
                        </div>     
                    </div>
                </form>
        </div>
    </body>

</html>



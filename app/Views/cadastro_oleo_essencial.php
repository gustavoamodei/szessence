
<?php $validation = \Config\Services::validation();?>
<?=$validation->listErrors(); ?>
    <?php if(isset($id)){ ?>
    
        <form method="post" name="frmAdd" action="<?php echo site_url('store_oleo');?>">
    <h5 class="align-self-center d-flex justify-content-center mt-3"> Edição de óleos Essencial </h5>
    
        <div class="row  align-self-center d-flex justify-content-center">
            <div class="col-10 col-md-5">
            
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?=isset($nome)? $nome : set_value('nome')?>" required>
                </div>
                    
                <div class="form-group">
                    <label>ml</label>
                    <input type="number" class="form-control"  name="ml" value="<?=isset($ml)? $ml : set_value('ml')?>" required>
                </div>
                <div class="form-group">
                    <label>Valor de Compra</label>
                    <input type="text" class="form-control"  name="valor_compra" id="money2" value="<?=isset($valor_compra)? $valor_compra : set_value('valor_compra')?>" required>
                </div>
                <div class="form-group">
                    <label>Data de Validade</label>
                    <input type="date" class="form-control"   name="validade" value="<?=isset($validade)? $validade : set_value('validade')?>" required>
                </div>  
                <input type="hidden"  name="id" value="<?=isset($id)? $id : set_value('id')?>" >
                <div class="form-group">
                    <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                </div>  
                
    
    
            </div>  
        </div>
    
         
    </form>

    <?php }else{ ?>
    <form method="post" name="frmAdd" action="<?php echo site_url('store_oleo');?>">
    <h5 class="align-self-center d-flex justify-content-center mt-3">Cadastro de óleos Essencial </h5>
    
        <div class="row  align-self-center d-flex justify-content-center">
            <div class="col-10 col-md-5">
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome"  required>
                </div>
                    
                <div class="form-group">
                    <label>ml</label>
                    <input type="number" class="form-control"  name="ml" min="1" max="1000" required>
                </div>
                <div class="form-group">
                    <label>Valor de Compra</label>
                    <input type="text" class="form-control" id="money2" name="valor_compra"  required>
                </div>
                <div class="form-group">
                    <label>Data de Validade</label>
                    <input type="date" class="form-control"   name="validade"  required>
                </div>  
               
                <div class="form-group">
                    <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                </div>  
                
    
    
            </div>  
        </div>
    
         
    </form>
    <?php } ?>
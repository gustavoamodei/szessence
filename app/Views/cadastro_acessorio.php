 
    <?php if(isset($id)){ ?>
    
        <form method="post" name="frmAdd" action="<?php echo site_url('store_acessorio');?>">
            <h5 class="align-self-center d-flex justify-content-center mt-5"> Edição de Acessório </h5>
        
            <div class="row  align-self-center d-flex justify-content-center">
                <div class="col-10 col-md-5">
                    
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control"  name="nome"  value="<?=isset($nome)? $nome : set_value('nome')?>" required>
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input type="text" class="form-control"  name="valor" id="money" value="<?=isset($valor)? $valor : set_value('valor')?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" name="descricao" rows="7"><?=isset($descricao)? $descricao : set_value('descricao')?></textarea>
                    </div>
                    <input type="hidden"  name="id" value="<?=isset($id)? $id : set_value('id')?>" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                    </div>
                </div>  
            </div>
    
         
    </form>

    <?php }else{ ?>
    <form method="post" name="frmAdd" action="<?php echo site_url('store_acessorio');?>">
        <h5 class="align-self-center d-flex justify-content-center mt-5">Cadastro de Acessório </h5>
        
            <div class="row  align-self-center d-flex justify-content-center">
                <div class="col-10 col-md-5">        
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control"  name="nome" required>
                    </div>
                    <div class="form-group">
                        <label>Preço</label>
                        <input type="text" class="form-control"  name="valor" id="money" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Descrição</label>
                        <textarea class="form-control" name="descricao" rows="7"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                    </div>  
                </div>  
            </div>
    
         
    </form>
    <?php } ?>
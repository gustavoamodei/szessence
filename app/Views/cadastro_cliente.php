
<?php $validation = \Config\Services::validation();?>
<?=$validation->listErrors(); ?>
    <?php if(isset($id)){ ?>
    
        <form method="post" name="frmAdd" action="<?php echo site_url('store_cliente');?>">
            <h5 class="align-self-center d-flex justify-content-center mt-3">Cadastro de Cliente </h5>
        
            <div class="row  align-self-center d-flex justify-content-center">
                <div class="col-10 col-md-5">
                
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="<?=isset($nome)? $nome : set_value('nome')?>" required>
                    </div>
                        
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control"  name="celular" id="celular" value="<?=isset($celular)? $celular : set_value('celular')?>" required>
                    </div>
                    <div class="form-group">
                        <label>Endereco</label>
                        <input type="text" class="form-control"  name="endereco"  value="<?=isset($endereco)? $endereco : set_value('endereco')?>" required>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="text" class="form-control"  name="email"  value="<?=isset($email)? $email : set_value('email')?>" required>
                    </div>  
                    <input type="hidden"  name="id" value="<?=isset($id)? $id : set_value('id')?>" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                    </div>  
                    
        
        
                </div>  
            </div>
    
         
    </form>

    <?php }else{ ?>
    <form method="post" name="frmAdd" action="<?php echo site_url('store_cliente');?>">
        <h5 class="align-self-center d-flex justify-content-center mt-3"> Cadastro de Cliente </h5>
        
            <div class="row  align-self-center d-flex justify-content-center">
                <div class="col-10 col-md-5">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome"  required>
                    </div>
                        
                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control"  name="celular" id="celular" required>
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input type="text" class="form-control"  name="endereco"  required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" name="email"  required>
                    </div>
                     
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary  btn-block" id="btn"><?= isset($id)? "Atualizar":"Cadastrar" ?></button>
                    </div>  
                    
        
        
                </div>  
            </div>
    
         
    </form>
    <?php } ?>
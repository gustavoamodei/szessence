
<html>
<head>
    <title>SZ Essence</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
</head>
    <body>
    <div id="fundo">
        <img src=app/img/image2.jpg alt="" />
    </div>
        <div class="container">
            <div class="row align-self-center d-flex justify-content-center">
            
                <div class="col-10 col-md-6 mt-5 ">
                <br><br><br><br><br>
                <div id="back">
                        <label class="row align-self-center d-flex justify-content-center  "> Login</label>
                <?php $session = session();?>
                <?php if($session->getFlashdata('erro')){?>
                        <div>
                            <div class="alert alert-danger" role="alert">
                                <?=$session->getFlashdata('erro');?>
                            </div>
                        </div>
                    <?php } ?>
                    
                <form method="post"  action="<?php echo site_url('logar');?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>

                        <input type="text" class="form-control" name="email"    placeholder="Email" required>

                    </div>

                    <div class="form-group ">

                        <label for="exampleInputPassword1">Senha</label>

                        <input type="password" class="form-control" name="senha"  placeholder="Senha">

                    </div>

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control btn-block">Logar</button>
                    </div>
                </form>
                </div>              
                </div>         
            </div>	
        </div>
    <body>
<html>

<style>
	#fundo img {
    width: 100%; /* com isso imagem ocupará toda a largura da tela. Se colocarmos height: 100% também, a imagem irá distorcer */
    position: absolute;
	height: 100%;
	}
	label {
		color: black;
		font-size: 16pt;
	}
	#back {
  border: 2px solid #999;
  padding: 30px;
  /* controla a distancia entre os elementos e a borda */
  margin: 0px;
  width: 100%;
  background:white;
  /* margem para alinhar o fieldset com o restante do grid */
}
	
</style>

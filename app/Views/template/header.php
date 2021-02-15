
<html>
    <head>
        <title>SZ Essence</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <style>  
        
    @media (max-width: 768px) { 
      #test{
        color: #00ff00;
        position:absolute;
        margin-left:200px;
      }
      #logado{
       
       
      }
      nav{
          
             
       }
    }

  
    @media (min-width: 778px) { 
      #test{
        color: #00ff00;
      }
      #logado{
        position:absolute;
        margin-left:300px;
      }
      nav{
             
       }
    }
    @media (min-width: 992px) { 
      #test{
        color: #00ff00;
        margin-left:600px;
      }
      #logado{
        position:absolute;
        margin-left:300px;
      }
      nav{
            
              
       }
    }
    @media (min-width: 1200px) { 
      #test{
        color: #00ff00;
      }
      #logado{
        position:absolute;
        margin-left:800px;
      }
    }
    </style> 
    </head>
    <body>
    <div class="container-sm container-md container-lg container-xl">
     
        <nav class="navbar navbar-expand-lg  navbar-light" style="background-color: #42f5b9;">
        
          <a class="navbar-brand" href="<?=site_url("main")?>">SZessence</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
              <ul class="navbar-nav mr-auto">
              
            
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span style ="color:black;">Cadastro/Simulação</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=<?=site_url('cadastro_oleo');?>>Cadastro de Óleos Essenciais</a>
                    <a class="dropdown-item" href=<?=site_url('cadastro_oleo_base');?>>Cadastro de Óleos Base</a>
                    <a class="dropdown-item" href=<?=site_url('cadastro_cliente');?>>Cadastro de Clientes</a>
                    <a class="dropdown-item" href=<?=site_url("cadastro_frasco")?>>Cadastro Frascos</a>
                  <a class="dropdown-item" href=<?=site_url("cadastro_acessorio")?>>Cadastro Acessórios</a>
                    <a class="dropdown-item" href=<?=site_url('simulacao');?>>Simulação</a>
                    <a class="dropdown-item" href=<?=site_url("deslogar")?>>Deslogar</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span style ="color:black;">Listar dados</span>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href=<?=site_url("listar_oleo_base")?>>Listar Óleos base</a>
                  <a class="dropdown-item" href=<?=site_url("listar_oleo")?>>Listar Óleos Essenciais</a>
                  <a class="dropdown-item" href=<?=site_url("listar_cliente")?>>Listar Clientes</a>
                  <a class="dropdown-item" href=<?=site_url("listar_frasco")?>>Listar Frascos</a>
                  <a class="dropdown-item" href=<?=site_url("listar_acessorio")?>>Listar Acessórios</a>
                  <a class="dropdown-item" href=<?=site_url("listar_orcamento")?>>Listar Orçamentos</a>
                  <a class="dropdown-item" href=<?=site_url("tabela1")?>>Antiga Tabela De Óleos</a>
                  <a class="dropdown-item" href=<?=site_url("tabela2")?>>Antiga Tabela De Frasco/Acesórios</a>
                  <a class="dropdown-item" href=<?=site_url("main")?>>Menu</a>
                </li>
                <span id="logado" style=" margin-top:5px"><?php echo isset(session()->nome_session)? 'olá: '.session()->nome_session:"" ?>
              
              <a style=" margin-left: 0px" href=<?=site_url("deslogar")?>>Logout</a>
              <span>
        

          
        </nav>
      <style>
       
       </style>
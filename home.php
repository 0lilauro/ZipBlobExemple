<?php 
  	header('Content-type:text/html; charset=UTF8;');
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="./file/sam.png">

    <title>Cópia não comédia </title>

    <!-- Bootstrap core CSS -->
    <link href="./file/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./file/form-validation.css" rel="stylesheet">
	
	<script src="./file/popper.min.js.download"></script>
    <script src="./file/bootstrap.min.js.download"></script>
    <script src="./file/holder.min.js.download"></script>

  </head>

  <body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="./file/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Bootstrap Copiado</h2>
        <p class="lead">O melhor plágio do planeta</p>
      </div>

      <div class="row">
        <div class="col-md-12 order-md-1">
          <h4 class="mb-3">Formulário de Cliente</h4>
          
          <form action="zipper.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="arquivo">Arquivo</label>
              <input type="file" class="form-control" name="arquivos[]"  accept="audio/*" multiple="true">
            </div>
             <div class="mb-3">
              <label for="senha">Senha:</label>
              <input type="text" class="form-control"  name="senha">
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">enviar</button>
          </form>

        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Gersin Produções</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://getbootstrap.com/docs/4.0/examples/checkout/#">Privacy</a></li>
          <li class="list-inline-item"><a href="https://getbootstrap.com/docs/4.0/examples/checkout/#">Terms</a></li>
          <li class="list-inline-item"><a href="https://getbootstrap.com/docs/4.0/examples/checkout/#">Support</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
</body></html>
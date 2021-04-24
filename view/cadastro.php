<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
  <title>Campeonato Brasileiro de 2006</title>
  <meta name="description"
    content="Relembre aqui a escalação do seu time do coração do ano de 2006 do campeonato brasileiro da série A">
  <meta name="keywords" content="Futebol,Brasileirão,Times,Série A,Jogadores">
  <meta name="author"
    content="Lucas Gades::lucasgades@hotmail.com; Felipe Zamora::zamorafelipe00@gmail.com; Ryan Eugênio::ryaneugenio1211@gmail.com; Juliano Godinho::julianogodinho99@gmail.com;">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../img/logo-brasileirao-16x16.png">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="">
  <script type="text/javascript" src="../js/js.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
</head>
<body>

    <?php
        include "../model/time.php";
        include "../dao/timeDAO.php";
        include "../imagem.php";

        $idTime = "";
        $nomeTime = "";
        $fotoTime = "semfoto.jpg";

        if(isset($_POST["botaoAcao"])) {
            if($_POST["botaoAcao"] == "Gravar") {
                $idTime = null;
                $nomeTime = $_POST["nomeTime"];
                $arquivo = $_FILES["fileFoto"];
                    if ($arquivo != "" && $arquivo != null) {
                        $fotoTime = Imagem::uploadImagem($arquivo, 2000, 2000, 5000, "../img/");
                    }else {
                        $fotoTime = "";
                    }

                $time =  new Time($idTime, $nomeTime, $fotoTime);
                TimeDAO::inserir($time);
            } else if($_POST["botaoAcao"] == "Cancelar") {
                header("Location: cadastro.php");
            }
        }

    ?>
    <main class="container">
        
        <header class="jumbotron text-center">
            <h1>Cadastro</h1>
        </header>

        <section class="container">
                <form action="cadastro.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4" style="height: 200px;">
                            <img src="../img/<?php echo $fotoTime;?>" style="width:100%; height:100%;">  
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4"> 
                            <label for="fotoTime"><strong>Foto</strong></label>
                            <input type="file" name="fileFoto"required>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <label for="nomeTime"><strong>Nome</strong></label>
                            <input type="text" name="nomeTime"  value="<?php echo $nomeTime;?> " class="form-control" required>
                        </div>
                        <div class="ccol-md-4">

                        </div>
                        <div class="col-md-6" style="width: 40%; margin-left: 40%;margin-top: 20px; margin-bottom:20px;">
                            <button type="submit" name="botaoAcao" value="Gravar" class="btn btn-success">Enviar</button>
                            <button type="reset" name="botaoAcao" value="Limpar" class="btn btn-primary">Limpar</button>                   
                        </div>
                    </div>
                </form>
        </section>

    </main>
</body>
</html>
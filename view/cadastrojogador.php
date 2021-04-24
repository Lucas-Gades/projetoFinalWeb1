<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css">
    <link rel="stylesheet" href="../js/bootstrap.min.js">
    <script type="text/javascript" src="../js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"> </script>
</head>
<body>
    <?php
        include "../dao/timeDAO.php";
        include "../dao/jogadorDAO.php";
        include "../model/jogador.php";
        include "../imagem.php";

        $idJogador = "";
        $nome = "";
        $idade = "";
        $numero = "";
        $posicao = "";
        $nacionalidade = "";
        $timeJogador = "";
        $idTimeJogador = "";
        $foto = "semfoto.jpg";

        if(isset($_POST["botaoAcao"])) {
            if($_POST["botaoAcao"] == "Gravar") {
                $idJogador = null;
                $nome = $_POST["nome"];
                $idade = $_POST["idade"];
                $numero = $_POST["numero"];
                $posicao = $_POST["posicao"];
                $nacionalidade = $_POST["nacionalidade"];
                $arquivo = $_FILES["foto"];
                if ($arquivo != "" && $arquivo != null) {
                    $foto = Imagem::uploadImagem($arquivo, 2000, 2000, 5000, "../img/");
                }else {
                    $foto = "";
                }
                $timeJogador = $_POST["timeJogador"];
                
                $jogador = new Jogador($idJogador, $nome, $idade, $numero, $posicao, $nacionalidade, $foto, $timeJogador);
                
                JogadorDAO::inserir($jogador);
            }
        }
    ?>

    <main class="container">
        <header class="jumbotron text-center">
            <h1>Cadastro Jogador</h1>
        </header>

        <section class="container">
            <form action="cadastrojogador.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12" style="height: 200px;">
                        <img src="../img/<?php echo $foto;?>" style="width:40%; height:100%; margin-left: 30%;">  
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;"> 
                            <label for="fotoTime" style="color: white; "><strong>Foto</strong></label>
                            <br>
                            <input type="file" name="foto" style="width: 50%; color:white;" required>
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;">
                        <strong><label for="nome" style="color: white;">Nome</label></strong>
                        <input type="text" name="nome" class="form-control" style="width: 40%;" value="<?php echo $nome; ?>" required>
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;">
                        <strong><label for="nome" style="color: white;">Idade</label></strong>
                        <input type="number" name="idade" class="form-control" style="width: 40%;" value="<?php echo $idade; ?>">
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;">
                        <strong><label for="nome" style="color: white;">Número da Camisa</label></strong>
                        <input type="number" name="numero" class="form-control" style="width: 40%;" value="<?php echo $numero; ?>">
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;">
                        <strong><label for="nome" style="color: white;">Posição</label></strong>
                        <input type="text" name="posicao" class="form-control" style="width: 40%;" value="<?php echo $posicao; ?>">
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;">
                        <strong><label for="nome" style="color: white;">Nacionalidade</label></strong>
                        <input type="text" name="nacionalidade" class="form-control" style="width: 40%;" value="<?php echo $nacionalidade; ?>">
                    </div>
                    <div class="col-md-12" style="margin-left: 30%;">
                        <strong><label for="nome" style="color: white;">Time</label></strong>
                        <select name="timeJogador" class="form-control" style="width: 40%;">
                        <option value="vazio" selected>Selecione</option>
                        <?php
                            $timesJogador = TimeDAO::getTime();
                            foreach($timesJogador as $timeJogador) {
                                echo "$timeJogador";
                            }
                        ?>
                         </select>
                    </div>
                </div>
                <div class="row center">
                    <div class="col-md-6" style="width: 40%; margin-left: 30%;margin-top: 20px; margin-bottom:20px;">
                        <input type="submit" name="botaoAcao" value="Gravar" class="btn btn-success">
                        <input type="submit" name="botaoAcao" value="Limpar" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
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
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/jogadores.css">
    <script type="text/javascript" src="js/js.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
</head>
<body>

    <?php
        include_once "listagemview.php";
        include_once "../model/jogador.php";
        include_once "../dao/jogadorDAO.php";

        $valor = "";
        $campo = "";
        $operacao = "";
        $ordenacao = "";

        if(isset($_POST["btnFiltro"])) {
            $valor = $_POST["txtFiltro"];
            $campo = $_POST["selCategoria"];
            $operacao = $_POST["selOperacao"];
            $ordenacao = $_POST["selOrdem"];

            if($_POST["btnFiltro"] == "Desfazer") {
                $jogadores = JogadorDAO::getJogadores("idJogador", "asc", "", "");
            } else if($_POST["btnFiltro"] == "Filtrar") {
                if($valor == "") {
                    $jogadores = JogadorDAO::getJogadores($campo, $ordenacao, "", "");
                } else if($operacao == "sem") {
                    $jogadores = JogadorDAO::getJogadores($campo, $ordenacao, $operacao, "%$valor%");
                } else {
                    $jogadores = JogadorDAO::getJogadores($campo, $ordenacao, $operacao, $valor);
                }
            }
        } else {
            $jogadores = JogadorDAO::getJogadores("idJogador", "asc", "", "");
        }
    ?>

    <main class="container">

    <header>
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" >
        <a class="navbar-brand" href="#"> <img src="../img/logoBrasileirao.png" id="logoBrasileiraoNav" class="img-thumbnail img-fluid" alt="Logo do Brasileirão"></a>
        <button class="navbar-toggler  bg-info " type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link " href="../index.html">Início </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.html#classificacao">Classificação</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.html#times">Times</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listagem.php">Jogadores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.html#contato">Contatos</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input id="pesquisar" class="form-control mr-sm-2 col-9 " style="margin-right: 1%;" type="search"
              placeholder="Pesquise Aqui.." aria-label="Search">
            <button id="lupa" class="btn  my-2 my-sm-0 col-2" type="submit">
              <img src="../img/lupa.png" style="height: 15px; " sclass="img-fluid text-right "
                alt="Icone da Lupa de Pesquisa">
            </button>
          </form>
        </div>
      </nav>
    </header>

        <section class="container py-4" style="margin-bottom:20px; color:white;">
            <form class="mt-5" action="listagem.php" method="POST" class="listas">
                <div class="row">
                    <div class="col-md-3">
                        <strong><label for="txtFiltro">Filtrar</label></strong>
                        <input type="text" id="txtFiltro" name="txtFiltro" value=""  class="form-control">
                    </div>
                    <div class="col-md-2">
                        <strong><label for="selCategoria">Buscar Por</label></strong>
                        <select name="selCategoria" id="selCategoria" class="form-control">
                            <option value="nome">Nome</option>
                            <option value="idade">Idade</option>
                            <option value="numero">Número Camisa</option>
                            <option value="posicao">Posição</option>
                            <option value="nacionalidade">Nacionalidade</option>
                            <option value="nomeTime">Time</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <strong><label for="selOperacao">Busca detalhada</label></strong>
                        <select name="selOperacao" id="selOperacao" class="form-control">
                            <option value="sem">Contém a palavra</option>
                            <option value="=">Igual</option>
                            <option value="<>">Diferente</option>
                            <option value=">">Maior</option>
                            <option value=">=">Maior ou igual</option>
                            <option value="<">Menor</option>
                            <option value="<=">Menor ou igual</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <strong><label for="selOrdem">Ordenado</label></strong>
                        <select name="selOrdem" id="selOrdem" class="form-control">
                            <option value="asc">Cresente</option>
                            <option value="desc">Decresente</option>
                        </select>
                    </div>
                    
                    <div class="col-md-1">
                        <input class="btn btn-primary" type="submit" name="btnFiltro" value="Filtrar" style="margin-top:30px; width: 85px;" >
                    </div>
                    <div class="col-md-1">
                        <input class="btn btn-danger" type="submit" name="btnFiltro" value="Desfazer" style="margin-top:30px; width: 85px;">
                    </div>
                </div>
            </form>
        </section>

        <section  class=" row container pb-5 ">
            <?php
                ListagemView::criarCArd($jogadores);
                if (isset($_GET["btnFiltro"])) {
                    echo "
                    <script>
                        $('#txtFiltro').val('$valor');
                        $('#selCategoria').val('$campo');
                        $('#selOperacao').val('$operacao');
                        $('#selOrdenacao').val('$ordenacao');
                    </script>
                     ";
                }
            ?>
        </section>

    </main>

</body>
</html>
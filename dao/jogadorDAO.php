<?php
    include_once "conexaobanco.php";
    class JogadorDAO {

        public static function inserir($jogador) {
            $con = ConexaoBanco::getConexao();
            $sql = $con->prepare("INSERT INTO jogador VALUES(null, ?, ?, ?, ?, ?, ?, ?)");
            $nome = $jogador->getNome();
            $idade = $jogador->getIdade();
            $numero = $jogador->getNumero();
            $posicao = $jogador->getPosicao();
            $nacionalidade = $jogador->getNacionalidade();
            $foto = $jogador->getFoto();
            $timeJogador = $jogador->getTimeJogador();
            
            $sql->bindParam(1, $nome);
            $sql->bindParam(2, $idade);
            $sql->bindParam(3, $numero);
            $sql->bindParam(4, $posicao);
            $sql->bindParam(5, $nacionalidade);
            $sql->bindParam(6, $foto);
            $sql->bindParam(7, $timeJogador);
            $sql->execute();
        }

        public static function getJogadores($campo, $ordem, $operador, $valor) {
            $con = ConexaoBanco::getConexao();
            if($operador == "") {
                $sql = $con->prepare("SELECT J.idJogador,J.nome,J.idade,J.numero,J.posicao,J.nacionalidade,J.foto,T.nomeTime FROM jogador AS J INNER JOIN time AS T ON J.idTime = T.idTime ORDER BY $campo $ordem");
            }else if ($operador == "sem") {
                $sql = $con->prepare("SELECT J.idJogador,J.nome,J.idade,J.numero,J.posicao,J.nacionalidade,J.foto,T.nomeTime FROM jogador AS J INNER JOIN time AS T ON J.idTime = T.idTime WHERE $campo LIKE ? ORDER BY $campo $ordem");
                $sql->bindParam(1, $valor);
            } else {
                $sql = $con->prepare("SELECT J.idJogador,J.nome,J.idade,J.numero,J.posicao,J.nacionalidade,J.foto,T.nomeTime FROM jogador AS J INNER JOIN time AS T ON J.idTime = T.idTime WHERE $campo $operador ? ORDER By $campo $ordem");
                $sql->bindParam(1, $valor);
            }
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            $listaJogadores = array();
            while($registro = $sql->fetch()) {
                $jogador = new Jogador($registro["idJogador"], $registro["nome"], $registro["idade"], $registro["numero"], $registro["posicao"], $registro["nacionalidade"], $registro["foto"], $registro["nomeTime"]);
                $listaJogadores[] = $jogador;
            }
            return $listaJogadores;
        }
    }
?>
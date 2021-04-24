<?php
    include_once "conexaobanco.php";
    class TimeDAO {

        public static function inserir($time) {
            $con = ConexaoBanco::getConexao();
            $sql = $con->prepare("INSERT INTO time values(null, ?, ?)");
            $nomeTime = $time->getNomeTime();
            $fotoTime = $time->getFotoTime();
            $sql->bindParam(1, $nomeTime);
            $sql->bindParam(2, $fotoTime);
            $sql->execute();
        }

        public static function getTime() {
            $con = ConexaoBanco::getConexao();
            $sql = $con->prepare("SELECT idTime, nomeTime FROM time");
            $sql->setFetchMode(PDO::FETCH_ASSOC);
            $sql->execute();
            $linha = array();
            $optTime = "";
            while($registro = $sql->fetch()) {
                $idTime = $registro["idTime"];
                $nomeTime = $registro["nomeTime"];
                $optTime = "<option value='$idTime'>$nomeTime</option>";
                $linha[] = $optTime;
            }
            return $linha;
        }
    }
?>
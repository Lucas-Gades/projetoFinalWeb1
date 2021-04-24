<?php
    class ConexaoBanco {

        public static $conexao;

        public static function getConexao() {
            $stringConexao = "mysql:host=localhost;port=3306;dbname=dbbrasileiro";
            $usuario = "root";
            $senha = "";

            if (!isset(self::$conexao)) {
                try {
                    self::$conexao = new PDO($stringConexao, $usuario, $senha);
                    echo "Nova conexão criada";
                } catch (PDOException $e) {
                    $erro = $e->getCode();
                    if ($erro == 1049) {
                        echo "Base de dados não encontrada!<br>";
                    } else if ($erro == 1044) {
                        echo "Usuário ou senha não encontrado<br>";
                    } else if ($erro == 2002) {
                        echo "Host não encontrado";
                    }
                }
            }
            return self::$conexao;
            echo "Conexão ja estabelecida";
        }
    }
?>
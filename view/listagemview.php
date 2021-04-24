<?php
    include "../model/jogador.php";
    
    class ListagemView {

        public static function criarCard($jogadores) {
            foreach($jogadores as $jogador) {
                $idJogador = $jogador->getIdJogador();
                $nome = $jogador->getNome();
                $idade = $jogador->getIdade();
                $numero = $jogador->getNumero();
                $posicao = $jogador->getPosicao();
                $nacionalidade = $jogador->getNacionalidade();
                $foto = $jogador->getFoto();
                $timeJogador = $jogador->getTimeJogador();
                
                echo "
                <aside class='col-md-3 col-sm-6 col-xs-12'>
                    <div class='card col-10 col-md-3 col-sm-6 ml-2 p-0 mt-5' style='width: 26rem; background: yellow; border: 5px solid darkgreen; margin-bottom:20px;'>
                        <h2 class='text-center' style='background-color: rgba(0, 127, 247, 0.74); margin-bottom: ;'>$nome</h2>
                        <img src='../img/$foto' style='border:2px solid black; height:240px; width:100%;' class='' alt='...''>
                    <div class='card-body'>
                        <p class='card-text' style='margin-top:10px;'><span style='font-weight: bold;'>Nome: </span>$nome</p>
                        <p class='card-text'><span style='font-weight: bold;'>Idade: </span>$idade anos</p>
                        <p class='card-text'><span style='font-weight: bold;'>Posição: </span>$posicao</p>
                        <p class='card-text'><span style='font-weight: bold;'>Clube: </span>$timeJogador</p>
                        <p class='card-text'> <span style='font-weight: bold;'>Nacionalidade: </span>$nacionalidade <img src='img/icone-brasil.png' height='18px' alt='' class=''></p>
                        <div class='imagem m-0 p-0'>
                            <p class='text-center texto' style='font-size: 65px;color: blue;'>$numero</p>
                        </div>
                    </div>
                    </div>
                </aside>    
                ";
            }
        }

    }
?>
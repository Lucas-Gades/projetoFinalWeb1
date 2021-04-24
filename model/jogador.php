<?php
    class Jogador {
        private $idJogador;
        private $nome;
        private $idade;
        private $numero;
        private $posicao;
        private $nacionalidade;
        private $foto;
        private $timeJogador;
        
        public function __construct($idJogador, $nome, $idade, $numero, $posicao, $nacionalidade, $foto, $timeJogador) {
            $this->idJogador = $idJogador;
            $this->nome = $nome;
            $this->idade = $idade;
            $this->numero = $numero;
            $this->posicao = $posicao;
            $this->nacionalidade = $nacionalidade;
            $this->foto = $foto;
            $this->timeJogador = $timeJogador;  
        }

        public function getIdJogador() {
            return $this->idJogador;
        }

        public function setIdJogador($novoIdJogador) {
            $this->idJogador = $novoIdJogador;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($novoNome) {
            $this->nome = $novoNome;
        }

        public function getIdade() {
            return $this->idade;
        }

        public function setIdade($novaIdade) {
            $this->idade = $novaIdade;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($novoNumero) {
            $this->numero = $novoNumero;
        }

        public function getPosicao() {
            return $this->posicao;
        }

        public function setPosicao($novaPosicao) {
            $this->posicao = $novaPosicao;
        }

        public function getNacionalidade() {
            return $this->nacionalidade;
        }

        public function setNacionalidade($novaNacionalidade) {
            $this->nacionalidade = $novaNacionalidade;
        }

        public function getTimeJogador() {
            return $this->timeJogador;
        }

        public function setTimeJogador($novoTimeJogador) {
            $this->timeJogador = $novoTimeJogador;
        }

        public function getFoto() {
            return $this->foto;
        }

        public function setIFoto($novaFoto) {
            $this->foto = $novaFoto;
        }
    }
?>
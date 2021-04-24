<?php 
    class Time {

        private $idTime;
        private $nomeTime;
        private $fotoTime;

        public function __construct($idTime, $nomeTime, $fotoTime) {
            $this->idTime = $idTime;
            $this->nomeTime = $nomeTime;
            $this->fotoTime = $fotoTime;
        }

        public function getIdTime() {
            return $this->idTime;
        }

        public function setIdTime($novoIdTime) {
            $this->idTime = $novoIdTime;
        }

        public function getNomeTime() {
            return $this->nomeTime;
        }

        public function setNomeTime($novoNomeTime) {
            $this->nomeTime = $novoNomeTime;
        }

        public function getFotoTime() {
            return $this->fotoTime;
        }

        public function setFotoTime($novaFotoTime) {
            $this->fotoTime = $novaFotoTime;
        }
    }
?>
<?php

class Onibus{
    private $onibus_id;
    private $estado;
    private $capacidade;
    private $placa;

    public function __construct($estado, $capacidade, $placa) {
        $this->estado = $estado;
        $this->capacidade = $capacidade;
        $this->placa = $placa;
    }

    public function getOnibusID(){
        return $this->onibus_id;
    }
    public function setOnibusID($i) {
        $this->onibus_id = $i;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($e) {
        $this->estado = $e;
    }

    public function getCapacidade(){
        return $this->capacidade;
    }
    public function setCapacidade($c) {
        $this->capacidade = $c;
    }

    public function getPlaca(){
        return $this->placa;
    }
    public function setPlaca($p) {
        $this->placa = $p;
    }

}

?>
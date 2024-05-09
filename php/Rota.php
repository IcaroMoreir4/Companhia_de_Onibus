<?php

class Rota{
    private $rota_id;
    private $origem;
    private $destino;
    private $distancia;
    private $duracao_estimada;
    private $horario_partida;
    private $horario_chegada;

    public function __construct($origem, $destino, $distancia, $duracao_estimada) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->duracao_estimada = $duracao_estimada;
    }

    public function getRotaID(){
        return $this->rota_id;
    }
    public function setRotaID($p) {
        $this->rota_id = $p;
    }

    public function getOrigem(){
        return $this->origem;
    }
    public function setOrigem($o) {
        $this->origem = $o;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($d) {
        $this->destino = $d;
    }

    public function getDistancia(){
        return $this->distancia;
    }
    public function setDistancia($d) {
        $this->distancia = $d;
    }

    public function getDuracaoEstimada(){
        return $this->duracao_estimada;
    }
    public function setDuracaoEstimada($d) {
        $this->duracao_estimada = $d;
    }

    public function getHorarioPartida(){
        return $this->horario_partida;
    }
    public function setHorarioPartida($h) {
        $this->horario_partida = $h;
    }

    public function getHorarioChegada(){
        return $this->horario_chegada;
    }
    public function setHorarioChegada($h) {
        $this->horario_chegada = $h;
    }
}

?>
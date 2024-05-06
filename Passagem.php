<?php

class Passagem{
    private $passagem_id;
    private $passageiro_id;
    private $rota_id;
    private $data_viagem;
    private $preco;

    public function __construct($passageiro_id, $rota_id, $data_viagem, $preco) {
        $this->passageiro_id = $passageiro_id;
        $this->rota_id = $rota_id;
        $this->data_viagem = $data_viagem;
        $this->preco = $preco;
    }

    public function getPassagemID(){
        return $this->passagem_id;
    }
    public function setPassagemID($p) {
        $this->passagem_id = $p;
    }

    public function getPassageiroID(){
        return $this->passageiro_id;
    }
    public function setPassageiroID($p) {
        $this->passageiro_id = $p;
    }

    public function getRotaID(){
        return $this->rota_id;
    }
    public function setRotaID($r) {
        $this->rota_id = $r;
    }

    public function getDataViagem(){
        return $this->data_viagem;
    }
    public function setDataViagem($d) {
        $this->data_viagem = $d;
    }

    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($p) {
        $this->preco = $p;
    }

}

?>
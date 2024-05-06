<?php

class Motorista{
    private $motorista_id;
    private $nome;
    private $cnh;
    private $cpf;
    private $salario;

    public function __construct($nome, $cnh, $cpf, $salario) {
        $this->nome = $nome;
        $this->cnh = $cnh;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function getMotoristaID(){
        return $this->motorista_id;
    }
    public function setMotoristaID($m) {
        $this->motorista_id = $m;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($n) {
        $this->nome = $n;
    }

    public function getCnh(){
        return $this->cnh;
    }
    public function setCnh($c) {
        $this->cnh = $c;
    }

    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($c) {
        $this->cpf = $c;
    }

    public function getSalario(){
        return $this->salario;
    }
    public function setSalario($s) {
        $this->salario = $s;
    }

}

?>
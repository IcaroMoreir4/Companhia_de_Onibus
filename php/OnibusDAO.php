<?php

class OnibusDAO{

    public function create (Onibus $onibus){
        $sql = 'INSERT INTO onibus (estado, capacidade, placa) VALUES (?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $onibus->getEstado());
        $stmt->bindValue(2, $onibus->getCapacidade());
        $stmt->bindValue(3, $onibus->getPlaca());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM onibus';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }
    
    public function update(Onibus $onibus) {
        $sql = 'UPDATE onibus SET estado = ?, capacidade = ?, placa = ?   WHERE onibus_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
    
        $stmt->bindValue(1, $onibus->getEstado());
        $stmt->bindValue(2, $onibus->getCapacidade());
        $stmt->bindValue(3, $onibus->getPlaca());
        $stmt->bindValue(4, $onibus->getOnibusID());
    
        $stmt->execute();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM onibus WHERE onibus_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
    
    public function iniciarViagem($onibus_id, $rota_id, $motorista_id, $estado_atual){
        if ($estado_atual == 'disponivel') {
            $conn = Conexao::getConn();
            $novo_estado = 'em_viagem';
            $stmt = $conn->prepare('UPDATE onibus SET estado = :novo_estado, rota_id = :rota_id, motorista_id = :motorista_id WHERE onibus_id = :onibus_id');
            $stmt->bindParam(':novo_estado', $novo_estado, PDO::PARAM_STR);
            $stmt->bindParam(':rota_id', $rota_id, PDO::PARAM_INT);
            $stmt->bindParam(':motorista_id', $motorista_id, PDO::PARAM_INT);
            $stmt->bindParam(':onibus_id', $onibus_id, PDO::PARAM_INT);
            $stmt->execute();
    
            return "Viagem iniciada com sucesso!";
        } else {
            return "O ônibus não está disponível para viagem no momento.";
        }
    }
    
    public function finalizarViagem($onibus_id, $estado_atual){
        if ($estado_atual == 'em_viagem') {
            $conn = Conexao::getConn();
            $novo_estado = 'disponivel';
            $stmt = $conn->prepare('UPDATE onibus SET estado = :novo_estado WHERE onibus_id = :onibus_id');
            $stmt->bindParam(':novo_estado', $novo_estado, PDO::PARAM_STR);
            $stmt->bindParam(':onibus_id', $onibus_id, PDO::PARAM_INT);
            $stmt->execute();
    
            return "Viagem finalizada com sucesso!";
        } else {
            return "O ônibus não está em viagem para finalizar.";
        }
    }    

}

?>
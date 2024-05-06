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
}

?>
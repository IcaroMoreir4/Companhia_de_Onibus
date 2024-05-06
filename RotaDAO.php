<?php

class RotaDAO{

    public function create (Rota $rota){
        $sql = 'INSERT INTO rota (origem, destino, distancia, duracao_estimada) VALUES (?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $rota->getOrigem());
        $stmt->bindValue(2, $rota->getDestino());
        $stmt->bindValue(3, $rota->getDistancia());
        $stmt->bindValue(4, $rota->getDuracaoEstimada());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM rota';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }
    
    public function update(Rota $rota) {
        $sql = 'UPDATE rota SET origem = ?, destino = ?, distancia = ?, duracao_estimada = ?  WHERE rota_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
    
        $stmt->bindValue(1, $rota->getOrigem());
        $stmt->bindValue(2, $rota->getDestino());
        $stmt->bindValue(3, $rota->getDistancia());
        $stmt->bindValue(4, $rota->getDuracaoEstimada());
        $stmt->bindValue(5, $rota->getRotaID());
        
        $stmt->execute();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM rota WHERE rota_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}

?>
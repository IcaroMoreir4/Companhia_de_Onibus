<?php

class PassagemDAO{

    public function create (Passagem $passagem){
        $sql = 'INSERT INTO $passagem (passageiro_id, rota_id, data_viagem, preco) VALUES (?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $passagem->getPassageiroID());
        $stmt->bindValue(2, $passagem->getRotaID());
        $stmt->bindValue(3, $passagem->getDataViagem());
        $stmt->bindValue(4, $passagem->getPreco());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM passagem';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }
    
    public function update(Passagem $passagem) {
        $sql = 'UPDATE passagem SET passageiro_id = ?, rota_id = ?, data_viagem = ?, preco = ?  WHERE passagem_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
    
        $stmt->bindValue(1, $passagem->getPassageiroID());
        $stmt->bindValue(2, $passagem->getRotaID());
        $stmt->bindValue(3, $passagem->getDataViagem());
        $stmt->bindValue(4, $passagem->getPreco());
        $stmt->bindValue(5, $passagem->getPassagemID());
        
        $stmt->execute();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM passagem WHERE passagem_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}

?>

<?php

class PassagemDAO{

// CRUD

    public function create (Passagem $passagem){
        $sql = 'INSERT INTO passagem (passageiro_id, rota_id, data_viagem, preco) VALUES (?,?,?,?)';
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

    public function atualizarCapacidadeOnibus($onibus_id, $nova_capacidade) {
        $sql = 'UPDATE onibus SET capacidade = ? WHERE id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $nova_capacidade);
        $stmt->bindValue(2, $onibus_id);
        $stmt->execute();
    }

    public function getPassageiroById($passageiro_id) {
        $sql = 'SELECT * FROM passageiro WHERE passageiro_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $passageiro_id);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
    
    public function comprarPassagem($passageiro_id, $rota_id, $data_viagem, $preco, $onibus_id){
        $passagem = new Passagem($passageiro_id, $rota_id, $data_viagem, $preco);
        $passagem->setPassageiroID($passageiro_id);
        $passagem->setRotaID($rota_id);
        $passagem->setDataViagem($data_viagem);
        $passagem->setPreco($preco);

        $passagemDAO = new PassagemDAO();
        $passagemDAO->create($passagem);

        return true;
    }

    public function devolverPassagem($passageiro_id, $onibus_id) {
        $sql = 'SELECT * FROM passagem WHERE passageiro_id = ? AND onibus_id = ? AND devolvida = 0';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $passageiro_id);
        $stmt->bindValue(2, $onibus_id);
        $stmt->execute();
        $passagem = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($passagem) {
            $passagem_id = $passagem['passagem_id'];
            $sql = 'UPDATE passagem SET devolvida = 1 WHERE passagem_id = ?';
            $stmt = Conexao::getConn()->prepare($sql);
            $stmt->bindValue(1, $passagem_id);
            $stmt->execute();

            return true;
        } else {
            echo "Não foi encontrada uma passagem não devolvida para o passageiro e ônibus especificados.";
            return false;
        }
    }
    
}

?>

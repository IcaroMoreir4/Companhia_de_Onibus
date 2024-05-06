<?php

class MotoristaDAO{

    public function create (Motorista $motorista){
        $sql = 'INSERT INTO motorista (nome, cnh, salario, cpf) VALUES (?,?,?,?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $motorista->getNome());
        $stmt->bindValue(2, $motorista->getCnh());
        $stmt->bindValue(3, $motorista->getSalario());
        $stmt->bindValue(4, $motorista->getCpf());

        $stmt->execute();
    }

    public function read(){
        $sql = 'SELECT * FROM motorista';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } else {
            return [];
        }
    }
    
    public function update(Motorista $motorista) {
        $sql = 'UPDATE motorista SET nome = ?, cnh = ?, salario = ?, cpf = ? WHERE motorista_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
    
        $stmt->bindValue(1, $motorista->getNome());
        $stmt->bindValue(2, $motorista->getCnh());
        $stmt->bindValue(3, $motorista->getSalario());
        $stmt->bindValue(5, $motorista->getCpf());
        $stmt->bindValue(4, $motorista->getMotoristaID());

        $stmt->execute();
    }
    
    public function delete($id) {
        $sql = 'DELETE FROM motorista WHERE motorista_id = ?';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }
}

?>
<?php
include 'conexao/conexao.php';

class Passagem extends Conexao{
    
    public function SetPassagem($dados)
    {
        $data = $dados['data'];
        $hora = $dados['hora'];
        $origem = $dados['origem'];
        $destino = $dados['destino'];
        $valor = $dados['valor'];
        $empresa_id = $dados['empresa_id'];
        $status = 'ativo';
        $created = date('Y-m-d');

        $sql = "INSERT INTO passagens (passagem_data, passagem_hora, passagem_origem, passagem_destino, passagem_valor, passagem_status, empresa_id, passagem_created)
        VALUES (:_data, :hora, :origem, :destino, :valor, :u_status, :empresa_id, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('_data', $data);
        $consulta->bindValue('hora' , $hora);
        $consulta->bindValue('origem' , $origem);
        $consulta->bindValue('destino' , $destino);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('empresa_id' , $empresa_id);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }

    public function getPassagemAll(){
        
        $sql = "SELECT * FROM passagens WHERE passagem_status='ativo'";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

    public function getPassagem($dados){
        
        $id = $dados['id'];

        $sql = "SELECT * FROM passagens WHERE passagem_status='ativo' AND passagem_id=$id";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetch());

    }

     public function getPassagemEmpresaAll($dados){
        
        $id = $dados['id'];
        $hoje = date('Y-m-d');

        $sql_update = "UPDATE passagens SET passagem_status='inativo' WHERE empresa_id=$id AND passagem_data < '$hoje'";
        $consulta_update = Conexao::prepare($sql_update);
        $consulta_update->execute();

        $sql = "SELECT * FROM passagens WHERE empresa_id=$id ORDER BY passagem_data asc";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

    public function UpdatePassagem($dados)
    { 
        $passagem_id = $dados['id'];
        $data = $dados['data'];
        $hora = $dados['hora'];
        $origem = $dados['origem'];
        $destino = $dados['destino'];
        $valor = $dados['valor'];
        $status = $dados['status'];

        $sql = "UPDATE passagens SET passagem_data=:_data, passagem_hora=:hora, passagem_origem=:origem, passagem_destino=:destino, passagem_valor=:valor, passagem_status=:u_status WHERE passagem_id=:passagem_id";
        
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('passagem_id', $passagem_id);
        $consulta->bindValue('_data', $data);
        $consulta->bindValue('hora' , $hora);
        $consulta->bindValue('origem' , $origem);
        $consulta->bindValue('destino' , $destino);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('u_status' , $status);

        return $consulta->execute();
        
    }

}

<?php
include 'conexao/conexao.php';

class Encomenda extends Conexao{
    
    public function SetEncomenda($dados)
    {
        $data = $dados['data'];
        $hora = $dados['hora'];
        $origem = $dados['origem'];
        $destino = $dados['destino'];
        $valor = $dados['valor'];
        $descricao = $dados['descricao'];
        $empresa_id = $dados['empresa_id'];
        $status = 'ativo';
        $created = date('Y-m-d');

        $sql = "INSERT INTO encomendas (encomenda_data, encomenda_hora, encomenda_origem, encomenda_destino, encomenda_valor, encomenda_status, encomenda_descricao, empresa_id, encomenda_created)
        VALUES (:_data, :hora, :origem, :destino, :valor, :u_status, :descricao, :empresa_id, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('_data', $data);
        $consulta->bindValue('hora' , $hora);
        $consulta->bindValue('origem' , $origem);
        $consulta->bindValue('destino' , $destino);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('descricao' , $descricao);
        $consulta->bindValue('empresa_id' , $empresa_id);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }

    public function getEncomenda($dados){
        
        $id = $dados['id'];

        $sql = "SELECT * FROM encomendas WHERE encomenda_status='ativo' AND encomenda_id=$id";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetch());

    }

    public function getEncomendaEmpresaAll($dados){
        
        $id = $dados['id'];
        $hoje = date('Y-m-d');

        $sql_update = "UPDATE encomendas SET encomenda_status='inativo' WHERE empresa_id=$id AND encomenda_data < '$hoje'";
        $consulta_update = Conexao::prepare($sql_update);
        $consulta_update->execute();

        $sql = "SELECT * FROM encomendas WHERE empresa_id=$id  ORDER BY encomenda_data";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

    public function UpdateEncomenda($dados)
    {
        $encomenda_id = $dados['id'];
        $data = $dados['data'];
        $hora = $dados['hora'];
        $origem = $dados['origem'];
        $destino = $dados['destino'];
        $valor = $dados['valor'];
        $status = $dados['status'];
        $descricao = $dados['descricao'];

        $sql = "UPDATE encomendas SET encomenda_data=:_data, encomenda_hora=:hora, encomenda_origem=:origem, encomenda_destino=:destino, encomenda_valor=:valor, encomenda_status=:u_status, encomenda_descricao=:descricao WHERE encomenda_id=:encomenda_id";
        
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('_data', $data);
        $consulta->bindValue('hora' , $hora);
        $consulta->bindValue('origem' , $origem);
        $consulta->bindValue('destino' , $destino);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('descricao' , $descricao);
        $consulta->bindValue('encomenda_id' , $encomenda_id);

        return $consulta->execute();
    }

}
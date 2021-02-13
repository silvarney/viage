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
        $empresa = 1;
        $status = 'ativo';
        $created = date('Y-m-d');

        $sql = "INSERT INTO passagens (passagem_data, passagem_hora, passagem_origem, passagem_destino, passagem_valor, passagem_status, empresa_id, passagem_created)
        VALUES (:_data, :hora, :origem, :destino, :valor, :u_status, :empresa, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('_data', $data);
        $consulta->bindValue('hora' , $hora);
        $consulta->bindValue('origem' , $origem);
        $consulta->bindValue('destino' , $destino);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('empresa' , $empresa);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }

    public function getPassagemAll(){
        
        $sql = "SELECT * FROM passagens WHERE passagem_status='ativo'";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

}
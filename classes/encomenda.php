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
        $empresa = 1;
        $status = 'ativo';
        $created = date('Y-m-d');

        $sql = "INSERT INTO encomendas (encomenda_data, encomenda_hora, encomenda_origem, encomenda_destino, encomenda_valor, encomenda_status, encomenda_descricao, empresa_id, encomenda_created)
        VALUES (:_data, :hora, :origem, :destino, :valor, :u_status, :descricao, :empresa, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('_data', $data);
        $consulta->bindValue('hora' , $hora);
        $consulta->bindValue('origem' , $origem);
        $consulta->bindValue('destino' , $destino);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('descricao' , $descricao);
        $consulta->bindValue('empresa' , $empresa);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }

}
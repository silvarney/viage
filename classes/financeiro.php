<?php
include 'conexao/conexao.php';

class Financeiro extends Conexao{
    public function setFinanceiro($dados)
    {
        $tipo = $dados['tipo'];
        $valor = $dados['valor'];
        $empresa_id = $dados['empresa_id'];
        $status = 'aguardando pagamento';
        $created = date('Y-m-d');

        $sql = "INSERT INTO financeiros (financeiro_tipo, financeiro_valor, financeiro_status, empresa_id, financeiro_created)
        VALUES (:tipo, :valor, :u_status, :empresa_id, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('tipo', $tipo);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('empresa_id' , $empresa_id);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('created' , $created);

        return $consulta->execute();
    }

    public function getFinanceiro($dados)
    {
        $id = $dados['id'];
        
        $sql = "SELECT * FROM financeiros WHERE empresa_id=:id ORDER BY financeiro_id desc";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',  $id);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
    }

}
<?php
include 'conexao/conexao.php';

class VendaPassagem extends Conexao{

    public function SetPassagem($dados)
    {
        $cliente = $dados['cliente'];
        $fone = $dados['fone'];
        $valor = $dados['valor'];
        $quantidade = $dados['quantidade'];
        $total = $dados['total'];
        $localizador = $dados['localizador'];
        $passagem_id = $dados['passagem_id'];
        $empresa_id = $dados['empresa_id'];
        $created = date('Y-m-d h:i:s');

        $sql = "INSERT INTO venda_passagem (venda_passagem_cliente, venda_passagem_fone, venda_passagem_valor, venda_passagem_quantidade, venda_passagem_valor_total, venda_passagem_localizador, passagem_id, empresa_id, venda_passagem_created)
        VALUES (:cliente, :fone, :valor, :quantidade, :total, :localizador, :passagem_id, :empresa_id, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('cliente', $cliente);
        $consulta->bindValue('fone', $fone);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('quantidade' , $quantidade);
        $consulta->bindValue('total' , $total);
        $consulta->bindValue('localizador' , $localizador);
        $consulta->bindValue('passagem_id' , $passagem_id);
        $consulta->bindValue('empresa_id' , $empresa_id);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }
    
    public function getPassagem($dados)
    {
        $id = $dados['id'];

        $sql = "SELECT P.*, E.empresa_nome, E.empresa_fone FROM passagens AS P
        INNER JOIN empresas AS E
        ON P.empresa_id = E.empresa_id
         WHERE P.passagem_id=".$id;

        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        echo json_encode($consulta->fetch());
    }

    public function getPassagemAll($dados)
    {
        $id = $dados['id'];
        $mes = $dados['mes'];

        $sql = "SELECT * FROM venda_passagem WHERE empresa_id=$id AND MONTH(venda_passagem_created)=$mes ORDER BY venda_passagem_created desc";

        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        echo json_encode($consulta->fetchAll());
    }

    public function getDadosVenda($dados)
    {
        $id = $dados['id'];
        $mes = $dados['mes'];

        $sql = "SELECT sum(venda_passagem_valor_total) as total, sum(venda_passagem_quantidade) as quantidade FROM venda_passagem WHERE empresa_id=$id AND MONTH(venda_passagem_created) = $mes";

        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        echo json_encode($consulta->fetch());
    }

}
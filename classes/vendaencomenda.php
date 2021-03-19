<?php
include 'conexao/conexao.php';

class VendaEncomenda extends Conexao{

    public function setEncomenda($dados)
    {
        $cliente = $dados['cliente'];
        $fone = $dados['fone'];
        $valor = $dados['valor'];
        $quantidade = $dados['quantidade'];
        $total = $dados['total'];
        $localizador = $dados['localizador'];
        $encomenda_id = $dados['encomenda_id'];
        $empresa_id = $dados['empresa_id'];
        $created = date('Y-m-d H:i:s');

        $sql = "INSERT INTO venda_encomenda (venda_encomenda_cliente, venda_encomenda_fone, venda_encomenda_valor, venda_encomenda_quantidade, venda_encomenda_valor_total, venda_encomenda_localizador, encomenda_id, empresa_id, venda_encomenda_created)
        VALUES (:cliente, :fone, :valor, :quantidade, :total, :localizador, :encomenda_id, :empresa_id, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('cliente', $cliente);
        $consulta->bindValue('fone', $fone);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('quantidade' , $quantidade);
        $consulta->bindValue('total' , $total);
        $consulta->bindValue('localizador' , $localizador);
        $consulta->bindValue('encomenda_id' , $encomenda_id);
        $consulta->bindValue('empresa_id' , $empresa_id);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }
    
    public function getEncomenda($dados)
    {
        $id = $dados['id'];

        $sql = "SELECT EN.*, E.empresa_nome, E.empresa_fone FROM encomendas AS EN
        INNER JOIN empresas AS E
        ON EN.empresa_id = E.empresa_id
         WHERE EN.encomenda_id=".$id;

        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        echo json_encode($consulta->fetch());
    }

    public function getEncomendaAll($dados)
    {
        $id = $dados['id'];
        $mes = $dados['mes'];

        $sql = "SELECT * FROM venda_encomenda WHERE empresa_id=$id AND MONTH(venda_encomenda_created)=$mes ORDER BY venda_encomenda_created desc";

        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        echo json_encode($consulta->fetchAll());
    }

    public function getDadosVenda($dados)
    {
        $id = $dados['id'];
        $mes = $dados['mes'];

        $sql = "SELECT sum(venda_encomenda_valor_total) as total, sum(venda_encomenda_quantidade) as quantidade FROM venda_encomenda WHERE empresa_id=$id AND MONTH(venda_encomenda_created) = $mes";

        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        echo json_encode($consulta->fetch());
    }

}
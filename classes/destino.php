<?php
include 'conexao/conexao.php';

class Destino extends Conexao{
 
    public function getDestinoAll(){
        
        $sql = "SELECT DISTINCT passagem_origem, passagem_destino FROM passagens WHERE passagem_status='ativo' ORDER BY passagem_origem";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        
        $sql2 = "SELECT DISTINCT encomenda_origem, encomenda_destino FROM encomendas WHERE encomenda_status='ativo' ORDER BY encomenda_origem";
        $consulta2 = Conexao::prepare($sql2);
        $consulta2->execute();
        
        $resultado = array_merge($consulta->fetchAll(), $consulta2->fetchAll());
        
        echo json_encode($resultado);

    }

    public function getDestinoEmpresa($dados)
    {
        $origem = $dados['origem'];
        $destino = $dados['destino'];
        $tipo = $dados['tipo'];

        switch ($tipo) {
            case 'passagem':
                $sql = "SELECT DISTINCT E.* FROM passagens AS P
                INNER JOIN empresas AS E
                ON P.empresa_id = E.empresa_id
                 WHERE P.passagem_origem=:origem AND P.passagem_destino=:destino";
                break;
            
            case 'encomenda':
                $sql = "SELECT DISTINCT E.* FROM encomendas AS EN
                INNER JOIN empresas AS E
                ON EN.empresa_id = E.empresa_id
                 WHERE EN.encomenda_origem=:origem AND EN.encomenda_destino=:destino";
                break;
        }

        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('origem',  $origem);
        $consulta->bindValue('destino',  $destino);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
        
    }

}
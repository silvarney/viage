<?php
include 'conexao/conexao.php';

class Localizador extends Conexao{
    
    public function getLocalizador($dados)
    {
        $tipo = $dados['tipo'];
        $localizador = $dados['localizador'];

        switch ($tipo) {
            case 'passagem':
                $sql = "SELECT V.*, P.*, E.empresa_nome, E.empresa_fone FROM venda_passagem AS V
                INNER JOIN empresas AS E
                ON V.empresa_id = E.empresa_id
                INNER JOIN passagens AS P
                ON V.passagem_id = P.passagem_id
                WHERE V.venda_passagem_localizador=:localizador";
                break;
            
            case 'encomenda':
                $sql = "SELECT V.*, EN.*, E.empresa_nome, E.empresa_fone FROM venda_encomenda AS V
                INNER JOIN empresas AS E
                ON V.empresa_id = E.empresa_id
                INNER JOIN encomendas AS EN
                ON V.encomenda_id = EN.encomenda_id
                WHERE V.venda_encomenda_localizador=:localizador";
                break;
        }
        
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('localizador',  $localizador);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

}
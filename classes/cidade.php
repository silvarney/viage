<?php
include 'conexao/conexao.php';

class Cidade extends Conexao{
    
    public function getCidadeAll(){
        
        $sql = "SELECT * FROM cidades WHERE cidade_status='ativo' ORDER BY cidade_nome asc";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

}
<?php
include 'conexao/conexao.php';

class Configuracao extends Conexao{
    public function setConfiguracao($dados)
    {
        $tipo = $dados['tipo'];
        $tela = $dados['tela'];
        $texto = $dados['texto'];
        $numero = $dados['numero'];
        $valor = $dados['valor'];
        $validade = $dados['validade'];
        
        $status = 'ativo';
        $created = date('Y-m-d H:i:s');

        $sql = "INSERT INTO configuracoes (configuracao_tipo, configuracao_tela, configuracao_texto, configuracao_numero, configuracao_valor, configuracao_validade, configuracao_status, configuracao_created)
        VALUES (:tipo, :tela, :texto, :numero, :valor, :validade, :u_status, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('tipo', $tipo);
        $consulta->bindValue('tela', $tela);
        $consulta->bindValue('texto', $texto);
        $consulta->bindValue('numero', $numero);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('validade' , $validade);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('created' , $created);

        return $consulta->execute();
    }

    public function getConfiguracao($dados)
    {
        $tela = $dados['tela'];
        
        $sql = "SELECT * FROM configuracoes WHERE configuracao_tela=:tela AND configuracao_status='ativo'";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('tela',  $tela);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

    public function getConfiguracaoAll($dados)
    {
        $tela = $dados['tela'];
        $tipo = $dados['tipo'];
        
        $sql = "SELECT * FROM configuracoes WHERE configuracao_tela=:tela AND configuracao_tipo=:tipo AND configuracao_status='ativo'";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('tela',  $tela);
        $consulta->bindValue('tipo',  $tipo);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
    }

}
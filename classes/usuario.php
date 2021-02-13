<?php
include 'conexao/conexao.php';

class Usuario extends Conexao{
    public function SetUsuario($dados)
    {
        $nome = $dados['nome'];
        $fone = $dados['fone'];
        $senha = $dados['senha'];
        $cidade = $dados['cidade'];
        $status = 'ativo';
        $created = date('Y-m-d');

        $sql = "INSERT INTO usuarios (usuario_nome, usuario_fone, usuario_senha, usuario_cidade, usuario_status, usuario_created)
        VALUES (:nome, :fone, :senha, :cidade, :u_status, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $nome);
        $consulta->bindValue('fone' , $fone);
        $consulta->bindValue('senha' , $senha);
        $consulta->bindValue('cidade' , $cidade);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }

    public function getUsuarioAll(){
        
        $sql = "SELECT * FROM usuarios";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

    public function getUsuario($dados)
    {
        $fone = $dados['fone'];
        $senha = $dados['senha'];

        $sql = "SELECT * FROM usuarios WHERE usuario_fone=:fone AND usuario_senha=:senha";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('fone',  $fone);
        $consulta->bindValue('senha',  $senha);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

}
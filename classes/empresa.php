<?php
include 'conexao/conexao.php';

class Empresa extends Conexao{
    public function SetEmpresa($dados)
    {
        $nome = $dados['nome'];
        $responsavel = $dados['responsavel'];
        $fone = $dados['fone'];
        $tipo = $dados['tipo'];
        $modelo = $dados['modelo'];
        $lugar = $dados['lugar'];
        $placa = $dados['placa'];
        $cor = $dados['cor'];
        $cidade = $dados['cidade'];
        $bairro = $dados['bairro'];
        $endereco = $dados['endereco'];
        $capa = $dados['capa'];
        $perfil = $dados['perfil'];
        
        $usuario_id = 2;
        
        $status = 'ativo';
        $created = date('Y-m-d');

        $sql = "INSERT INTO empresas (empresa_nome, empresa_responsavel, empresa_fone, empresa_tipo, empresa_modelo, empresa_lugar, 
        empresa_placa, empresa_cor, empresa_cidade, empresa_bairro, empresa_endereco, empresa_capa, empresa_perfil,
        empresa_status, usuario_id, empresa_created)
        VALUES (:nome, :responsavel, :fone, :tipo, :modelo, :lugar, :placa, :cor, :cidade, :bairro, :endereco, :capa, :perfil, :u_status, :usuario, :created)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $nome);
        $consulta->bindValue('responsavel', $responsavel);
        $consulta->bindValue('fone' , $fone);
        $consulta->bindValue('tipo' , $tipo);
        $consulta->bindValue('modelo' , $modelo);
        $consulta->bindValue('lugar' , $lugar);
        $consulta->bindValue('placa' , $placa);
        $consulta->bindValue('cor' , $cor);
        $consulta->bindValue('cidade' , $cidade);
        $consulta->bindValue('bairro' , $bairro);
        $consulta->bindValue('endereco' , $endereco);
        $consulta->bindValue('capa' , $capa);
        $consulta->bindValue('perfil' , $perfil);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('usuario' , $usuario_id);
        $consulta->bindValue('created' , $created);
        return $consulta->execute();
    }

    public function getEmpresaAll(){
        
        $sql = "SELECT * FROM empresas";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());

    }

    public function getEmpresa($dados)
    {
        $fone = $dados['fone'];
        $senha = $dados['senha'];

        $sql = "SELECT * FROM empresas WHERE empresa_fone=:fone AND empresa_senha=:senha";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('fone',  $fone);
        $consulta->bindValue('senha',  $senha);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

}
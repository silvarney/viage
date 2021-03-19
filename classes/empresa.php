<?php
date_default_timezone_set('America/Sao_Paulo');
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
        
        $usuario_id = $dados['usuario_id'];
        
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
        $id = $dados['id'];
        
        $sql = "SELECT * FROM empresas WHERE empresa_id=:id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',  $id);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

    public function getEmpresaDestino($dados)
    {
        $origem = $dados['origem'];
        $destino = $dados['destino'];
        $id = $dados['id'];
        $hoje = date('Y-m-d');
        $hora = date('H:i:s');


        $sql = "SELECT passagens.* FROM(
            SELECT passagens.* FROM passagens WHERE passagem_data>'$hoje' AND passagem_status='ativo' AND passagem_origem='$origem' AND passagem_destino='$destino' AND empresa_id=$id
            UNION ALL
            SELECT passagens.* FROM passagens WHERE passagem_data='$hoje' AND passagem_hora>'$hora' AND passagem_status='ativo' AND passagem_origem='$origem' AND passagem_destino='$destino' AND empresa_id=$id
            ) passagens ORDER BY passagens.passagem_data asc";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        $passagens = $consulta->fetchAll();
        
        $sql2 = "SELECT encomendas.* FROM(
            SELECT encomendas.* FROM encomendas WHERE encomenda_data>'$hoje' AND encomenda_status='ativo' AND encomenda_origem='$origem' AND encomenda_destino='$destino' AND empresa_id=$id
            UNION ALL
            SELECT encomendas.* FROM encomendas WHERE encomenda_data='$hoje' AND encomenda_hora>'$hora' AND encomenda_status='ativo' AND encomenda_origem='$origem' AND encomenda_destino='$destino' AND empresa_id=$id
            ) encomendas ORDER BY encomendas.encomenda_data asc";
        $consulta2 = Conexao::prepare($sql2);
        $consulta2->execute();
        $encomendas = $consulta2->fetchAll();

        $resultado = array_merge($passagens, $encomendas);
        
        echo json_encode($resultado);
        
    }

    public function getEmpresaCidade($dados)
    {
        
        $id = $dados['id'];


        $sql = "SELECT DISTINCT passagens.passagem_origem, passagens.passagem_destino FROM passagens WHERE empresa_id='$id' ORDER BY passagem_origem";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        $passagens = $consulta->fetchAll();
        
        $sql2 = "SELECT DISTINCT encomendas.encomenda_origem, encomendas.encomenda_destino FROM encomendas WHERE empresa_id='$id' ORDER BY encomenda_origem";
        $consulta2 = Conexao::prepare($sql2);
        $consulta2->execute();
        $encomendas = $consulta2->fetchAll();

        $resultado = array_merge($passagens, $encomendas);
        
        echo json_encode($resultado);
        
    }

    public function UpdateEmpresa($dados)
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
        $status = $dados['status'];
        $empresa_id = $dados['empresa_id'];
                
        $sql = "UPDATE empresas SET empresa_nome=:nome, empresa_responsavel=:responsavel, empresa_fone=:fone, empresa_tipo=:tipo, empresa_modelo=:modelo, empresa_lugar=:lugar, 
        empresa_placa=:placa, empresa_cor=:cor, empresa_cidade=:cidade, empresa_bairro=:bairro, empresa_endereco=:endereco, empresa_capa=:capa, empresa_perfil=:perfil,
        empresa_status=:u_status WHERE empresa_id=:empresa_id";
        
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
        $consulta->bindValue('empresa_id' , $empresa_id);
        
        return $consulta->execute();
    }

    public function getEmpresaPesquisa($dados)
    {
        $texto = $dados['texto'];
        
        $sql = "SELECT * FROM empresas WHERE empresa_nome LIKE '%$texto%' OR empresa_responsavel LIKE '%$texto%'";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
    }

}
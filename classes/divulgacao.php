<?php
include 'conexao/conexao.php';

class Divulgacao extends Conexao{
    public function setDivulgacao($dados)
    {
        $banner = $dados['banner'];
        $capa = $dados['capa'];
        $titulo = $dados['titulo'];
        $descricao = $dados['descricao'];
        $fone = $dados['fone'];
        $whatsapp = $dados['whatsapp'];
        $facebook = $dados['facebook'];
        $tela = $dados['tela'];
        $valor = $dados['valor'];
        $vencimento = $dados['vencimento'];
        $usuario_id = $dados['usuario_id'];
        $status = 'aguardando pagamento';
        $created = date('Y-m-d h:i:s');

        $sql = "INSERT INTO divulgacoes (divulgacao_banner, divulgacao_capa, divulgacao_titulo, divulgacao_descricao, divulgacao_fone, divulgacao_whatsapp, divulgacao_facebook, divulgacao_tela, divulgacao_valor, divulgacao_vencimento, divulgacao_status, divulgacao_created, usuario_id)
        VALUES (:banner, :capa, :titulo, :descricao, :fone, :whatsapp, :facebook, :tela, :valor, :vencimento, :u_status, :created, :usuario_id)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('banner', $banner);
        $consulta->bindValue('capa', $capa);
        $consulta->bindValue('titulo' , $titulo);
        $consulta->bindValue('descricao' , $descricao);
        $consulta->bindValue('fone' , $fone);
        $consulta->bindValue('whatsapp' , $whatsapp);
        $consulta->bindValue('facebook' , $facebook);
        $consulta->bindValue('tela' , $tela);
        $consulta->bindValue('valor' , $valor);
        $consulta->bindValue('vencimento' , $vencimento);
        $consulta->bindValue('usuario_id' , $usuario_id);
        $consulta->bindValue('u_status' , $status);
        $consulta->bindValue('created' , $created);

        return $consulta->execute();
    }

    public function getDivulgacao($dados)
    {
        $id = $dados['id'];
        
        $sql = "SELECT * FROM divulgacoes WHERE usuario_id=:id ORDER BY divulgacao_id desc";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',  $id);
        $consulta->execute();
        echo json_encode($consulta->fetchAll());
    }

    public function getDivulgacaoFind($dados)
    {
        $id = $dados['id'];
        
        $sql = "SELECT * FROM divulgacoes WHERE divulgacao_id=:id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id',  $id);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

    public function getDivulgacaoAtiva($dados)
    {
        $tela = $dados['tela'];
        
        $sql = "SELECT * FROM divulgacoes WHERE divulgacao_tela=:tela AND divulgacao_status='ativo' ORDER BY RAND()  LIMIT 1";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('tela',  $tela);
        $consulta->execute();
        echo json_encode($consulta->fetch());
    }

}
<?php
class opcoes
{

   

    public function insert($conexao, $descricao, $user, $url, $nivel, $idSuperior)
    {
        $query = "
    insert into opcoes_menu (
                    descricaoOpcao, 
                    nivelOpcao,
                    urlOpcao,
                    statusOpcao,
                    dataCadastroOpcao,
                    idUsuario,
                    idSuperior
                    )values(
                    '" . $descricao . "',
                    '" . $nivel . "',
                    '" . $url . "',
                    'S',
                    NOW(),
                    '" . $user . "',
                    '" . $idSuperior . "'
                    
                                )

        ";
        $result = mysqli_query($conexao, $query) or die(false);
        if ($result) {
            return "Opção Cadastrada";
        }
    }




    public function alterar_status($conexao, $idOpcao, $statusOpcao){  
        $sql = "
    update opcoes_menu set statusOpcao = '$statusOpcao' where idOpcao=$idOpcao
    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    if($result){
        return "Status Alterado";
        
    }
    }



    public function get_info($conexao, $idOpcao)
    {
         $sql = "
        Select 
            descricaoOpcao,
            nivelOpcao,
            urlOpcao,
            idSuperior
        From
            opcoes_menu
        Where
            idOpcao = $idOpcao   
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $opcao = $result->fetch_all(MYSQLI_ASSOC);
    return json_encode($opcao);

    }

    public function update($conexao, $idOpcao, $descricao, $url, $nivel, $idSuperior)
    {
        $sql = "
        update opcoes_menu set 

        descricaoOpcao = '$descricao',
        nivelOpcao = '$nivel',
        idSuperior = '$idSuperior',
        urlOpcao = '$url'

        where idOpcao= $idOpcao
        ";
        $result = mysqli_query($conexao, $sql) or die(false);
        if($result){
            return "Informações Alteradas";
            
        }
    }


    public function deletar($conexao, $idOpcao)
    {
        $sql = "DELETE FROM opcoes_menu WHERE idOpcao = $idOpcao";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            return "Opção excluída com sucesso!";
        } else {
            return "Erro ao excluir a opção: " . mysqli_error($conexao);
        }
    }

    public function buscaSuperior($conexao, $nivelOpcao)
    {
         
       $sql = "
        Select 
        idOpcao,
        descricaoOpcao,
        (SELECT descricaoNivel FROM nivel_acesso n WHERE n.idNivel = a.nivelOpcao) AS nivel
        From
            opcoes_menu a
        Where
            nivelOpcao = $nivelOpcao   
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $opcao = $result->fetch_all(MYSQLI_ASSOC);
    return json_encode($opcao);
    }
}



?>
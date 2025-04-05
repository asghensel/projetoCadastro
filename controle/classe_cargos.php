<?php


class cargos
{

   

    public function insert($conexao,  $descricao, $user)
    {
        $query = "
    insert into cargos (
                   
                    descricaoCargo, 
                    statusCargo,
                    dataCadastroCargo,
                    idUsuario
                    )values(
                
                    '" . $descricao . "',
                    'S',
                    NOW(),
                    '" . $user . "'
                    
                                )

        ";
        $result = mysqli_query($conexao, $query) or die(false);
        if ($result) {
            return "Opção Cadastrada";
        }
    }




    public function alterar_status($conexao, $idCargo, $statusCargo){  
        $sql = "
    update cargos set statusCargo = '$statusCargo' where idCargo=$idCargo
    
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    if($result){
        return "Status Alterado";
        
    }
    }



    public function get_info($conexao, $idCargo)
    {
         $sql = "
        Select 
        
            descricaoCargo
            
        From
            cargos
        Where
            idCargo = $idCargo   
    ";
    $result = mysqli_query($conexao, $sql) or die(false);
    $cargo = $result->fetch_all(MYSQLI_ASSOC);
    return json_encode($cargo);
    
    }

    public function update($conexao, $idCargo, $descricao)
    {
        $sql = "
        update cargos set 

        descricaoCargo = '$descricao'

        where idCargo= $idCargo
        ";
        $result = mysqli_query($conexao, $sql) or die(false);
        if($result){
            return "Informações Alteradas";
            
        }
    }


    public function deletar($conexao, $idCargo)
    {
        $sql = "DELETE FROM cargos WHERE idCargo = $idCargo";
        $result = mysqli_query($conexao, $sql);
        if ($result) {
            echo "Opção excluída com sucesso!";
        } else {
            return "Erro ao excluir a opção: " . mysqli_error($conexao);
        }
    }
}
?>
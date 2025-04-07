$(document).ready(function () {
    $("#salvar_info").click(function () {
      let ativo = $("#ativo").val();
      let tipo_mov = $("#tipoMov").val();
      let quantidade_mov = $("#quantidade").val();
      let origem_mov = $("#origem").val();
      let destino_mov = $("#destino").val();
      let descricao_mov = $("#descricao").val();
      let idMov = $("#idMovimentacao").val();
      
      
        if(ativo == "" || tipo_mov == "" || quantidade_mov == ""){
            alert('Preencha todos os campos obrigatórios');
            return false;
        }

        if(idMov== ""){
          acao='inserir';
        }else{
          acao='update';
        }

      $.ajax({
        type: 'POST',
        url: "../controle/movimentacao_controle.php",
        data: {
          ativo: ativo,
          tipo:tipo_mov,
          quantidade:quantidade_mov,
          origem:origem_mov,
          destino:destino_mov,
          descricao:descricao_mov,
          acao:acao,
          idMov: idMov
        },
        success: function (result) {
          console.log(result);
          if(result.trim() == "Sucesso"){
          Swal.fire({
            position: "center",
            icon: "success",
            title:"<span style='color: #009000;'>Movimetação efetuada com sucesso</span>",
            text: result, // Exibe a mensagem retornada do servidor
            background: "#F5F5F5",
            color: "#333",
            confirmButtonColor: "#ff4757",
            showConfirmButton: false,
            timer: 2000 // Duração do alerta
          }).then(() => {
            // Após o alerta, recarrega a página
            location.reload();
          });
          }else{
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Ocorreu um erro na operação.",
              text: result, // Mostra a mensagem de erro retornada pelo servidor
              background: "#F5F5F5",
              color: "#333",
              confirmButtonColor: "#ff4757"
            });
          }
        },


        error: function (xhr) {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Ocorreu um erro na operação.",
            text: xhr.responseText, // Mostra a mensagem de erro retornada pelo servidor
            background: "#F5F5F5",
            color: "#333",
            confirmButtonColor: "#ff4757"
          });
          
        }
      });
      
    });
  });

  function infos(idMov) {
    $('#idMovimentacao').val(idMov);
    $.ajax({
      type: 'POST',
      url: "../controle/movimentacao_controle.php",
      data: {
        acao: 'get_info',
        idMov: idMov
      },
      success: function (result) {
        let retorno = JSON.parse(result);
        $('#infos').click(); // abre o modal
  
        $("#ativos").html(retorno[0]['ativo']);
        $("#tipo").html(retorno[0]['descricaoMovimentacao']);
        $("#uso").html(retorno[0]['quantidadeUso']);
        $("#antigo").html(retorno[0]['quantidadeMov']);
        $("#total").html(retorno[0]['quantidadeTotalAtivo']);
        $("#origems").html(retorno[0]['localOrigem']);
        $("#destinos").html(retorno[0]['localDestino']);
        $("#data").html(retorno[0]['dataMovimentacao']);
        $("#obs").html(retorno[0]['descricaoMovimentacao']);
      }
    });
  }

  function fechar_modal(){
    $("#ativo").val('');
        $("#tipoMov").val('');
        $("#quantidade").val('');
        $("#origem").val('');
        $("#destino").val('');
        $("#descricao").val('');
    }
  